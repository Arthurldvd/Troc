<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achete extends Model
{
    protected $table = "achete";
    protected $primaryKey = "refproduit";
    public $timestamps = false;
}
