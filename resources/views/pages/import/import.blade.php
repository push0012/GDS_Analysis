@extends('layouts.app', ['activePage' => 'import_records', 'titlePage' => __('Import Record')])

@section('content')
<style>
  .col-form-label {
    font-weight: bold;
    background-color: black !important;
    color: white !important;
  }

  hr {
    margin: 5px !important;
    border-top: 2px solid black !important;
  }

  .middle-button {
    padding: 5px;
    margin-right: 10px;
    margin-top: 10px;
    border-style: solid;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('import/graduate/store') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')

          <div class="card ">
            <div class="card-header card-header-primary" style="padding-top:5px !important; padding-bottom:5px !important;">
              <h4 class="card-title">{{ __('Import Graduate Record') }} </h4>
              <p></p>
            </div>
            <div class="card-body ">

              @if (session('status_degree'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status_degree') }}</span>
                  </div>
                </div>
              </div>
              @endif
              <div class="row">
                <label class="col-sm-4 ">{{ __('Graduate Records CSV File') }}</label>
                <div class="col-sm-4">

                  <input type="file" accept=".csv" class="form-control form-control-lg" id="import_graduate" name="import_graduate">

                </div>
              </div>
            </div>

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
              <button type="reset" class="btn btn-primary">{{ __('Reset') }}</button>
            </div>
          </div>
        </form>
        <br /><br />
        <form method="post" enctype="multipart/form-data" action="{{ url('import/diploma/store') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')

          <div class="card ">
            <div class="card-header card-header-danger" style="padding-top:5px !important; padding-bottom:5px !important;">
              <h4 class="card-title">{{ __('Import Diploma Holder Record') }} </h4>
              <p></p>
            </div>
            <div class="card-body ">

              @if (session('status_diploma'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status_diploma') }}</span>
                  </div>
                </div>
              </div>
              @endif
              <div class="row">
                <label class="col-sm-4 ">{{ __('Diploma Holder Records CSV File') }}</label>
                <div class="col-sm-4">

                  <input type="file" accept=".csv" class="form-control form-control-lg" id="import_diploma" name="import_diploma">

                </div>
              </div>
            </div>

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
              <button type="reset" class="btn btn-primary">{{ __('Reset') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection