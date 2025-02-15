<?php

namespace Tests\Feature;

use App\Models\Influencer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase;

    public function test()
    {
        $response = $this->postJson('/systemTest');

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'Validação de roteamento concluído',
        ]);
    }
}
