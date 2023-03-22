<?php

namespace App\Services;

class KeyGenerator implements UniqueIdentifierKeyGeneratorInterface
{
    private static array $chars = [
        "A", "a", "B",
        "b", "C", "c",
        "D", "d", "E",
        "e", "F", "f",
        "G", "g", "H",
        "h", "I", "i",
        "J", "j", "K",
        "k", "L", "l",
        "M", "m", "N",
        "n", "O", "o",
        "P", "p", "Q",
        "q", "R", "r",
        "S", "s", "T",
        "t", "U", "u",
        "V", "v", "W",
        "w", "X", "x",
        "Y", "y", "Z",
        "z",
    ];

    private static array $numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

    private static string $key = '';

    /**
     * Generate an unique key in different length.
     *
     * @param int $keyLength
     * @return string
     */
    public static function generate(int $keyLength = 2): string
    {
        for ($i = 0; $i < $keyLength; $i++) {
            if($i == 0 || $i % 2 == 0) {
               $charIndex = rand(0, count(self::$chars) - 1);
               self::$key .= self::$chars[$charIndex];
            } else {
                $numberIndex = rand(0, count(self::$numbers) - 1);
                self::$key .= self::$numbers[$numberIndex];
            }
        }

        return self::$key;
    }
}
