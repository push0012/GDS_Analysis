@extends('layouts.app', ['activePage' => 'cont_degree', 'titlePage' => __('Graduate Contacts')])

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
                <h4 class="card-title">{{ __('Graduate Student Contact') }} </h4>
                
              </div>
              <div class="card-body ">
              <form method="" action="" autocomplete="off" class="form-horizontal" id="contact_form" name="contact_form">
              <!--action="{{ url('institutes') }}"-->
             

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
                    <label class="col-form-label text-dark">{{ __('Contact Type') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="contact_type" id="contact_type" required>
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="1">Email</option>
                            <option value="2">Telephone</option>
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
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Gender') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="sex" id="sex">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Stream') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="str_id" id="str_id">
                            <option value="0" selected="selected">Pick One...</option>
                            @foreach($streams as $key => $data)
                              <option value="{{$data->str_id}}">{{$data->str_name}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Medium') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="deg_medium" id="deg_medium">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="Sinhala">Sinhala</option>
                            <option value="Tamil">Tamil</option>
                            <option value="English">English</option>
                        </select>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-4">
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
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Type') }}</label>
                    <div class="form-group">
                      <select class="form-control" name="deg_type" id="deg_type">
                            <option value="0" selected="selected">Pick one...</option>
                            <option value="General">General</option>
                            <option value="Special">Special</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Class') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="deg_class" id="deg_class">
                            <option value="0" selected="selected">Pick one...</option>
                            <option value="First">First</option>
                            <option value="Second Upper">Second Upper</option>
                            <option value="Second Lower">Second Lower</option>
                            <option value="General">General</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Effective Date (From)') }}</label>
                      <div class="form-group">
                        <input class="form-control" name="deg_effective_date_from" id="deg_effective_date_from" type="date" value="" aria-required="true"/>
                      </div>
                  </div>

                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Effective Date (To)') }}</label>
                      <div class="form-group">
                        <input class="form-control" name="deg_effective_date_to" id="deg_effective_date_to" type="date" value="" aria-required="true"/>
                      </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
                    <button type="reset" id="" style="width:130px;" class="btn btn-success">{{ __('Reset') }}</button>
                    <button type="button" id="" style="width:130px;" onclick="contact_filter();" class="btn btn-success">{{ __('Load Data') }}</button>
                  </div>
                </div>
                </form>
                <hr>
                <form>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">  
                      <textarea id="copy_text" rows="8" cols="120">{{$filter}}</textarea>
                    </div>
                  </div>
                  
                </div>
                </form>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="button" id="copy" class="btn btn-success">{{ __('Copy Text') }}</button>
               
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