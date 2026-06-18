<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'website',
    ];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeSort($query, string $sort) {
        return match ($sort) {
            'latest' => $query->latest(),
            'oldest' => $query->oldest(),
            'aToZ' => $query->orderBy('name'),
            'zToA' => $query->orderBy('name', 'desc'),
            'employeesAsc' => $query->orderBy('employees_count'),
            'employeesDesc' => $query->orderBy('employees_count', 'desc'),

            default => $query->latest(),
        };
    }

    public function scopeSearch($query, ?string $search) {

            if (!$search) {
                return $query;
            }

            $search = trim($search);
            
            return $query
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('website', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
    }
}