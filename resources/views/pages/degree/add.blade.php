@extends('layouts.app', ['activePage' => 'degree', 'titlePage' => __('Graduate Register')])

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
          <form method="post" action="{{ url('institutes') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary" style="padding-top:5px !important; padding-bottom:5px !important;">
                <h4 class="card-title">{{ __('Insert New Student') }}</h4>
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
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('deg_reg_no') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('deg_reg_no') ? ' is-invalid' : '' }}" name="deg_reg_no" id="deg_reg_no" type="text" placeholder="{{ __('Register No') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_no'))
                        <span id="ins_name-error" class="error text-danger" for="deg_reg_no">{{ $errors->first('deg_reg_no') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Register Date') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('deg_reg_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('deg_reg_date') ? ' is-invalid' : '' }}" name="deg_reg_date" id="deg_reg_date" type="text" placeholder="{{ __('Register Date') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_date'))
                        <span id="deg_reg_date-error" class="error text-danger" for="deg_reg_date">{{ $errors->first('deg_reg_date') }}</span>
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
                        <option value="Rev.">Rev.</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Miss">Miss.</option>
                      </select>
                      @if ($errors->has('stu_title'))
                        <span id="stu_title-error" class="error text-danger" for="stu_title">{{ $errors->first('ins_type') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Name') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_date'))
                        <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                      @endif
                    </div>
                  </div>
                  
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Date of Birth') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="date" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                            @if ($errors->has('deg_reg_date'))
                                <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
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
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @if ($errors->has('sex'))
                        <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Address') }}</label>
                    <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                            @if ($errors->has('deg_reg_date'))
                                <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                            @endif
                        </div>
                    </div>  
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('NIC') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                            @if ($errors->has('deg_reg_date'))
                                <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                

                <div class="row">
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('District') }}</label>
                    <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                      <select class="form-control" name="sex" id="sex">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option value="1">Kegalle</option>
                        <option value="2">Ratnapura</option>
                      </select>
                      @if ($errors->has('sex'))
                        <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('DS Area') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                      <select class="form-control" name="sex" id="sex">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                       
                      </select>
                      @if ($errors->has('sex'))
                        <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('TP No') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                            @if ($errors->has('deg_reg_date'))
                                <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Email Address') }}</label>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('stu_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('stu_name') ? ' is-invalid' : '' }}" name="stu_name" id="stu_name" type="text" placeholder="{{ __('Student Name') }}" value="" required="true" aria-required="true"/>
                            @if ($errors->has('deg_reg_date'))
                                <span id="stu_name-error" class="error text-danger" for="stu_name">{{ $errors->first('stu_name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Institute') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('deg_reg_no') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('deg_reg_no') ? ' is-invalid' : '' }}" name="deg_reg_no" id="deg_reg_no" type="text" placeholder="{{ __('Register No') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_no'))
                        <span id="ins_name-error" class="error text-danger" for="deg_reg_no">{{ $errors->first('deg_reg_no') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Degree') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('deg_reg_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('deg_reg_date') ? ' is-invalid' : '' }}" name="deg_reg_date" id="deg_reg_date" type="text" placeholder="{{ __('Register Date') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_date'))
                        <span id="deg_reg_date-error" class="error text-danger" for="deg_reg_date">{{ $errors->first('deg_reg_date') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Degree Stream') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Degree Medium') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Degree Type') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-1 col-form-label text-dark bg-info">{{ __('Degree Class') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>


                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Effective Date') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Job Preferance') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label text-dark bg-info">{{ __('Application Date') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span id="sex-error" class="error text-danger" for="sex">{{ $errors->first('sex') }}</span>
                        @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="reset" class="btn btn-primary">{{ __('Reset') }}</button>
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