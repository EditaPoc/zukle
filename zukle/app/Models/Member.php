<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    
    protected $fillable=['name', 'surname', 'live', 'experiency', 'registered', 'reservoir_id' ];
    
    public function reservoir(){
        return $this->belongsTo(Reservoir::class);
    }
}
