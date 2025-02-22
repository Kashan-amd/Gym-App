<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\BmiDetail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function calculate($weight, $height)
    {
        //calculating BMI (height is in Meters)
        $bmi = ($weight / ($height * $height));
        $user = User::find(Auth::user()->id);
       
        //dd($bmi);
        $categorizeBmi = BmiDetail::where('min_range', '<=', $bmi)
            ->where('max_range', '>=', $bmi)
            ->first()->id;

        $user->bmi = $bmi;
        $user->bmi_range_id = $categorizeBmi;
        $user->update();
        
        //dd($categorizeBmi);
        return response()->json($bmi);
    }

}
