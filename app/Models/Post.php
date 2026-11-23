<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'buku_id',
        'title',
        'description',
        'picture',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
