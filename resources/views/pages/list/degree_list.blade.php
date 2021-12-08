<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
    <title>Graduate Registration Participants</title>
</head>
<body>
<table width="1400px" height="60px" cellpadding="0px" cellspacing="0px"  id="results"  >
    <tr width='1400px' height='30px'>
        <td  align="center" style=" font-weight:bold;  font-size:16px; font-family:"Arial Narrow"">
        Graduate Registration Participants 
        </td>
    </tr>
</table>
<table width="1400px" height="60px" cellpadding="0px" cellspacing="1px"  id="results"  style="border: solid 1px" >
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

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Type </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Class </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Valid From </td>
<td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Job Preference </td>

</tr>	
</thead>
<tbody style="font-size:0.7em">
@foreach($results as $key => $data)                  
<tr width='1400px' height='25px'   bgcolor='#EBEBEB'>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_reg_no}} </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_reg_date}}  </td>
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
<td width='200px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_title}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_medium}}   </td>

<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_type}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_class}}  </td>
<td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_effective_date}}  </td>
<td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data->deg_job_preference}}  </td>
</tr>
@endforeach
</tbody>
</body>
</html>