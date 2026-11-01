<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Book extends Model
{
    protected $fillable = [
        'title',
        'pages',
        'is_available',
        'author_id',
    ];

    protected function casts(): array
    {
        return [
            'pages' => 'integer',
            'is_available' => 'boolean',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
