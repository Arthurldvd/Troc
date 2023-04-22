<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemiJournee extends Model
{
    protected $table = "demijournee";
    protected $primaryKey = "iddemijournee";
    public $timestamps = false;
}
