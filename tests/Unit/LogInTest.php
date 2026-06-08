<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->artisan('db:seed', [
        '--class' => 'DatabaseSeeder',
    ]);
});

test('it logs in the admin and redirects to the welcome page', function () {
    $page = visit('/login');
    $page
        ->assertSee('Login')
        ->assertSee('Email')
        ->fill('@email', 'admin@admin.com')
        ->fill('@password', 'password')
        ->click('@login-button');
    $page->assertSee('Welcome')
        ->assertDontSee('Login');
});

test('it redirects to login', function () {
    visit('/companies')
        ->assertRoute('login');
});

// test('it sees if you are guest', function () {
//     visit('/')
//         $this->assertGuest();
// });    