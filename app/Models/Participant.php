<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    use HasFactory;

    protected $guard = 'participants';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
