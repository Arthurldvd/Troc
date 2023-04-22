<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratDepotVente extends Model
{
    protected $table = "contratdepotvente";
    protected $primaryKey = "numerocontratdepotvente";
    public $timestamps = false;
}
