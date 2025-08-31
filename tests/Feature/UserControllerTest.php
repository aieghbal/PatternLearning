<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserControllerTest extends TestCase
{
    public function test_index_returns_active_users()
    {
        $mock = \Mockery::mock(UserRepositoryInterface::class);
        $mock->shouldReceive('getAdminUsers')
            ->once()
            ->andReturn(collect([
                new User(['name' => 'Admin', 'email' => 'amiqbal.dev@gmail.com'])
            ]));

        // به کانتِینِر بگوییم از این mock استفاده کند
        $this->app->instance(UserRepositoryInterface::class, $mock);

        $response = $this->getJson('/users');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
    public function test_store_creates_new_user()
    {
        $repository = new \App\Repositories\EloquentUserRepository();

        $data = [
            'name' => 'Repo User',
            'email' => 'repouser@example.com',
            'password' => 'secret123',
            'role' => 'admin',
        ];

        $user = $repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'repouser@example.com',
            'name' => 'Repo User',
        ]);

        $this->assertInstanceOf(\App\Models\User::class, $user);
        $this->assertEquals('Repo User', $user->name);
    }
}
