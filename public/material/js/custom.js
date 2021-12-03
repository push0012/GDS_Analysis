$(document).ready(function () {
   //$('#myTable').DataTable();
   $('#myTable').DataTable({
      paging: true,
      searching: false,
   });
   $('#myTabledeg').DataTable({
      paging: true,
      searching: true,
      "columns": [
         { "width": "10%" },
         { "width": "10%" },
         { "width": "40%" },
         { "width": "10%" },
         { "width": "10%" },
         { "width": "10%" },
         { "width": "10%" },
      ]
   });
   $('#myTableview').DataTable({
      paging: false,
      searching: false,

   });
});

$("#copy").click(function () {
   console.log('button clicked');
   $("#copy_text").select();
   document.execCommand('copy');
   showNotification('bottom', 'center', 'Text Copied to Clipboard', 'info');
});

$("#clear").click(function () {
   document.getElementById('copy_text').value = '';
});

function showNotification(from, align, message, type) {
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

jQuery(document).ready(function () {
   console.log("lic here");
   jQuery('select[name="ds_id"]').on('change', function () {
      console.log("here come");
      var countryID = jQuery(this).val();
      console.log(countryID);
      if (countryID) {
         console.log(countryID);
         jQuery.ajax({
            url: '/divisions/' + countryID,
            type: "GET",
            dataType: "json",
            success: function (data) {
               console.log(data);
               jQuery('select[name="dv_id"]').empty();
               $('select[name="dv_id"]').append('<option value="0" disabled="disabled" selected="selected">Pick One...</option>');
               jQuery.each(data, function (key, value) {
                  $('select[name="dv_id"]').append('<option value="' + key + '">' + value + '</option>');
               });
            }
         });
      }
      else {
         $('select[name="dv_id"]').empty();
      }
   });
});

function load_institute() {
   console.log('call here');
   jQuery.ajax({
      url: '/ajax/institutes_load',
      type: "GET",
      dataType: "json",
      success: function (data) {
         console.log(data);
         jQuery('select[name="ins_id"]').empty();
         $('select[name="ins_id"]').append('<option value="0" disabled="disabled" selected="selected">Pick One...</option>');
         jQuery.each(data, function (key, value) {
            $('select[name="ins_id"]').append('<option value="' + value.ins_id + '">' + value.ins_name + '</option>');
         });
      },
      error: function (data) {
         console.log("error here")
      }

   });
}

function isMyFormValid(form) {
   console.log(form);
}

function contact_filter_graduate() {

   $values = $('#contact_form').serialize();

   jQuery.ajax({
      url: '/contacts/graduate/filter',
      type: "POST",
      data: $values,
      dataType: "json",
      success: function (data) {
         console.log(data);
         document.getElementById('copy_text').value = '';
         document.getElementById('copy_text').value = data;
      },
      error: function (data) {
         console.log(data)
      }

   });
}

function contact_filter_diploma() {

   $values = $('#contact_form').serialize();

   jQuery.ajax({
      url: '/contacts/diploma/filter',
      type: "POST",
      data: $values,
      dataType: "json",
      success: function (data) {
         console.log(data);
         document.getElementById('copy_text').value = '';
         document.getElementById('copy_text').value = data;
      },
      error: function (data) {
         console.log(data)
      }

   });
}