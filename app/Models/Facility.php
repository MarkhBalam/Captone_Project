<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model{
    protected $fillable = ['name','location','description','partner_organization','facility_type','capabilities'];
    protected $casts = ['capabilities'=>'array'];
    
    
}
