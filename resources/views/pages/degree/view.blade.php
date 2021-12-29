@extends('layouts.app', ['activePage' => 'degree_list', 'titlePage' => __('Graduated')])

@section('content')
<style>
  .first-column{
    width:20% !important;
  }
  .second-column{
    width:30% !important;
  }
  .third-column{
    width:20% !important;
  }
  .forth-column{
    width:30% !important;
  }
</style>
<div class="content">
  <div class="container-fluid">
      <div class="row ">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Graduate Student Details</h4>
            <p class="card-category"> </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover stripe" style="line-height:5px;" id="">
                <tbody>
                    <tr >
                        <td class="text-primary" colspan="4"><h4>Registration Details</h4></td>
                    </tr>
                    <tr >    
                        <th class="first-column">Register Number</th>
                        <td class="second-column">{{$student->deg_reg_no}}</td>
                         
                        <th class="third-column">Register Date</th>
                        <td class="forth-column">{{$student->deg_reg_date}}</td>
                    </tr>
                    <tr >
                        <td class="text-primary" colspan="4"><h4>Student Details</h4></td>
                    </tr>
                    <tr>   
                        <th>Student Name</th>
                        <td colspan="3" >{{$student->stu_title}} {{$student->stu_name}}</td>
                    </tr>
                    <tr >      
                        <th>Gender</th>
                        <td>{{$student->sex}}</td>
                        
                        <th>Date of Birth</th>
                        <td>{{$student->dob}}</td>
                    </tr>
                    <tr >      
                        <th>NIC Number</th>
                        <td>{{$student->nic}}</td>
                    </tr>
                    <tr > 
                        <th>Address</th>
                        <td colspan="3">{{$student->address}}</td>
                    </tr>
                    <tr >      
                        <th>District</th>
                        <td>{{$student->ds_name}}</td>
                        
                        <th>DS Division</th>
                        <td>{{$student->dv_name}}</td>
                    </tr>
                    <tr >      
                        <th>Telephone</th>
                        <td>{{$student->telephone}}</td>
                        
                        <th>Email</th>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr >
                        <td class="text-primary" colspan="4"><h4>Degree Details</h4></td>
                    </tr>
                    <tr>      
                        <th>University</th>
                        <td colspan="3">{{$student->ins_name}}</td>
                    </tr>
                    <tr>      
                        <th>Degree</th>
                        <td colspan="3">{{$student->deg_title}}</td>
                    </tr>
                    <tr>      
                        <th>Stream</th>
                        <td>{{$student->str_name}}</td>
                        
                        <th>Degree Medium</th>
                        <td>{{$student->deg_medium}}</td>
                    </tr>
                    <tr>      
                        <th>Degree Type</th>
                        <td>{{$student->deg_type}}</td>
                        
                        <th>Degree Class</th>
                        <td>{{$student->deg_class}}</td>
                    </tr>
                    <tr>      
                        <th>Effective Date</th>
                        <td>{{$student->deg_effective_date}}</td>
                        
                        <th>Job Preferences</th>
                        <td>{{$student->deg_job_preference}}</td>
                    </tr>
                    <tr >
                        <td class="text-primary" colspan="4"><h4>Meta Details</h4></td>
                    </tr>
                    <tr>      
                        <th>Data Updated by</th>
                        <td>{{$student->user}}</td>
                        
                        <th>Data Updated at</th>
                        <td>{{$student->updated_at}}</td>
                    </tr>
                    <tr>      
                        <th>Data Submited via</th>
                        <td>{{$student->submit_via}}</td>
        
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
          
            <div class="col-md-6 " align="left">
                <a href="{{ url('/register/graduate/edit/'.$student->stu_id) }}" class="btn btn-warning">
                    <span class="material-icons left">edit</span>
                    Edit
                </a>
                <a href="#" class="btn btn-danger">
                    <span class="material-icons left">delete</span>
                    Delete
                </a>
                </div>
                <div class="col-md-6 " align="right">
                <a href="{{ url('/register/graduate/create') }}" class="btn btn-info">
                    <span class="material-icons left">add_circle</span>
                    Add New
                </a>
                <a href="{{ url('/register/graduate/show') }}" class="btn btn-primary">
                    <span class="material-icons left">list</span>
                    Show Graduates List
                </a>
              
            
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
