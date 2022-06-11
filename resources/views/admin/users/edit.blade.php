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
<form method="POST" action="/admin/users/update/{{$user['id']}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="row">
      <div class="box box-primary"> 
        <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="fname">First Name<span class="error">*</span></label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="fname" name="first_name" value="{{old('first_name', $user['first_name'])}}" placeholder="Enter First Name">
                  @if ($errors->has('first_name'))
                  <span class="text-danger">{{ $errors->first('first_name') }}</span>
                  @endif
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address<span class="error">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email', $user['email'])}}">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
              </div>  
              <div class="form-group">
                  <label for="country">Select County</label>
                  <select class="form-control" name="country_id">
                  @foreach($countryList as $country)
                      <option value="{{ $country->id }}" {{ $user['user_detail']['country_id'] == $country->id ? 'selected' : ''}}>{{ $country->name}}</option>
                  @endforeach 
                  </select>
              </div> 
              <div class="form-group">
                  <label for="contact">Contact Number<span class="error">*</span></label>
                  <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" id="contact" placeholder="Enter Contact Number" value="{{old('contact_no', $user['user_detail']['contact_no'])}}">
                  @if ($errors->has('contact_no'))
                  <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                  @endif
              </div>   
            </div>   
            <div class="col-md-6">
               <div class="form-group">
                  <label for="lname">Last Name<span class="error">*</span></label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lname" name="last_name" placeholder="Enter Last Name" value="{{old('last_name', $user['last_name'])}}" />
                  @if ($errors->has('last_name'))
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
                  @endif
              </div>
              <div class="form-group">
                <label for="country">Select Age</label>
                {!! Form::select('age', $ageList, $user['user_detail']['age'] ,array('placeholder' => 'Select Age','class' => 'form-control')) !!}
              </div>
              <div class="form-group">
                  <label>Select Skills</label>
                  @php
                    $selectedSkills = explode(",",$user['user_detail']['skills']);                    
                    @endphp
                  <select multiple class="form-control" name="skills[]">                   
                    @foreach($skillsList as $skill)                    
                    <option value="{{$skill}}" {{in_array($skill,$selectedSkills) ? 'selected' : ''}}>{{$skill}}</option>
                    @endforeach
                  </select>
                </div>    
            </div>      
            <div class="col-md-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
         </div>     
      </div>     
    </div>
</form>

<section>
@endsection