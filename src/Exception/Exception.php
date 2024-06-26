<?php

declare(strict_types=1);

namespace Inspirum\Balikobot\Exception;

use Throwable;

interface Exception extends Throwable
{
    /**
     * Get response HTTP status code
     */
    public function getStatusCode(): int;

    /**
     * Get response as array
     *
     * @return array<mixed>
     */
    public function getResponse(): array;

    /**
     * Get response as string
     */
    public function getResponseAsString(): string;

    /**
     * Get response errors
     *
     * @return array<array<string,string>>
     */
    public function getErrors(): array;
}
