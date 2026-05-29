<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    //makes a certain number of companies and creates a random amount of employees for each in a range
    public function run(): void
    {
        Company::factory()
            ->count(20)
            ->create()
            ->each(function ($company) {
                Employee::factory()
                    ->count(rand(3, 10))
                    ->create([
                        'company_id' => $company->id,
                    ]);
            });
        
        $this->call([
            AdminSeeder::class,
        ]);
    }
}
