<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function RoomType(){
        return $this->belongTo(RoomType::class, 'roomtype_id','id');
    }
}
