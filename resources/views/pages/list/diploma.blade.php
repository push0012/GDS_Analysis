@extends('layouts.app', ['activePage' => 'list', 'titlePage' => __('Diploma Holder List')])

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
                <h4 class="card-title">{{ __('Diploma Holder List') }} </h4>
                
              </div>
              <div class="card-body ">
              <form method="post" action="{{ url('list/diploma/view') }}" target="_blank" autocomplete="off" class="form-horizontal" id="listdown_form" name="listdown_form">
              <!--action="{{ url('institutes') }}"-->
              @csrf
              
                @method('post')

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
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Registered Year') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="reg_year" id="reg_year" required>
                            @foreach($years as $key => $data)
                              <option value="{{$data->year}}">{{$data->year}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('District') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="ds_id" id="ds_id">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="1">Kegalle</option>
                            <option value="2">Ratnapura</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('DS Area') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="dv_id" id="dv_id">
                            <option value="0" selected="selected">Pick One...</option>
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label text-dark">{{ __('Gender') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label text-dark">{{ __('Diploma Medium') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="dip_medium" id="dip_medium">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="Sinhala">Sinhala</option>
                            <option value="Tamil">Tamil</option>
                            <option value="English">English</option>
                        </select>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <label class="col-form-label text-dark">{{ __('Institute') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="ins_id" id="ins_id">
                            <option value="0" selected="selected">Pick One...</option>
                            @foreach($institutes as $key => $data)
                            <option value="{{$data->ins_id}}">{{$data->ins_name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label text-dark">{{ __('Effective Date (From)') }}</label>
                      <div class="form-group">
                        <input class="form-control" name="dip_effective_date_from" id="dip_effective_date_from" type="date" value="" aria-required="true"/>
                      </div>
                  </div>

                  <div class="col-sm-3">
                    <label class="col-form-label text-dark">{{ __('Effective Date (To)') }}</label>
                      <div class="form-group">
                        <input class="form-control" name="dip_effective_date_to" id="dip_effective_date_to" type="date" value="" aria-required="true"/>
                      </div>
                  </div>
                  </div>
                  <hr>
                  <div class="row ml-auto mr-auto">
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