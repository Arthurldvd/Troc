<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depose_avis extends Model
{
    protected $table = "depose_avis";
    protected $primaryKey = "idavisproduit";
    public $timestamps = false;
}
