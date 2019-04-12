<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class ProfilTest extends TestCase
{
    public function testProfilkuBelumLogin()
    {
        $response = $this->get('/profilku');
        $response->assertRedirect('/');
    }

    public function testProfilkuSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/profilku');

        $response->assertStatus(200);
    }

    public function testGantiPasswordBelumLogin()
    {
        $response = $this->get('/ganti-password');
        $response->assertRedirect('/');
    }

    public function testGantiPasswordSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/ganti-password');

        $response->assertStatus(200);
    }
}
