<?php

namespace App\Services;

class Cipher
{
    public function encode(string $text, int $offset = 13): string
    {
        return $this->shiftText($text, $offset);
    }

    public function decode(string $text, int $offset = -13): string
    {
        return $this->shiftText($text, -$offset);
    }

    private function shiftText(string $text, int $offset): string
    {
        $output = '';

        foreach (str_split($text) as $char) {
            $output .= $this->shiftCharacter($char, $offset);
        }

        return $output;
    }

    private function shiftCharacter(string $char, int $offset): string
    {
        $charCode = ord($char);

        if ($charCode >= ord('A') && $charCode <= ord('Z')) {
            return chr($this->convertUppercase($charCode + $offset));
        }

        if ($charCode >= ord('a') && $charCode <= ord('z')) {
            return chr($this->convertLowercase($charCode + $offset));
        }

        return chr($charCode);
    }

    private function convertUppercase(int $code): string
    {
        if ($code < ord('A')) {
            return (ord('Z') + 1) - (ord('A') - $code);
        }

        if ($code > ord('Z')) {
            return ($code - ord('Z')) + (ord('A') - 1);
        }

        return $code;
    }

    private function convertLowercase(int $code): string
    {
        if ($code < ord('a')) {
            return (ord('z') + 1) - (ord('a') - $code);
        }

        if ($code > ord('z')) {
            return ($code - ord('z')) + (ord('a') - 1);
        }

        return $code;
    }
}
