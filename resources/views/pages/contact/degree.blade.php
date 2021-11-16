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
                <h4 class="card-title">{{ __('Insert New Graduate Student') }} </h4>
                
              </div>
              <div class="card-body ">
              <form method="post" action="{{ url('register/graduate/store') }}" autocomplete="off" class="form-horizontal">
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
                    <label class="col-form-label text-dark">{{ __('Contact Type') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="contact_type" id="contact_type">
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
                            <option value="0" selected="selected" disabled="disabled">Pick One...</option>
                            
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
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Medium') }}</label>
                    <div class="form-group">
                        <select class="form-control" name="contact_type" id="contact_type">
                            <option value="0" selected="selected">Pick One...</option>
                            <option value="1">Email</option>
                            <option value="2">Telephone</option>
                        </select>
                     @if ($errors->has('contact_type'))
                        <span id="contact_type-error" class="error text-danger" for="contact_type">{{ $errors->first('contact_type') }}</span>
                      @endif
                    </div>
                  </div>
                
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <label class="col-form-label text-dark">{{ __('Institute') }}</label>
                    <div class="form-group{{ $errors->has('contact_type') ? ' has-danger' : '' }}">
                        <select class="form-control" name="contact_type" id="contact_type">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Email</option>
                            <option value="2">Telephone</option>
                        </select>
                     @if ($errors->has('contact_type'))
                        <span id="contact_type-error" class="error text-danger" for="contact_type">{{ $errors->first('contact_type') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Type') }}</label>
                    <div class="form-group{{ $errors->has('contact_type') ? ' has-danger' : '' }}">
                        <select class="form-control" name="contact_type" id="contact_type">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Email</option>
                            <option value="2">Telephone</option>
                        </select>
                     @if ($errors->has('contact_type'))
                        <span id="contact_type-error" class="error text-danger" for="contact_type">{{ $errors->first('contact_type') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label class="col-form-label text-dark">{{ __('Degree Class') }}</label>
                    <div class="form-group{{ $errors->has('contact_type') ? ' has-danger' : '' }}">
                        <select class="form-control" name="contact_type" id="contact_type">
                            <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                            <option value="1">Email</option>
                            <option value="2">Telephone</option>
                        </select>
                     @if ($errors->has('contact_type'))
                        <span id="contact_type-error" class="error text-danger" for="contact_type">{{ $errors->first('contact_type') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <button type="reset" id="" style="width:130px;" class="btn btn-success">{{ __('Reset') }}</button>
                    <button type="button" id="" style="width:130px;" class="btn btn-success">{{ __('Load Data') }}</button>
                  </div>
                </div>
                </form>
                <hr>
                <form>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('stu_title') ? ' has-danger' : '' }}">
                        
                     <textarea id="copy_text" rows="9" cols="120">{{$data}}</textarea>
                      @if ($errors->has('stu_title'))
                        <span id="stu_title-error" class="error text-danger" for="stu_title">{{ $errors->first('ins_type') }}</span>
                      @endif
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