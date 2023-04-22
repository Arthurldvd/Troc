<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposant extends Model
{
    protected $table = "deposant";
    protected $primaryKey = "iddeposant";
    public $timestamps = false;
}
