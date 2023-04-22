<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensions extends Model
{
    protected $table = "dimensions";
    protected $primaryKey = "iddimensions";
    public $timestamps = false;
}
