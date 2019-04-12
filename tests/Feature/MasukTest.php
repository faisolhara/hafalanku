<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class MasukTest extends TestCase
{
    public function testBelumLogin()
    {
        $response = $this->get('/masuk');
        $response->assertStatus(200);
    }

    public function testSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/masuk');

        $response->assertRedirect('/beranda');
    }
}
