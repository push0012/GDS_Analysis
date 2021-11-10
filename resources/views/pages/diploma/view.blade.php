@extends('layouts.app', ['activePage' => 'diploma_list', 'titlePage' => __('Diploma Holding Student')])

@section('content')
<style>
  .first-column{
    width:25% !important;
  }
  
  }
</style>
<div class="content">
  <div class="container-fluid">
      <div class="row ">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Diploma Holder Student Details</h4>
            <p class="card-category"> </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover stripe" style="line-height:5px;" id="">
                <tbody>
                    <tr >
                        <td colspan="4"><h4>Registration Details</h4></td>
                    </tr>
                    <tr >    
                        <th class="first-column">Register Number</th>
                        <td>{{$student->dip_reg_no}}</td>
                         
                        <th>Register Date</th>
                        <td>{{$student->dip_reg_date}}</td>
                    </tr>
                    <tr >
                        <td colspan="4"><h4>Student Details</h4></td>
                    </tr>
                    <tr>      
                        <th>Student Name</th>
                        <td colspan="3">{{$student->stu_name}}</td>
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
                        <th>Telephone</th>
                        <td>{{$student->telephone}}</td>
                        
                        <th>Email</th>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr >
                        <td colspan="4"><h4>Diploma Details</h4></td>
                    </tr>
                    <tr>      
                        <th>IInstitute</th>
                        <td colspan="3">{{$student->ins_name}}</td>
                    </tr>
                    <tr>      
                        <th>Diploma</th>
                        <td colspan="3">{{$student->dip_title}}</td>
                    </tr>
                    <tr>      
                        <th>Diploma Medium</th>
                        <td>{{$student->dip_medium}}</td>

                        <th>Diploma Duration (in Months)</th>
                        <td>{{$student->dip_duration}}</td>
                    </tr>
                    <tr>      
                        <th>Effective Date</th>
                        <td>{{$student->dip_effective_date}}</td>
                        
                        <th>Job Preferences</th>
                        <td>{{$student->dip_job_preference}}</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
          
            <div class="col-md-6 " align="left">
                <a href="{{ url('/register/diploma/edit/'.$student->stu_id) }}" class="btn btn-warning">
                    <span class="material-icons left">edit</span>
                    Edit
                </a>
                <a href="{{ url('/register/diploma/delete/'.$student->stu_id) }}" class="btn btn-danger">
                    <span class="material-icons left">delete</span>
                    Delete
                </a>
                </div>
                <div class="col-md-6 " align="right">
                <a href="{{ url('/register/diploma/create') }}" class="btn btn-info">
                    <span class="material-icons left">add_circle</span>
                    Add New
                </a>
                <a href="{{ url('/register/diploma/show') }}" class="btn btn-primary">
                    <span class="material-icons left">list</span>
                    Show Diploma Holders List
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
