<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Disease_Sysmtom extends Model
{
    protected $table = 'disease__sysmtoms';

    protected $fillable = [
        'disease_id','symptom_id',
    ];

    public function symptom(){
        return $this->belongsTo(Sysmtom::class);
    }

    public function disease(){
        return $this->belongsTo(Disease::class);
    }
}
