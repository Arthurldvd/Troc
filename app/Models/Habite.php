<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habite extends Model
{
    protected $table = "habite";
    protected $primaryKey = ["idadresse","idclient"];
    public $timestamps = false;
    
}
