$( document ).ready(function() {

   // Your code here.

         $("#cat").change(function() {
       if ($(this).data('options') == undefined) {
       /*Taking an array of all options-2 and kind of embedding it on the select1*/
       $(this).data('options', $('#scat option').clone());
   }
   var id = $(this).val();
   var options = $(this).data('options').filter('[class=' + id + ']');
   $('#scat').html(options);
});


});
