<?php

declare(strict_types=1);

namespace Inspirum\Balikobot\Client;

use Psr\Http\Message\ResponseInterface;

interface Requester
{
    /**
     * @param array<mixed,mixed> $data
     */
    public function request(string $url, array $data = []): ResponseInterface;
}
