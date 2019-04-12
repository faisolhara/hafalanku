<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class BerandaTest extends TestCase
{
    public function testBelumLogin()
    {
        $response = $this->get('/beranda');
        $response->assertRedirect('/');
    }

    public function testSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/beranda');

        $response->assertStatus(200);
    }
}
