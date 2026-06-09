<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use App\Models\Company;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'company_id', 'email', 'number',
    ];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeSort($query, string $sort) {
        return match ($sort) {
            'latest' => $query->orderBy('created_at', 'desc'),
            'oldest' => $query->orderBy('created_at', 'asc'),
            'aToZ' => $query->orderBy('first_name', 'asc'),
            'zToA' => $query->orderBy('first_name', 'desc'),
            'companiesAsc' => $query
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->orderBy('companies.name', 'asc')
                ->select('employees.*'),
            'companiesDesc' => $query
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->orderBy('companies.name', 'desc')
                ->select('employees.*'),

            default => $query->orderBy('created_at', 'desc'),
        };
    }
}