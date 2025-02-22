<?php

namespace App\Http\Controllers;

use App\Models\BmiDetail;
use Illuminate\Http\Request;

class BmiDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = BmiDetail::get();
        return view('pages.bmidetails', compact('details'));
    }

    public function storeData($min_range, $max_range, $category)
    { 
        $data = BmiDetail::create([
            'min_range' => $min_range,
            'max_range' => $max_range,
            'category' => $category
        ]);
        return response()->json('success');
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
     * @param  \App\Models\BmiDetails  $bmiDetails
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BmiDetails  $bmiDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BmiDetail $bmiDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BmiDetails  $bmiDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BmiDetails $bmiDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BmiDetails  $bmiDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($bmiDetails)
    {
        $deleteBmi = BmiDetails::find($bmiDetails)->delete();
        $message = "";
        if($deletebmi){
            $message = "Bmi Deleted";
        }
        else{
            $message = "Some error occured";
        }
    }
}
