<?php

use function Pest\Laravel\{actingAs};
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

test('it adds a new employee', function () {
    Company::factory()->create(['name' => 'company1']);
    $user = User::factory()->create(['email' => 'admin@admin.com']);

    $this->actingAs($user);

        visit('/employees')
        ->assertSee('Employees')
        ->click('@open-modal')
        ->assertVisible('@submit-employee-btn')
        ->fill('input[name="first_name"]', 'name')
        ->fill('last_name', 'last-name')
        ->fill('email', 'name@name.com')
        ->fill('number', '01234567890')
        ->screenshot(filename: 'before-submit')
        ->click('@submit-employee-btn')
        ->screenshot(filename: 'after-submit')
        ->assertRoute('employee.index');

        expect(Employee::count())->toBe(1);
});


// test('does a thing', function () {
//     $user = User::factory()->create(['email' => 'admin@admin.com']);

//     $this->actingAs($user);

//     visit('/employees')
//         ->assertSee('Employees');
// });