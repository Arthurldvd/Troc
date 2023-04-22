<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horraires extends Model
{
    protected $table = "horaires";
    protected $primaryKey = "idhoraires";
    public $timestamps = false;
}
