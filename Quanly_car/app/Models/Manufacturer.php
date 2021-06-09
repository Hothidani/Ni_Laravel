<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table= 'manufacturers';
    protected $fillable = ['mf_name'];
    public function cars(){
        return $this->hasMany('App\Models\Car', 'mf_id', 'id');
    }
}
    
   
    