@extends('layouts.app', ['page' => __('Customers'), 'pageSlug' => 'customers'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Customers Signed Up</h4>
        <p class="category"> All customers</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th class="text-center">BMI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Dakota Rice</td>
                <td>Female</td>
                <td>27</td>
                <td class="text-center">22.02</td>
              </tr>
              <tr>
                <td>Mark Hooper</td>
                <td>Male</td>
                <td>34</td>
                <td class="text-center">26.5</td>
              </tr>
              <tr>
                <td>Sage Rodriguez</td>
                <td>Male</td>
                <td>21</td>
                <td class="text-center">16.4</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
