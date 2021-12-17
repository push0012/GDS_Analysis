@extends('layouts.app', ['activePage' => 'reports', 'titlePage' => __('Reports')])

@section('content')
<style>
  
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
           <!-- <div class="col-md-12 " align="right">
             
              <a href="{{ url('/institutes') }}" class="btn btn-primary">
              
                <span class="material-icons left">
                list
                </span>
                Show Institute List
                </a>

            </div>-->
      </div>
      <div class="row">
        <div class="col-md-12">
          

            <div class="card ">
              <div class="card-header card-header-primary" style="padding-top:5px !important; padding-bottom:5px !important;">
                <h4 class="card-title">{{ __('Reports') }} </h4>
                
              </div>
              <div class="card-body ">
              <form method="post" action="{{ url('report/generate') }}" target="_blank" autocomplete="off" class="form-horizontal" id="listdown_form" name="listdown_form">
              <!--action="{{ url('institutes') }}"-->
              @csrf
              
                @method('post')

                
                <div class="row">
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Registration Year') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="reg_year" id="reg_year" required>
                            <option value="0" selected="selected">Pick One...</option>
                            @foreach($years as $key => $data)
                              <option value="{{$data->year}}">{{$data->year}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Survay Type') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="survay_id" id="survay_id">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="1">Graduate</option>
                            <option value="2">Diploma</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <label class="col-form-label text-dark">{{ __('Report Type') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="report_id" id="report_id">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="1" >Provincial Overall Summery - by District</option>
                            <option value="2" >Summery by Gender</option>
                            <option value="3" >Summery by Divisional Secretariat Area</option>
                            <option value="4" >Summery by Stream</option>
                            <option value="5" >Summery by Medium</option>
                            <option value="6" >Summery by Result</option>
                            <option value="7" >Summery by Graduated / Diploma Awarded Year </option>
                            <option value="8" >Summery by University / Institute Type</option>
                            <option value="9" >Summery by Degree Type</option>
                        </select>
                    </div>
                  </div>
                  
                </div>

                <br><br><br><br>
                  <div class="row ml-auto mr-auto justify-content-center">
                  <div class="col-sm-12">
                    <button type="reset" id="" style="width:130px;" class="btn btn-danger">{{ __('Reset') }}</button>
                    <button type="submit" id="" style="width:130px;" class="btn btn-info">{{ __('Load Data') }}</button>
                </div>
                </div>
                </form>
                
                
              </div>
              <div class="card-footer ml-auto mr-auto">

            </div>
            </div>
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
    </div>
  </div>
@endsection