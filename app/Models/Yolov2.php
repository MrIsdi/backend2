<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yolov2 extends Model
{
    protected $table = 'yolov2s';

    protected $fillable = [
        "tinggi", "tinggi_2", "waktu"
    ];
}
