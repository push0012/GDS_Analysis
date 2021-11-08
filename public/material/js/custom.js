$(document).ready( function () {
    //$('#myTable').DataTable();
    $('#myTable').DataTable( {
        paging: true,
        searching: false,
    } );
} );
jQuery(document).ready(function ()
    {
            jQuery('select[name="ds_id"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
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