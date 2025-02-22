@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')

<div class="modal fade bd-example-modal-lg  "id="showDetails" style="background-color:#1e1e26;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color:#27293d;">
            <div class="modal-header">
                <h4 class="card-title" id="exampleModalLabel">Plan Details</h4>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                  
                        <div class="table-responsive">
                            <table class="table tablesorter table-stripped" id="">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>Plan Image</th>
                                        <th>Description</th>
                                        <th>Suggestion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        <td><img id='plan_image' src="" alt="plan image" class="image_pro"></td>
                                        <td><p  style = "color:white" id="desc"></p></td>
                                        <td><p style = "color:white" id="suggestion"></p></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<h5 class="card-category">Admin Dashboard</h5>

<div class="row">
    
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">All Plans</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>BMI Range</th>
                            <th class="text-center">Duration</th>
                            <th class="text-center">More Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($planDetails as $key)
                                <tr>
                                    <td>{{ $key->plan_name }}</td>
                                    <td>{{ $key->categories->category }}</td>
                                    <td>{{ $key->bmis->min_range}} - {{ $key->bmis->max_range }}</td>
                                    <td class="text-center">{{ $key->duration }}</td>
                                    
                                    <td class="text-center">
                                        <button type="button" rel="tooltip" onclick="getPlanDetails(this.id)" id="{{ $key->id }}" class="user_dialog btn btn-success btn-md" data-toggle="modal" data-target="#showDetails">
                                            <i class="tim-icons icon-alert-circle-exc"></i>
                                        </button>
                                    </td>
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



    <!-- <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total</h5>
                            <h2 class="card-title">Plans</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Diet</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Nutrition</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Exercise</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total</h5>
                    <h3 class="card-title"><i class="text-primary"></i>Users Signed Up</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Tasks</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });

        function getPlanDetails(x)
        {    
            var img = document.getElementById('plan_image');
            
            var request =  new XMLHttpRequest();
            request.open("GET", "/getplandetails/"+x, false);
            request.send();
            var response = JSON.parse(request.response); 
            img.src = 'storage/upload/'+response[0].file_name;
            //console.log(response[0].description);
            document.getElementById('desc').innerHTML = response[0].description;
            document.getElementById('suggestion').innerHTML = response[0].suggestion;
        }
    </script>
@endpush
