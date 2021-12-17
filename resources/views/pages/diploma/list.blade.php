@extends('layouts.app', ['activePage' => 'diploma_list', 'titlePage' => __('Diploma Holder')])

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row " >
            <div class="col-md-12 " align="right">
             
              <a href="{{ url('/register/diploma/create') }}" class="btn btn-primary">
              
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
            <h4 class="card-title mt-0">Diploma Holding Student List</h4>
            <p class="card-category"> </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover stripe" id="myTabledeg">
                <thead class="">
                  <th>
                    Reg No
                  </th>
                  <th>
                    Reg Date
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    NIC
                  </th>
                  <th>
                    Division
                  </th>
                  <th>
                    Telephone
                  </th>
                  <th>
                    View
                  </th>
                </thead>
                <tbody>
                @foreach($students as $key => $data)
                    <tr>    
                      <th>{{$data->dip_reg_no}}</th>
                      <th>{{$data->dip_reg_date}}</th>
                      <th>{{$data->stu_name}}</th>        
                      <th>{{$data->nic}}</th>
                      <th>{{$data->dv_name}}</th>
                      <th>{{$data->telephone}}</th>  
                      <th><a href="{{ url('/register/diploma/view/'. $data->stu_id) }}"><span class="material-icons">visibility</span></a></th>     
                    </tr>
                @endforeach
                 
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
