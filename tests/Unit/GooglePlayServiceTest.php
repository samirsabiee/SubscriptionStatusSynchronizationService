<?php

namespace Tests\Unit;

use Tests\TestCase;

class GooglePlayServiceTest extends TestCase
{
    public function test_google_play_response_json()
    {
        $response = $this->post(route('market-service.google-play'));
        if ($response->isSuccessful()) {
            $response->assertJsonStructure([
                'status'
            ]);
        }else{
            $response->assertJsonStructure([
                'error'
            ]);
        }
    }
}
