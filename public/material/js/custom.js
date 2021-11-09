$(document).ready( function () {
    //$('#myTable').DataTable();
    $('#myTable').DataTable( {
        paging: true,
        searching: false,
    } );
} );
jQuery(document).ready(function ()
    {
      console.log("fuck here");
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