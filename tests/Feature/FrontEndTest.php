<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class FrontEndTest extends TestCase
{
    public function testBelumLogin()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/');

        $response->assertRedirect('/beranda');
    }
}
