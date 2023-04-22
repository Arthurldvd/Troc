<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    protected $table = "signalement";
    protected $primaryKey = "idsignalement";
    public $timestamps = false;
}
