<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'title',
        'num_chapter',
        'content',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
