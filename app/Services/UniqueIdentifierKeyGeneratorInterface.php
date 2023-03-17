<?php

namespace App\Services;

interface UniqueIdentifierKeyGeneratorInterface
{
    /**
     * Generate unique key with different length.
     *
     * @param int $keyLength
     * @return string
     */
    public static function generate(int $keyLength = 2): string;
}
