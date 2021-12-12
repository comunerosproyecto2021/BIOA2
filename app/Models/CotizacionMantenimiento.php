<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionMantenimiento extends Model
{ 
    protected $table = 'cotizaciones_mantenimientos';
    public $timestamps = false;
    use HasFactory;
    protected $guarded = [];

}
