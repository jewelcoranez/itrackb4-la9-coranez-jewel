<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable  = [
        'title',
        'pages',
        'is_available',
        'author',
    ];

    protected function casts(): array
    {
        return [
            'pages' => 'integer',
            'is_available' => 'boolean',
        ];
    }
}