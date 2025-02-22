<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetail extends Model
{
    use HasFactory;
    public $guarded = [];

    public function bmis(){
        return $this->belongsTo(BmiDetail::class, 'bmi_detail_id');
    }
    public function categories()
    { 
        return $this->belongsTo(PlanCategory::class, 'plan_category_id'); 
    }

}
