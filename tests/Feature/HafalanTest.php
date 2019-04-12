<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Models\Hafalan;

class HafalanTest extends TestCase
{
    public function testIndexBelumLogin()
    {
        $response = $this->get('/hafalan');
        $response->assertRedirect('/');
    }

    public function testIndexSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/hafalan');

        $response->assertStatus(200);
    }

    public function testTambahBelumLogin()
    {
        $response = $this->get('/hafalan/tambah');
        $response->assertRedirect('/');
    }

    public function testTambahSudahLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/hafalan/tambah');

        $response->assertStatus(200);
    }

    public function testUbahBelumLogin()
    {
        $response = $this->get('/hafalan/ubah/0');
        $response->assertRedirect('/');
    }

    public function testUbahSudahLoginDataTidakAda()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/hafalan/ubah/0');

        $response->assertStatus(404);
    }

    public function testUbahSudahLoginDataAda()
    {
        $hafalan = Hafalan::first();
        if ($hafalan === null) {
            return;
        }

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                            ->get('/hafalan/ubah/'.$hafalan->id);

        $response->assertStatus(200);
    }
}
