<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_manual_record extends Model
{
    use HasFactory;

    public function board() {
        return $this->hasOne(board::class, 'id', 'board_id');
    }
}
