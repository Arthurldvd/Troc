<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    protected $table = "jour";
    protected $primaryKey = "idjour";
    public $timestamps = false;
}
