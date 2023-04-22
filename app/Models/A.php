<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A extends Model
{
    protected $table = "a";
    protected $primaryKey = "idclient";
    public $timestamps = false;
}
