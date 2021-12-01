$(document).ready( function () {
    //$('#myTable').DataTable();
    $('#myTable').DataTable( {
        paging: true,
        searching: false,
    } );
    $('#myTabledeg').DataTable( {
      paging: true,
      searching: true,
  } );
  $('#myTableview').DataTable( {
      paging: false,
      searching: false,
      
  } );
} );

$("#copy").click(function(){
   console.log('button clicked');
   $("#copy_text").select();
  document.execCommand('copy');
   showNotification('bottom','center','Text Copied to Clipboard','info');
});

function showNotification(from, align,message,type) {
   //type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
   
   $.notify({
     icon: "add_alert",
     message: message
   }, {
     type: type,
     timer: 3000,
     placement: {
       from: from,
       align: align
     }
   });
 }

jQuery(document).ready(function ()
    {
      console.log("lic here");
            jQuery('select[name="ds_id"]').on('change',function(){
               console.log("here come");
               var countryID = jQuery(this).val();
               console.log(countryID);
               if(countryID)
               {
                  console.log(countryID);
                  jQuery.ajax({
                     url : '/divisions/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="dv_id"]').empty();
                        $('select[name="dv_id"]').append('<option value="0" disabled="disabled" selected="selected">Pick One...</option>');
                        jQuery.each(data, function(key,value){
                           $('select[name="dv_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="dv_id"]').empty();
               }
            });
    });

function load_institute()
{
   console.log('call here');
   jQuery.ajax({
      url : '/ajax/institutes_load',
      type : "GET",
      dataType : "json",
      success:function(data)
      {
         console.log(data);
         jQuery('select[name="ins_id"]').empty();
         $('select[name="ins_id"]').append('<option value="0" disabled="disabled" selected="selected">Pick One...</option>');
         jQuery.each(data, function(key,value){
            $('select[name="ins_id"]').append('<option value="'+ value.ins_id +'">'+ value.ins_name +'</option>');
         });
      },
      error:function(data){
         console.log("error here")
      }
      
   });
}

function isMyFormValid(form){
   console.log(form);
}

function contact_filter()
{
        /*$contact_type = $('#contact_type').val();
        $ds_id = $('#ds_id').val();
        $dv_id = $('#dv_id').val();
        $sex = $('#sex').val();
        $str_id = $('#str_id').val();
        $deg_medium = $('#deg_medium').val();
        $ins_id = $('#ins_id').val();
        $deg_type = $('#deg_type').val();
        $deg_class = $('#deg_class').val();
        $deg_effective_date_from = $('#deg_effective_date_from').val();
        $deg_effective_date_to = $('#deg_effective_date_to').val();*/

       /* $email = $('#email').val();
        $mobile_number = $('#mobile_number').val();
        let subject = $('#subject').val();
        let message = $('#message').val();*/

   $values = $('#contact_form').serialize();
   //$values = $('#contact_form').serializeArray();
  // $val =  JSON.parse($values);
   console.log("come here");
  // console.log('call here');
   jQuery.ajax({
      url : '/contacts/graduate/filter',
      type : "POST",
      data : $values,
      dataType : "json",
      success:function(data)
      {
         console.log(data);
         
      },
      error:function(data){
         console.log("error here")
      }
      
   });
}