<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
    <title>Graduate / Diploma Survay Report - by Result</title>
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
            $('#report_byresult').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                "order": false,
                paging: false,
                searching: false,
                
            });
            
        } );
        
    </script>
</head>
<body>
<table width="1200px" height="60px" cellpadding="0px" cellspacing="0px"  id="results"  >
    <tr width='1200px' height='30px'>
        <td  align="center" style=" font-weight:bold;  font-size:16px; font-family:"Arial Narrow"">
            Provincial Overall Summery - by Result
        </td>
    </tr>
</table>
<table width="120px" height="60px" cellpadding="0px" cellspacing="1px"  id="report_byresult"  style="border: solid 1px; width: 25%" >
<thead style="font-size:1em">	
<tr width='120px' height='25px'   bgcolor='#EBEBEB'>
    <td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"></td>
    <td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Ratnapura </td>
    <td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Kegalle </td>
    <td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> Province </td>

</tr>	
</thead>
<tbody style="font-size:0.7em">
@foreach($results['res_001'] as $key => $data)                  
<tr width='120px' height='25px'   bgcolor='#EBEBEB'>
    <td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data['result']}} </td>
    <td width='60px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data['r_count']}}  </td>
    <td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data['k_count']}} </td>
    <td width='80px' height='25px'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$data['p_count']}} </td>
</tr>
@endforeach
<tr width='120px' height='25px'   bgcolor='#999999'>
    <td width='60px' height='25px' bgcolor='#999999'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px">   ToTal </td>
    <td width='60px' height='25px' bgcolor='#999999'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$results['res_002']['r_count']}}  </td>
    <td width='80px' height='25px' bgcolor='#999999'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$results['res_002']['k_count']}} </td>
    <td width='80px' height='25px' bgcolor='#999999'  align='center' class='Viso2' style="border-bottom:solid 1px; border-right:solid 1px"> {{$results['res_002']['p_count']}} </td>
</tr>
</tbody>
</body>
</html>