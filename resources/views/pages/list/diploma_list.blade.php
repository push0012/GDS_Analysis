<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
    <title>Diploma Holder Registration Participants</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    
    <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
        
       
    <script>
        $(document).ready( function () {
            $('#myTablelist').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                paging: false,
                searching: true,
            
            });
            
        } );
    </script>
</head>
<body>
<table width="1400px" height="60px" cellpadding="0px" cellspacing="0px"  id="results"  >
    <tr width='1400px' height='30px'>
        <td  align="center" style=" font-weight:bold;  font-size:16px; font-family:"Arial Narrow"">
        Diploma Holder Registration Participants (Year {{$year}})
        </td>
    </tr>
</table>
<table width="1400px" height="60px" cellpadding="0px" cellspacing="1px"  id="myTablelist"  style="border: solid 1px" >
<thead style="font-size:0.9em">	
<tr width='1400px' height='25px'   bgcolor='#EBEBEB'>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Reg No </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Reg Date </td>
<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Title </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Name </td>
<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Gender  </td>

<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> DoB </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> NIC </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Address </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> District </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Division  </td>

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Telephone </td>
<td width='150px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Email </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Institute </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Degree </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Medium  </td>

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Valid From </td>
<td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Job Preference </td>

</tr>	
</thead>
<tbody style="font-size:0.7em">
@foreach($results as $key => $data)                  
<tr width='1400px' height='25px'   bgcolor='#EBEBEB'>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_reg_no}} </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_reg_date}}  </td>
<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->stu_title}} </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->stu_name}}  </td>
<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->sex}}   </td>

<td width='20px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dob}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->nic}}  </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->address}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->ds_name}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dv_name}}   </td>

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->telephone}}  </td>
<td width='150px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->email}}  </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->ins_name}}  </td>
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_title}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_medium}}   </td>

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_effective_date}}  </td>
<td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->dip_job_preference}}  </td>
</tr>
@endforeach
</tbody>
</body>
</html>