<?php

namespace Tests\Feature;

use Tests\TestCase;

class CipherControllerTest extends TestCase
{
    public function test_it_can_encode_a_message(): void
    {
        $this->postJson('/api/cipher', [
            'text' => 'Working software is the measure of progress!',
            'offset' => 13,
            'mode' => 'encode',
        ])
            ->assertSuccessful()
            ->assertJson(['text' => 'Jbexvat fbsgjner vf gur zrnfher bs cebterff!']);
    }

    public function test_it_can_decode_a_message(): void
    {
        $this->postJson('/api/cipher', [
            'text' => 'Jbexvat fbsgjner vf gur zrnfher bs cebterff!',
            'offset' => 13,
            'mode' => 'decode',
        ])
            ->assertSuccessful()
            ->assertJson(['text' => 'Working software is the measure of progress!']);
    }
}
