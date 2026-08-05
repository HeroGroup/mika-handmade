<?php

use App\Enums\UserType;
use App\Models\User;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect('/');
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('admin users can login to the admin portal', function () {
    $admin = User::factory()->create([
        'user_type' => UserType::Admin,
    ]);

    $response = $this->post('/login', [
        'email' => $admin->email,
        'password' => 'password',
        'portal' => 'admin',
    ]);

    $this->assertAuthenticatedAs($admin);
    $response->assertRedirect('/admin/dashboard');
});

test('admin users can login to the client portal and be redirected to the website', function () {
    $admin = User::factory()->create([
        'user_type' => UserType::Admin,
    ]);

    $response = $this->post('/login', [
        'email' => $admin->email,
        'password' => 'password',
        'portal' => 'client',
    ]);

    $this->assertAuthenticatedAs($admin);
    $response->assertRedirect('/');
});

test('client users cannot access the admin portal', function () {
    $client = User::factory()->create([
        'user_type' => UserType::Client,
    ]);

    $response = $this->post('/login', [
        'email' => $client->email,
        'password' => 'password',
        'portal' => 'admin',
    ]);

    $this->assertGuest();
    $response->assertRedirect('/');
    $response->assertSessionHasErrors('email');
});

test('clients can register with their name email password and phone', function () {
    $response = $this->post('/register', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '1234567890',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $user = User::where('email', 'jane@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Jane Doe')
        ->and($user->phone)->toBe('1234567890')
        ->and($user->user_type)->toBe(UserType::Client);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect('/');
});

test('client users receive a forbidden response when visiting admin dashboard', function () {
    $client = User::factory()->create([
        'user_type' => UserType::Client,
    ]);

    $response = $this->actingAs($client)->get('/admin/dashboard');

    $response->assertForbidden();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
