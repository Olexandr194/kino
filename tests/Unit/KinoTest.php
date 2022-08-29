<?php

namespace Tests\Unit;

use Tests\TestCase;

class KinoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_auth_user()
    {
        $this->post('/login', [
            'email' => 'user2@user',
            'password' => '123456789',
        ]);
        $response = $this->get('/poster');
        $response->assertOk();
    }

    public function test_guest_user()
    {
        $this->post('/login', [
            'email' => 'dfedf@usr',
            'password' => '123456789',
        ]);
        $response = $this->get('/admin');
        $response->assertStatus(302);
    }

    public function test_wrong_register_validate()
    {
        $response = $this->post('/register', [
            'name' => 'some name',
            'surname' => 'some surname',
            'address' => 'addres.25',
            'phone' => '0502525454',
            'password' => '123456789',
        ]);
        $response->assertStatus(302);
    }
}
