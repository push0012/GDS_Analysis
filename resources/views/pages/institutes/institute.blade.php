@extends('layouts.app', ['activePage' => 'institutes', 'titlePage' => __('Institute')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row " >
            <div class="col-md-12 " align="right">
             
              <a href="{{ url('/institutes') }}" class="btn btn-primary">
              
                <span class="material-icons left">
                list
                </span>
                Show Institute List
                </a>
              
            </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ url('institutes') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Insert New Institute') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Institute Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('ins_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('ins_name') ? ' is-invalid' : '' }}" name="ins_name" id="ins_name" type="text" placeholder="{{ __('Institute Name') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('ins_name'))
                        <span id="ins_name-error" class="error text-danger" for="ins_name">{{ $errors->first('ins_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Institute Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('ins_type') ? ' has-danger' : '' }}">
                      
                      <select class="form-control" name="ins_type" id="ins_type">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option value="3">Diploma Providing Institute</option>
                        <option value="2">Degree Providing Institute</option>
                        <option value="1">Both</option>
                      </select>

                      @if ($errors->has('ins_type'))
                        <span id="ins_type-error" class="error text-danger" for="ins_type">{{ $errors->first('ins_type') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Institute Category') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('ins_category') ? ' has-danger' : '' }}">
                      
                      <select class="form-control" name="ins_category" id="ins_category">
                        <option value="0" selected="selected" disabled="disabled">Pick one...</option>
                        <option value="2">Local Institute</option>
                        <option value="1">Foreign Providing Institute</option>
                      </select>

                      @if ($errors->has('ins_category'))
                        <span id="ins_category-error" class="error text-danger" for="ins_category">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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