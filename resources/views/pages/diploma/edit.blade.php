@extends('layouts.app', ['activePage' => 'diploma_list', 'titlePage' => __('Diploma Holder')])

@section('content')
<style>
  .col-form-label{
    font-weight: bold;
    background-color: black !important;
    color: white !important;
  }
  hr{
    margin: 5px !important;
    border-top: 2px solid black !important;
  }
  .middle-button{
    padding: 5px;
    margin-right:10px;
    margin-top:10px;
    border-style: solid;
    border-radius:5px;
    cursor:pointer;
  }
</style>
  <div class="content">
    <div class="container-fluid">
      <div class="row " >
            <!--<div class="col-md-12 " align="right">
             
              <a href="{{ url('/institutes') }}" class="btn btn-primary">
              
                <span class="material-icons left">
                list
                </span>
                Show Institute List
                </a>
-->
            </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ url('register/diploma/update/'. $student->stu_id) }}" autocomplete="off" class="form-horizontal">
          <!--action="{{ url('institutes') }}"-->
          @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary" style="padding-top:5px !important; padding-bottom:5px !important;">
                <h4 class="card-title">{{ __('Edit Diploma Holding Student Details') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Register No') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('dip_reg_no') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('dip_reg_no') ? ' is-invalid' : '' }}" name="dip_reg_no" id="dip_reg_no" type="text" placeholder="" value="{{ $student->dip_reg_no }}" required="true" aria-required="true"/>
                      @if ($errors->has('dip_reg_no'))
                        <span id="dip_reg_no-error" class="error text-danger" for="dip_reg_no">{{ $errors->first('dip_reg_no') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Register Date') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('dip_reg_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('dip_reg_date') ? ' is-invalid' : '' }}" name="dip_reg_date" id="dip_reg_date" type="date" placeholder="" value="{{ $student->dip_reg_date }}" required="true" aria-required="true"/>
                      @if ($errors->has('dip_reg_date'))
                        <span id="dip_reg_date-error" class="error text-danger" for="dip_reg_date">{{ $errors->first('dip_reg_date') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label form-lable-black text-dark bg-info">{{ __('Submit via') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('submit_via') ? ' has-danger' : '' }}">
                      <select class="form-control" name="submit_via" id="submit_via">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option {{ $student->submit_via == 'Post' ? 'selected' : '' }} value="Post">Post</option>
                        <option {{ $student->submit_via == 'Hand' ? 'selected' : '' }} value="Hand">Hand</option>
                        <option {{ $student->submit_via == 'Online' ? 'selected' : '' }} value="Online">Online</option>
                      </select>
                    @if ($errors->has('submit_via'))
                        <span id="submit_via-error" class="error text-danger" for="submit_via">{{ $errors->first('submit_via') }}</span>
                      @endif
                    </div>
                  </div>
                  
                </div>
                <hr>
                <div class="row">
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Title') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('stu_title') ? ' has-danger' : '' }}">
                      <select class="form-control" name="stu_title" id="stu_title">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        
                        <option value="Rev." {{ $student->stu_title == 'Rev.' ? 'selected' : '' }} >Rev.</option>

                        <option {{ $student->stu_title == 'Mr.' ? 'selected' : '' }} value="Mr.">Mr.</option>
                        <option {{ $student->stu_title == 'Mrs.' ? 'selected' : '' }} value="Mrs.">Mrs.</option>
                        <option {{ $student->stu_title == 'Miss.' ? 'selected' : '' }} value="Miss.">Miss.</option>
                      </select>
                      @if ($errors->has('stu_title'))
                        <span id="stu_title-error" class="error text-danger" for="stu_title">{{ $errors->first('ins_type') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Name') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="" value="{{ $student->stu_name }}" required="true" aria-required="true"/>
                      @if ($errors->has('stu_name'))
                        <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                      @endif
                    </div>
                  </div>
                  
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Date of Birth') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="dob" type="date" placeholder="" value="{{ $student->dob }}" required="true" aria-required="true"/>
                            @if ($errors->has('dob'))
                                <span id="dob-error" class="error text-danger" for="dob">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                    </div>  
                </div>
                <div class="row">
                 <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Gender') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                      <select class="form-control" name="sex" id="sex">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option value="Male" {{ $student->sex == 'Male' ? 'selected' : '' }} >Male</option>
                        <option value="Female" {{ $student->sex == 'Female' ? 'selected' : '' }} >Female</option>
                      </select>
                      @if ($errors->has('sex'))
                        <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Address') }}</label>
                    <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" type="text" placeholder="" value="{{ $student->address }}" required="true" aria-required="true"/>
                            @if ($errors->has('address'))
                                <span id="address-error" class="error text-danger" for="address">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>  
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('NIC') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('nic') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" name="nic" id="nic" type="text" placeholder="" value="{{ $student->nic }}" required="true" aria-required="true"/>
                            @if ($errors->has('nic'))
                                <span id="nic-error" class="error text-danger" for="nic">{{ $errors->first('nic') }}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                

                <div class="row">
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('District') }}</label>
                    <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('ds_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="ds_id" id="ds_id">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option value="1" {{ $student->ds_name == 'Kegalle' ? 'selected' : '' }} >Kegalle</option>
                        <option value="2" {{ $student->ds_name == 'Rathnapura' ? 'selected' : '' }} >Ratnapura</option>
                      </select>
                      @if ($errors->has('ds_id'))
                        <span id="ds_id-error" class="error text-danger" for="ds_id">{{ $errors->first('ds_id') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('DS Area') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('dv_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="dv_id" id="dv_id">
                        <option value="0" selected="selected" disabled="disabled">Pick One...</option>
                        @foreach($divisions as $key => $data)
                          <option value="{{$data->dv_id}}" @if($data->dv_id==$student->dv_id) selected='selected' @endif >{{$data->dv_name}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('dv_id'))
                        <span id="dv_id-error" class="error text-danger" for="dv_id">{{ $errors->first('dv_id') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('TP No') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" id="telephone" type="text" placeholder="" value="{{ $student->telephone }}" required="true" aria-required="true"/>
                            @if ($errors->has('telephone'))
                                <span id="telephone-error" class="error text-danger" for="telephone">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Email Address') }}</label>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" type="email" placeholder="" value="{{ $student->email }}" required="true" aria-required="true"/>
                            @if ($errors->has('email'))
                                <span id="email-error" class="error text-danger" for="email">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Institute') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('ins_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="ins_id" id="ins_id">
                        <option value="0" selected="selected" disabled="disabled">Pick One...</option>
                        @foreach($institutes as $key => $data)
                        <option value="{{$data->ins_id}}" @if($data->ins_id==$student->ins_id) selected='selected' @endif >{{$data->ins_name}}</option>
                        @endforeach
                      </select>
                      
                      @if ($errors->has('ins_id'))
                        <span id="ins_id-error" class="error text-danger" for="ins_id">{{ $errors->first('ins_id') }}</span>
                      @endif
                    </div>
                  </div>
                  
                  <div class="col-sm-2" style="margin-top:10px;">
                  <a href="{{ url('institutes/create') }}" target="_blank" class="middle-button">
                      <span class="material-icons left">add</span>
                    </a>
                  
                    <a type="button" onclick="load_institute();" class="middle-button">
                      <span class="material-icons left">autorenew</span>
</a>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Diploma') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('dip_title') ? ' has-danger' : '' }}">
                      <input class="form-control" list="dip_title" name="dip_title" value="{{ $student->dip_title }}">
                      <datalist id="dip_title">
                        @foreach($diplomas as $key => $data)
                          <option value="{{$data->dip_title}}" ></option>
                        @endforeach
                      </datalist>
                      @if ($errors->has('dip_title'))
                        <span id="dip_title-error" class="error text-danger" for="dip_title">{{ $errors->first('dip_title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Diploma Medium') }}</label>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('dip_medium') ? ' has-danger' : '' }}">
                        <select class="form-control" name="dip_medium" id="dip_medium">
                            <option value="0" selected="selected" disabled="disabled">Pick One...</option>
                            <option value="Sinhala" {{ $student->dip_medium == 'Sinhala' ? 'selected' : '' }}>Sinhala</option>
                            <option value="Tamil" {{ $student->dip_medium == 'Tamil' ? 'selected' : '' }}>Tamil</option>
                            <option value="English" {{ $student->dip_medium == 'English' ? 'selected' : '' }}>English</option>
                        </select>
                        @if ($errors->has('dip_medium'))
                            <span id="dip_medium-error" class="error text-danger" for="dip_medium">{{ $errors->first('dip_medium') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Diploma Duration (in Months)') }}</label>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('dip_duration') ? ' has-danger' : '' }}">
                        <select class="form-control" name="dip_duration" id="dip_duration">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="12" {{ $student->dip_duration == '12' ? 'selected' : '' }}>12</option>
                            <option value="18" {{ $student->dip_duration == '18' ? 'selected' : '' }}>18</option>
                            <option value="24" {{ $student->dip_duration == '24' ? 'selected' : '' }}>24</option>
                            <option value="30" {{ $student->dip_duration == '30' ? 'selected' : '' }}>30</option>
                            <option value="36" {{ $student->dip_duration == '36' ? 'selected' : '' }}>36</option>
                            <option value="42" {{ $student->dip_duration == '42' ? 'selected' : '' }}>42</option>
                            <option value="48" {{ $student->dip_duration == '48' ? 'selected' : '' }}>48</option>
                          </select>
                        @if ($errors->has('dip_duration'))
                            <span id="dip_duration-error" class="error text-danger" for="dip_duration">{{ $errors->first('dip_duration') }}</span>
                        @endif
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Effective Date') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('dip_effective_date') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('dip_effective_date') ? ' is-invalid' : '' }}" name="dip_effective_date" id="dip_effective_date" type="date" placeholder="" value="{{ $student->dip_effective_date }}" required="true" aria-required="true"/>
                        @if ($errors->has('dip_effective_date'))
                            <span id="dip_effective_date-error" class="error text-danger" for="dip_effective_date">{{ $errors->first('dip_effective_date') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Job Preferance') }}</label>
                    <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('dip_job_preference') ? ' has-danger' : '' }}">
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dip_job_preference[]"  value="Government" {{ (is_array( $dip_job_preference) && in_array('Government', $dip_job_preference)) ? ' checked' : '' }}>Government
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dip_job_preference[]"  value="Private" {{ (is_array($dip_job_preference) && in_array('Private', $dip_job_preference)) ? ' checked' : '' }}>Private
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dip_job_preference[]"  value="Self Industry" {{ (is_array($dip_job_preference) && in_array('Self Industry', $dip_job_preference)) ? ' checked' : '' }}>Self Industry
                          </label>
                        </div>
                        @if ($errors->has('dip_job_preference'))
                            <span id="dip_job_preference-error" class="error text-danger" for="dip_job_preference">{{ $errors->first('dip_job_preference') }}</span>
                        @endif
                        </div>
                    </div>
                    
                </div>
              </div>
              <div class="card-footer ">
                <div class="col-md-6 " align="right">
                  <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                </div>
                <div class="col-md-6 " align="right">
                  <a href="{{ url('/register/diploma/show') }}" class="btn btn-info">
                    <span class="material-icons left">list</span>
                    Diploma Student List
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
    </div>
  </div>
@endsection