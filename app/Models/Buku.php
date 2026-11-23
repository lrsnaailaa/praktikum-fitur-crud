<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'tgl_terbit',
        'jenis_buku',
        'cover',
        'buku_seo'
    ];

    protected $casts = [
        'tgl_terbit' => 'date',
    ];

    public function photos()
    {
        return $this->hasMany(Post::class, 'buku_id');
    }
}
