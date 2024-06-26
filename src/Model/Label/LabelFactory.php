<?php

declare(strict_types=1);

namespace Inspirum\Balikobot\Model\Label;

interface LabelFactory
{
    /**
     * @param array<string,mixed> $data
     */
    public function create(array $data): string;
}
