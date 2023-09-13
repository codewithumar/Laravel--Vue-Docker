<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Student extends Model
{
    use HasFactory, HasUuids;
    protected $table = "student";

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'course'
    ];
}
