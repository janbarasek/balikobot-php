<?php

namespace Inspirum\Balikobot\Tests\Unit\Balikobot;

use Inspirum\Balikobot\Services\Balikobot;

class GetCodCountriesTest extends AbstractBalikobotTestCase
{
    public function testMakeRequest()
    {
        $requester = $this->newRequesterWithMockedRequestMethod(200, [
            'status'        => 200,
            'service_types' => [],
        ]);

        $service = new Balikobot($requester);

        $service->getCodCountries('cp');

        $requester->shouldHaveReceived(
            'request',
            [
                'https://api.balikobot.cz/cp/cod4services',
                [],
            ]
        );

        $this->assertTrue(true);
    }

    public function testResponseData()
    {
        $requester = $this->newRequesterWithMockedRequestMethod(200, [
            'status'        => 200,
            'service_types' => [
                [
                    'service_type'  => 'DR',
                    'cod_countries' => [
                        'CZ' => [
                            'max_price' => 10000,
                            'currency'  => 'CZK',
                        ],
                    ],
                ],
                [
                    'service_type'  => 'VZP',
                    'cod_countries' => [
                        'UA' => [
                            'max_price' => 36000,
                            'currency'  => 'UAH',
                        ],
                        'LV' => [
                            'max_price' => 2000,
                            'currency'  => 'USD',
                        ],
                        'HU' => [
                            'max_price' => 2500,
                            'currency'  => 'EUR',
                        ],
                        'SK' => [
                            'max_price' => 500000,
                            'currency'  => 'CZK',
                        ],
                    ],
                ],
            ],
        ]);

        $service = new Balikobot($requester);

        $units = $service->getCodCountries('cp');

        $this->assertEquals(
            [
                'DR'  => [
                    'CZ' => [
                        'max_price' => 10000,
                        'currency'  => 'CZK',
                    ],
                ],
                'VZP' => [
                    'UA' => [
                        'max_price' => 36000,
                        'currency'  => 'UAH',
                    ],
                    'LV' => [
                        'max_price' => 2000,
                        'currency'  => 'USD',
                    ],
                    'HU' => [
                        'max_price' => 2500,
                        'currency'  => 'EUR',
                    ],
                    'SK' => [
                        'max_price' => 500000,
                        'currency'  => 'CZK',
                    ],
                ],
            ],
            $units
        );
    }
}
