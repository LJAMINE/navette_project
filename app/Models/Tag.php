<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function announces()
    {
        return $this->belongsToMany(Announce::class);
    }
}
   