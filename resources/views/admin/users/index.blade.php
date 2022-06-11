@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>
      Add User Form      
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>      
      <li class="active">{{$breadCrumb[0]}}</li>
    </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email(s)</th>
                  <th>Age</th>      
                  <th>Phone</th>      
                  <th>Country</th>      
                  <th>Action</th>      
                </tr>
                </thead>
                <tbody>                
                  @if(!empty($users))
                    @foreach($users as $user)                 
                     <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{(!empty($user->user_detail) ? $ageList[$user->user_detail->age] : "")}}</td>
                        <td>{{$user->user_detail->contact_no ?? '-'}}</td>  
                        <td>{{(!empty($user->user_detail) ? $countryList[$user->user_detail->country_id] : "")}}</td>                                             
                        <td><a href="{{url('/admin/users/edit/'.$user->id)}}" ><i class="fa fa-pencil"></i></a></td>
                    </tr>
                     @endforeach
                  @endif
              
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>
@endsection
