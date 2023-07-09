<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yolov1 extends Model
{
    protected $table = 'yolov1s';

    protected $fillable = [
        "tumbuh", "belumTumbuh", "waktu"
    ];
}
