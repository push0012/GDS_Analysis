@extends('layouts.app', ['activePage' => 'institutes', 'titlePage' => __('Institute List')])

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row " >
            <div class="col-md-12 " align="right">
             
              <a href="{{ url('/institutes/create') }}" class="btn btn-primary">
              
                <span class="material-icons left">
                add_circle
                </span>
                Add New
                </a>
              
            </div>
        </div>
      <div class="row ">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Institute List</h4>
            <p class="card-category"> Here are the institutes those present student attended</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover stripe" id="myTable">
                <thead class="">
                  <th>
                    ID
                  </th>
                  <th>
                    Institute Name
                  </th>
                  <th>
                    Institute Type
                  </th>
                  <th>
                    Institute Category
                  </th>
                </thead>
                <tbody>
                @foreach($institutes as $key => $data)
                    <tr>    
                      <th>{{$data->ins_id}}</th>
                      <th>{{$data->ins_name}}</th>
                      <th>{{$data->ins_type}}</th>
                      <th>{{$data->ins_category}}</th>          
                    </tr>
                @endforeach
                 <!-- <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Dakota Rice
                    </td>
                    <td>
                      Niger
                    </td>
                    <td>
                      Oud-Turnhout
                    </td>
                  </tr>
-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

</script>
@endsection
