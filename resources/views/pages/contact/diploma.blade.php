@extends('layouts.app', ['activePage' => 'cont_diploma', 'titlePage' => __('Diploma Holder Contacts')])

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
                <h4 class="card-title">{{ __('Diploma Holder Student Contact') }} </h4>
                
              </div>
              <div class="card-body ">
              <form method="" action="" autocomplete="off" class="form-horizontal" id="contact_form" name="contact_form">
              <!--action="{{ url('institutes') }}"-->
              @csrf

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
                <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Diploma Duration') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="dip_duration" id="dip_duration">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="12" >12</option>
                            <option value="18">18</option>
                            <option value="24">24</option>
                            <option value="30">30</option>
                            <option value="36">36</option>
                            <option value="42">42</option>
                            <option value="48">48</option>
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
                  <div class="row">
                  <div class="col-sm-4">
                    <button type="reset" id="" style="width:130px;" class="btn btn-danger">{{ __('Reset') }}</button>
                    <button type="button" id="" style="width:130px;" onclick="contact_filter_diploma();" class="btn btn-info">{{ __('Load Data') }}</button>
                  </div>
                </div>
                </form>
                <hr>
                <form>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">  
                      <textarea id="copy_text" name="copy_text" rows="8" cols="120"></textarea>
                    </div>
                  </div>
                  
                </div>
                </form>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="button" id="copy" class="btn btn-success">{{ __('Copy Text') }}</button>
                <button type="button" id="clear" class="btn btn-warning">{{ __('Clear Text') }}</button>
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