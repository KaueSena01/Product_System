<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Afirmando que o evento pertecem a um
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // Muitos produtos e um usuário
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    protected $guarded = [];
}
