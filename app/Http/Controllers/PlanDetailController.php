<?php

namespace App\Http\Controllers;

use App\Models\PlanDetail;
use App\Models\PlanCategory;
use App\Models\BmiDetail;
use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planDetails = PlanDetail::with('categories', 'bmis')->get();
        //$planDetails = PlanCategory::with('plans')->get();
        $bmiDetails = BmiDetail::with('plans')->get();
        //dd($planDetails);
 
        $categories = PlanCategory::get();
        return view('pages.plans', compact('planDetails', 'bmiDetails', 'categories','planDetails'));
    }
    public function getPlanDetails($id)
    {
        $planDetails  = PlanDetail::where('id', $id)
            ->get();
        return response()->json($planDetails);
    }

    public function storePlan(Request $request){
         
        $fileName = "";
        $filePath = "";
        if ($request->file()) {
            $fileName = time().'_'.$request->plan_img->getClientOriginalName();
            $filePath = $request->file('plan_img')->StoreAs('public/upload', $fileName);
        }
        $data = PlanDetail::create([
            'plan_name' => $request->plan_name,
            'plan_category_id' => $request->category,
            'bmi_detail_id' => $request->bmi_range,
            'duration' => $request->duration,
            'description' => $request->plan_description,
            'suggestion' => $request->plan_suggestion,
            'file_name' => $fileName,
            'file_path' => $filePath
        ]);
        return redirect('dashboard');
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
     * @param  \App\Models\PlanDetail  $planDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PlanDetail $planDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanDetail  $planDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanDetail $planDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanDetail  $planDetail
     * @return \Illuminate\Http\Response
     */
    public function update($id, $plan_name, $category, $bmi_range, $duration)
    {
        $updatePlan = PlanDetail::where('id', $id)->first();
        $updatePlan->plan_name = $plan_name;
        $updatePlan->category = $category;
        $updatePlan->bmi_range = $bmi_range;
        $updatePlan->duration = $duration;
        $updatePlan->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanDetail  $planDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($planDetail)
    {
        $deletePlan = PlanDetail::find($planDetail)->delete();
        $message = "";
        if($deletePlan){
            $message = "Plan Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }
}
