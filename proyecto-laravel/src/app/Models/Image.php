<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    //Relation 1 -> 0*
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment')->orderBy('id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany('App\Models\Like');
    }
    //Relation 0* -> 1
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
