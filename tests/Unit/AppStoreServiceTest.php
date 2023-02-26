<?php

namespace Tests\Unit;

use Tests\TestCase;

class AppStoreServiceTest extends TestCase
{
    public function test_appstore_response_json()
    {
        $response = $this->post(route('market-service.appstore'));
        if ($response->isSuccessful()) {
            $response->assertJsonStructure([
                'subscription'
            ]);
        } else {
            $response->assertJsonStructure([
                'error'
            ]);
        }
    }
}
