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
          <form method="post" action="{{ url('register/graduate/store') }}" autocomplete="off" class="form-horizontal">
          <!--action="{{ url('institutes') }}"-->
          @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary" style="padding-top:5px !important; padding-bottom:5px !important;">
                <h4 class="card-title">{{ __('Insert New Graduate Student') }} </h4>
                
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
                <label class="col-sm-2 col-form-label text-dark">{{ __('Contact Type') }}</label>
                  <div class="col-sm-2">
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
                  <label class="col-sm-2 col-form-label text-dark ">{{ __('Register Date') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('deg_reg_date') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('deg_reg_date') ? ' is-invalid' : '' }}" name="deg_reg_date" id="deg_reg_date" type="date" placeholder="{{ __('Register Date') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('deg_reg_date'))
                        <span id="deg_reg_date-error" class="error text-danger" for="deg_reg_date">{{ $errors->first('deg_reg_date') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('stu_title') ? ' has-danger' : '' }}">
                        
                     <textarea id="copy_text" rows="15" cols="120">{{$data}}</textarea>
                      @if ($errors->has('stu_title'))
                        <span id="stu_title-error" class="error text-danger" for="stu_title">{{ $errors->first('ins_type') }}</span>
                      @endif
                    </div>
                  </div>
                  
                </div>
                    
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="button" id="copy" class="btn btn-success">{{ __('Copy Text') }}</button>
               
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