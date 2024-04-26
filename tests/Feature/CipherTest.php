<?php

namespace Tests\Feature;

use App\Services\Cipher;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CipherTest extends TestCase
{
    #[DataProvider('messages')]
    public function test_it_can_encode_a_message(string $cipherMessage, string $plaintextMessage): void
    {
        $cipher = new Cipher;

        $output = $cipher->encode($plaintextMessage);

        $this->assertEquals($output, $cipherMessage);

    }

    #[DataProvider('messages')]
    public function test_it_can_decode_a_message(string $cipherMessage, string $plaintextMessage): void
    {
        $cipher = new Cipher;

        $output = $cipher->decode($cipherMessage);

        $this->assertEquals($output, $plaintextMessage);

    }

    public static function messages(): array
    {
        return [
            ['Jbexvat fbsgjner vf gur zrnfher bs cebterff!', 'Working software is the measure of progress!'],
            ["Qba'g sbetrg gb qevax lbhe Binygvar", "Don't forget to drink your Ovaltine"],
        ];
    }
}
