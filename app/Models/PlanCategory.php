<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCategory extends Model
{
    use HasFactory;
    public $guarded = [];
    public function plans()
    {
        return $this->hasMany(PlanDetail::class, 'id');
    }
}
