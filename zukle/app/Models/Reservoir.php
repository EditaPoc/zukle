<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservoir extends Model
{
    use HasFactory;
    protected $fillable=['title', 'area', 'about' ];
    
    public function members(){
        return $this->hasMany(Member::class);
    }
}
