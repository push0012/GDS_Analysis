@extends('layouts.app', ['activePage' => 'degree_list', 'titlePage' => __('Graduated')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-md-12 " align="right">

        <a href="{{ url('/register/graduate/create') }}" class="btn btn-primary">

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
            <h4 class="card-title mt-0">Graduate Student List</h4>
            <p class="card-category"> </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover stripe" id="myTabledeg" >
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
                    Address
                  </th>
                  <th>
                    View
                  </th>
                  <th>
                    Inform
                  </th>
                </thead>
                
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