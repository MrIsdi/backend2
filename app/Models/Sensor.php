<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensors';

    protected $fillable = [
        "suhu", "lembap", "cahaya", "kipas", "mist", "waktu"
    ];
}
