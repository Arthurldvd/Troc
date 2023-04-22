<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstFormeDe extends Model
{
    protected $table = "est_formee_de";
    protected $primaryKey = "refproduit";
    public $timestamps = false;
}
