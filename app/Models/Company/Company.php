<?php

namespace App\Models\Company;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class Company extends Model
{
    use HasFactory, SoftDeletes, Billable;

    protected $fillable = [
        'id',
        'name',
        'email',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
