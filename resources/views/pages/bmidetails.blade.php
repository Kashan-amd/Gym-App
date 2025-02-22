@extends('layouts.app', ['page' => __('BMI Details'), 'pageSlug' => 'bmidetails'])
@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> BMI Managment</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter" id="">

                    <thead class=" text-primary">
                    <tr>
                        <th class="text-center">Min Range</th>
                        <th class="text-center">Max Range</th>
                        <th class="text-center">BMI Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($details as $key)
                    <tr>
                        <td class="text-center">{{ $key->min_range }}</td>
                        <td class="text-center">{{ $key->max_range }}</td>
                        <td class="text-center">{{ $key->category }}</td>
                        <td class="td-actions text-center">
                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                <i class="tim-icons icon-settings"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                <i class="tim-icons icon-simple-remove" id="{{ $key->id }}" onclick="deleteBmi(this.id)"></i>
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

    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Add BMI Category') }}</h5>
                <span style="color:#1f9388" class="title" id="message"></span>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="number" step="0.25" name="min_range" id="min_range" class="form-control" placeholder="{{ __('Min Range') }}">
                    @include('alerts.feedback', ['field' => 'min_range'])
                </div>

                <div class="form-group">
                    <input type="number" step="0.25" name="max_range" id="max_range" class="form-control" placeholder="{{ __('Max Range') }}">
                    @include('alerts.feedback', ['field' => 'max_range'])
                </div>

                <div class="form-group">
                    <input type="text" name="category" id="category" class="form-control" placeholder="{{ __('Category') }}">
                    @include('alerts.feedback', ['field' => 'category'])
                </div>

            </div>
            <div class="card-footer">
                <input class="btn btn-fill btn-success" onclick="saveDetails()" type="button" value="Save">
            </div>
        </div>
    </div>

</div>

<script>
    function deleteBmi(id){
        var request = new XMLHttpRequest();
        request.open("GET", "admin/deletebmi/"+id, false);
        request.send();
        //document.getElementById('deleted').innerHTML = request.response;
        location.reload();
    }
    function saveDetails(){
        var min_range = document.getElementById('min_range').value;
        var max_range = document.getElementById('max_range').value;
        var category  = document.getElementById('category').value;
        var request = new XMLHttpRequest();
        request.open("GET", "admin/bmidetails/"+min_range+"/"+max_range+"/"+category, false);
        request.send();
        console.log(request.response);
        document.getElementById('message').innerHTML = request.response;
        location.reload();
    }
</script>

@endsection
