<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvre_le extends Model
{
    protected $table = "ouvre_le";
    protected $primaryKey = "idjour";
    public $timestamps = false;
}
