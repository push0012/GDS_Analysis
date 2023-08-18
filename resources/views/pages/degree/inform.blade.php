@extends('layouts.app', ['activePage' => 'degree_list', 'titlePage' => __('Graduate Register Number Inform')])

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
                <h4 class="card-title">{{ __('Graduate Register Number Inform') }} </h4>
                
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="text" value="{{$student->email}}" />    
                    </div>
                  </div>
                </div>
                <br/>
                <!--sinhala-->
                <div class="row">
                    <div class="col-md-5 col-sm-12 ">
                        <div class="form-group">
                            <input class="form-control" name="" id="" type="text" value="සබරගමුව පළාත් රැකියා විරහිත උපාධිධාරීන් පිළිබඳ සමීක්ෂණය - {{$student->year}}" />    
                        </div>
                    </div>
                
                  <div class="col-md-7 col-sm-12">
                    <div class="form-group">  
                      <textarea id="copy_text" name="copy_text" rows="6" cols="65" >සබරගමුව පළාත් රැකියා විරහිත උපාධිධාරීන් පිළිබඳ සමීක්ෂණය {{$student->year}} යටතේ ඔබ විසින් යොමු කරණ ලද අයදුම් පත්‍රය අනුව පහත පරිද ලියාපදිංචි කර ඇති බව කාරුණිකව දන්වා සිටිමි.
                        
ලියාපදිංචි අංතය : {{$student->deg_reg_no}}
                        
ලියාපදිංචි දිනය : {{$student->deg_reg_date}}</textarea>
                    </div>
                  </div>
                </div>
                
                <!--Sinhala End-->
                <!--English-->
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input class="form-control" name="" id="" type="text" value="Survey on Unemployed Graduate in the Province {{$student->year}}" />    
                        </div>
                    </div>
                
                  <div class="col-sm-7">
                    <div class="form-group">  
<textarea id="copy_text" name="copy_text" rows="6" cols="65" >Your application on Survey on Unemployed Graduate in the Province {{$student->year}} has been registered Successfully. Your Registration details are as follows

Registration Number : {{$student->deg_reg_no}}

Registration Date : {{$student->deg_reg_date}}</textarea>
                    </div>
                  </div>
                  
                </div>
                
                <!--English End-->
              </div>
              <div class="card-footer ml-auto mr-auto">
                
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