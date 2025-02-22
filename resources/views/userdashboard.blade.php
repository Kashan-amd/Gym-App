@extends('layouts.app', ['pageSlug' => 'userdashboard'])

@section('content')
<div class="modal fade bd-example-modal-lg" id="showDetails" style="background-color:#1e1e26;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<h5 class="card-category">User Dashboard</h5>
<div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">BMI</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bold text-primary"></i> Your BMI <label style="font-size:20px" id="bmi_value"></label></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="number" step="0.25" name="weight" id="weight" class="form-control" required placeholder="{{ __('Weight') }}">
                                @include('alerts.feedback', ['field' => 'weight'])
                            </div>
                            <div class="form-group">
                                <input type="number" step="0.25" name="height" id="height" class="form-control" required placeholder="{{ __('Height') }}">
                                @include('alerts.feedback', ['field' => 'height'])
                            </div>
                            </div>
                            
                            <div class="card-footer">
                                <input class="btn btn-fill btn-primary" onclick="calculateBMI()" type="button" value="Calculate BMI">
                            </div>
                        </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">All</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> My Plans</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table tablesorter table-stripped" id="">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Duration</th>
                                            <th>More Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($planDetails as $key)
                                            <tr>
                                                <td>{{ $key->plan_name }}</td>
                                                <td>{{ $key->categories->category }}</td>
                                                <td>{{ $key->duration }}</td>
                                                <td>
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
        </div>

        <!-- <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Plans</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 2</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    

@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });

        function calculateBMI()
        { 
            var weight = document.getElementById('weight').value;
            var height = document.getElementById('height').value;
            var request = new XMLHttpRequest();
            request.open("GET", "/calculateuserbmi/"+weight+"/"+height, false);
            request.send();
            //console.log(request.response);
            document.getElementById('bmi_value').innerHTML = parseFloat(request.response).toFixed(2);
            location.reload();
        }
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
