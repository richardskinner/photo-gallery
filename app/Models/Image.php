<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';
    protected $fillable = ['title', 'image'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
