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
        $code = ord($char);

        if ($code >= ord('A') && $code <= ord('Z')) {
            return chr($this->shiftUppercase($code + $offset));
        }

        if ($code >= ord('a') && $code <= ord('z')) {
            return chr($this->shiftLowercase($code + $offset));
        }

        return chr($code);
    }

    private function shiftUppercase(int $code): string
    {
        if ($code < ord('A')) {
            return (ord('Z') + 1) - (ord('A') - $code);
        }

        if ($code > ord('Z')) {
            return ($code - ord('Z')) + (ord('A') - 1);
        }

        return $code;
    }

    private function shiftLowercase(int $code): string
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
