<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avisproduit extends Model
{
    protected $table = "avisproduit";
    protected $primaryKey = "idavisproduit";
    public $timestamps = false;
}
