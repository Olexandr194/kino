<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    public function test_index()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);
        $response = $this->get(route('admin.users.index'));
        $response->assertOk();
    }

    public function test_register()
    {
        $this->post('/register', [
            'name' => 'some name',
            'email' => 'testemail@ukr.net',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'some name',
            'email' => 'testemail@ukr.net',
        ]);
    }

    public function test_edit()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);

        $user = User::where('name', 'some name')->first();
        $response = $this->get(route('admin.users.edit', $user->id));
        $response->assertOk();
    }

    public function test_update()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);
        $user = User::where('name', 'some name')->first();
        $this->patch(route('admin.users.update', $user->id), [
            'name' => 'new name',
            'surname' => 'new surname',
            'nickname' => 'new nickname',
            'address' => 'some new address, 45',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'new name',
            'surname' => 'new surname',
            'nickname' => 'new nickname',
            'address' => 'some new address, 45',
        ]);
    }

    public function test_delete()
    {
        $this->post('/login', [
            'email' => 'olexandrmirochnik@gmail.com',
            'password' => '123456789',
        ]);

        $user = User::where('name', 'new name')->first();
        $this->post(route('admin.users.destroy_user', $user->id));
        $user->delete();
        $this->assertDatabaseMissing('users', ['name' => 'new name']);
    }

}
