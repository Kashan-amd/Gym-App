<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\BmiDetail;
use App\Models\PlanDetail;
use App\Models\PlanCategory;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planDetails = PLanDetail::with('categories', 'bmis')->get();

        if (Auth::check() && Auth::user()->is_admin) {
            return view('dashboard',compact('planDetails'));
        } else {
            //dd(Auth::user()->bmi_range_id);
            $bmi = BmiDetail::get();
            $planDetails = PlanDetail::with('categories', 'bmis')
                ->where('bmi_detail_id', '=', Auth::user()->bmi_range_id)->get();
            //dd($planDetails);
            return view('userdashboard',compact('bmi', 'planDetails'));

        }
        
    }

    // public function userdashboard(){
    //     return view('userdashboard');
    // }

    public function logout(Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
