<?php

namespace Tests\Unit;

use Tests\TestCase;

class LastExpCountTest extends TestCase
{
    public function test_last_expire_count_response_json()
    {
        $response = $this->get(route('last-exp-count'));
        $response->assertJsonStructure([
            'count'
        ]);
    }
}
