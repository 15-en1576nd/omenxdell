<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_users extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function board() {
        return $this->hasMany(board::class, 'id', 'board_id');
    }
    public function user() {
        return $this->belongsToMany(user::class, 'id', 'board_id');
    }
}
