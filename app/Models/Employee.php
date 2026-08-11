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
            'latest' => $query->latest(),
            'oldest' => $query->oldest(),
            'aToZ' => $query->orderBy('last_name'),
            'zToA' => $query->orderBy('last_name', 'desc'),
            'companiesAsc' => $query
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->orderBy('companies.name')
                ->select('employees.*'),
            'companiesDesc' => $query
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->orderBy('companies.name', 'desc')
                ->select('employees.*'),
            

            default => $query->latest(),
        };
    }
    public function scopeSearch($query, ?string $search) {

            if (!$search) {
                return $query;
            }

            $search = trim($search);

            return $query
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('employees.email', 'LIKE', "%{$search}%")
            ->orWhereHas('company', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            });
    }
}