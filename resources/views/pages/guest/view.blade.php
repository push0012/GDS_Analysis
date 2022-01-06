@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('GDS Analysis')])

@section('content')
<div class="container" style="height: auto; background-color: white !important; background-size: cover; background-position: top center;align-items: center;" data-color="purple">
<div class="row justify-content-center" style="color: black; ">
        <div class="col-lg-7 col-md-8">
           <h2 align="center">Survay Participation Detail Search</h2>
        </div>
  </div>
  <br/>
<div class="row justify-content-center">
        <div class=" col-md-3" style="color: black; ">
            <div class="input-group rounded" style="margin-top:40px;">
            <div class="form-check-inline">
              <input checked="checked"
                class="form-check-input type"
                type="radio"
                name="type"
                id="type1"
                value="1"
              />
              <label class="form-check-label" for="inlineRadio1">Graduate</label>
            </div>
            <div class="form-check-inline">
              <input
                class="form-check-input type"
                type="radio"
                name="type"
                id="type2"
                value="2"
              />
              <label class="form-check-label" for="inlineRadio1">Diploma</label>
            </div>
            </div>
        </div>
        <div class=" col-md-4" style="color: black; ">
            <div class="input-group rounded" style="margin-top:40px;">
                <input type="search" class="form-control rounded"  placeholder="Enter Your NIC Number" aria-label="Search"
                aria-describedby="search-addon" id="nic" name="nic" />
                <span class="input-group-text border-0" id="search-addon"  style="cursor: pointer;">
                    <i class="material-icons">search</i>
                </span>
            </div>
        </div>
  </div>

<br/><br/><br/><br/>
  <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">
        <div class="table-responsive">
              <table class="table table-hover" id="search_table" style="color: black; " >
                <thead >
                  <th style="font-weight:bold !important;">
                    Reg No
                  </th>
                  <th style="font-weight:bold !important;">
                    Reg Date
                  </th>
                  <th style="font-weight:bold !important;">
                    Name
                  </th>
                </thead>
                <tbody id="data_row">
              
                  <td id="reg_no"></td>
                  <td id="reg_date"></td>
                  <td id="stu_name"></td>
                  
                </thead>
              </table>
            </div>
        </div>
        </div>
        <div class="row justify-content-center" style="color: black; ">
        <div class="col-lg-7 col-md-8">
          <span class="text-danger" id="message"></span>
        </div>
        </div>
        
        
  
</div>
@endsection
@push('js')
<script>
$( document ).ready(function() {
    
    $( "#search-addon" ).click(function() {
        
        var nic = $('#nic').val();
        var type = $('.type:checked').val();
        
        jQuery.ajax({
          url: 'find_data',
          type: "POST",
          data: {nic:nic, type:type},
          dataType: "json",
          success: function (data) {
            document.getElementById("reg_no").innerHTML = '';
              document.getElementById("reg_date").innerHTML = '';
              document.getElementById("stu_name").innerHTML = '';
            document.getElementById("message").innerHTML = '';
              document.getElementById("reg_no").innerHTML = data.reg_no;
              document.getElementById("reg_date").innerHTML = data.reg_date;
              document.getElementById("stu_name").innerHTML = data.stu_name;
          },
          error: function (data) {
            document.getElementById("reg_no").innerHTML = '';
              document.getElementById("reg_date").innerHTML = '';
              document.getElementById("stu_name").innerHTML = '';
              document.getElementById("message").innerHTML = '';
              document.getElementById("message").innerHTML = "No Data Found";
          }

        });

    });
});
</script>
@endpush
