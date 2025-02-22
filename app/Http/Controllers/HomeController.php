<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PlanDetail;
use App\Models\PlanCategory;
use App\Models\User;

class HomeController extends Controller
{
    
    public function index()
    {
        $planDetails = PLanDetail::with('categories', 'bmis')->get();
        
        $countCategories = PlanCategory::get()->count();
        $countUser = User::get()
            ->where('is_admin', false)->count();
        $countPlans = $planDetails->count();
        //dd($planDetails);
        return view('home', compact('planDetails', 'countPlans', 'countCategories', 'countUser'));
    }

    public function calculate($weight, $height)
    {
        //calculating BMI (height is in Meters)
        $bmi = ($weight / ($height * $height));

        return response()->json($bmi);
    }

}