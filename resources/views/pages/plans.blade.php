@extends('layouts.app', ['page' => __('Plans'), 'pageSlug' => 'plans'])

@section('content')
<div class="modal fade" id="editCategory" style="background-color:#1e1e26;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#27293d;">

          <div class="modal-header">
              <h4 class="card-title" id="exampleModalLabel">Update Plan</h4>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                  @csrf
                  <div class="form-group">
                      <input type="text" name="modal_plan_name" id="modal_plan_name" class="form-control" placeholder="{{ __('Plan Name') }}">
                      @include('alerts.feedback', ['field' => 'modal_plan_name'])
                  </div>

                  <div class="form-group">
                      <input type="text" name="modal_category" id="modal_category" class="form-control" placeholder="{{ __('Category') }}">
                      @include('alerts.feedback', ['field' => 'modal_category'])
                  </div>
                  
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                          <input type="text" name="modal_duration" id="_modal_duration" class="form-control" placeholder="{{ __('Duration') }}">
                          @include('alerts.feedback', ['field' => 'modal_duration'])
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <select name="modal_bmi_range" id="modal_bmi_range" class="form-control" placeholder="BMI Range">
                          @foreach($bmiDetails as $item)
                          <option class="form-control" style="background-color:#1e1e28;" value="{{$item->id}}">{{$item->min_range}} - {{$item->max_range}}</option>
                          @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'bmi_range'])
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
          <div class="modal-footer from-group">
            <p onclick="updatePlan()" style="height:2.5rem;" class='btn btn-success' value="">Update</p>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
          </div>
      </div>
  </div>  
</div>
<div class="row">
  <div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h5 class="title">{{ __('Add a Plan') }}</h5>
              <!-- <span id="message" class="text-primary"></span> -->
        </div>
        <div class="card-body">
          <form action="{{ route('storePlan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="{{ __('Plan Name') }}">
                @include('alerts.feedback', ['field' => 'plan_name'])
            </div>

            <div class="form-group">
                <select name="category" id="category" class="form-control">
                  @foreach($categories as $key)
                    <option style="background-color:#1e1e28;" value="{{$key->id}}">{{$key->category}}</option>
                  @endforeach
                </select>
                <!-- <input type="text" name="category" id="category" class="form-control" placeholder="{{ __('Category') }}"> -->
                @include('alerts.feedback', ['field' => 'category'])
            </div>
            
            <div class="form-group">
                <textarea type="text" name="plan_description" id="plan_description" class="form-control" placeholder="{{ __('Description') }}" rows="5" cols="33"></textarea>
                @include('alerts.feedback', ['field' => 'plan_description'])
            </div>
            <div class="form-group">
                <textarea type="text" name="plan_suggestion" id="plan_suggestion" class="form-control" placeholder="{{ __('Plan Suggestion') }}" rows="5" cols="33"></textarea>
                @include('alerts.feedback', ['field' => 'plan_suggestion'])
            </div>

            <div class="form-row">
              <div class="col">
                <div class="form-group">
                    <input type="text" name="duration" id="duration" class="form-control" placeholder="{{ __('Duration') }}">
                    @include('alerts.feedback', ['field' => 'duration'])
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <select name="bmi_range" id="bmi_range" class="form-control" placeholder="BMI Range">
                    @foreach($bmiDetails as $item)
                    <option class="form-control" style="background-color:#1e1e28;" value="{{$item->id}}">{{$item->min_range}} - {{$item->max_range}}</option>
                    @endforeach
                  </select>
                  @include('alerts.feedback', ['field' => 'bmi_range'])
                </div>
              </div>
            </div>
            <div class="">
                <input type="file" name="plan_img" id="plan_img" class="form-control" placeholder="{{ __('Plan Image') }}">
                @include('alerts.feedback', ['field' => 'plan_img'])
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-fill btn-success" type="submit" value="Save">
        </div>
        </form>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Plan Managment</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>BMI Range</th>
                <th class="text-center">Duration</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($planDetails as $key)
              <tr>
                <td>{{ $key->plan_name }}</td>
                <td>{{ $key->categories->category }}</td>
                <td>{{ $key->bmis->min_range}} - {{ $key->bmis->max_range }}</td>
                <td class="text-center">{{ $key->duration }}</td>
                <td class="td-actions text-center">
                  <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                      <i class="tim-icons icon-settings" id="{{$key->id}}" class="user_dialog" data-toggle="modal" data-target="#editCategory"></i>
                  </button>
                  <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                      <i class="tim-icons icon-simple-remove" id="{{ $key->id}}" onclick="deletePlan(this.id)"></i>
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

<!-- <span id="deleted" class="text-primary text-center"></span> -->

<div class="row">
  <div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h5 class="title">{{ __('Add a Category') }}</h5>
            <span style="color:#1f9388" class="title" id="cat_message"></span>
        </div>
        <div class="card-body">
            @csrf
            <div class="form-group">
                <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="{{ __('Category Name') }}">
                @include('alerts.feedback', ['field' => 'cat_name'])
            </div>

        </div>
        <div class="card-footer">
            <input class="btn btn-fill btn-success" onclick="saveCategory()" type="button" value="Save">
        </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Category Managment</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table tablesorter">
            <thead>
              <th>Category</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach($categories as $key)
              <tr>
                <td>{{$key->category}}</td>
                <td class="td-actions">
                  <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                      <i class="tim-icons icon-settings" id="{{$key->id}}"></i>
                  </button>
                  <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                      <i class="tim-icons icon-simple-remove" id="{{ $key->id}}"></i>
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

<script>
  function deletePlan(id){
    var request = new XMLHttpRequest();
    request.open("GET", "admin/deleteplan/"+id, false);
    request.send();
    // document.getElementById('deleted').innerHTML = request.response;
    location.reload();
  }
  // function savePlanDetails(){
  //   var plan_name = document.getElementById('plan_name').value;
  //   var category = document.getElementById('category').value;
  //   var bmi_range = document.getElementById('bmi_range').value;
  //   var duration = document.getElementById('duration').value;
  //   var plan_description = document.getElementById('plan_description').value;
  //   var plan_suggestion = document.getElementById('plan_suggestion').value;

  //   var request = new XMLHttpRequest();
  //   request.open("GET", "admin/plandetails/"+plan_name+"/"+category+"/"+bmi_range+"/"+duration+"/"+plan_description+"/"+plan_suggestion, false);
  //   request.send();
  //   console.log(request.response);
  //   //document.getElementById('message').innerHTML = request.response;
  //   //location.reload();
  // }
  // function updatePlan(){
  //   var name = document.getElementById('modal_plan_name').value;
  //   var plan_category = document.getElementById('modal_category').value;
  //   var plan_bmi_range = document.getElementById('modal_bmi_range').value;
  //   var plan_duration = document.getElementById('modal_duration').value;

  //   var request = new XMLHttpRequest();
  //   request.open("GET", "/admin/updateplan/"+name+"/"+plan_category+"/"+plan_bmi_range+"/"+plan_duration, false);
  //   request.send();
  //   console.log(request.response);
  // }
  function saveCategory()
  { 
    var category = document.getElementById('cat_name').value; 
    var request = new XMLHttpRequest();
    request.open("GET", "admin/createcategory/"+category, false);
    request.send();
    console.log(request.response);
    //document.getElementById('message').innerHTML = request.response;
    location.reload();
  }
</script>
  

@endsection
