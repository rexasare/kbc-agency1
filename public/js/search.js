$('#search_name').on('input', function(){
   var value = $('#search_name').val();
   var cat = $('#cats').val();
   var Url = window.location.href;

   $.ajax({
      type: 'get',
      url: Url,
      data: {
        'search': value,
        'cat': cat
      },
      success: function(data) {
        $('.ads-list-wrapper').html(data);
      }
   });
});

$('#search_name1').on('input', function(){
   var value = $('#search_name1').val();
  //  var cat = $('#cats').val();
   var Url = window.location.href;

   $.ajax({
      type: 'get',
      url: Url,
      data: {
        'search': value
      },
      success: function(data) {
        $('.ads-list-wrapper').html(data);
      }
   });
});



$('#sort').on('change', function(){
   var sort = this.value;
  //  var cat = $('#cats').val();
   var Url = window.location.href;

   $.ajax({
      type: 'get',
      url: Url,
      data: {
        'sort': sort
      },
      success: function(data) {
        $('.ads-list-wrapper').html(data);
      }
   });
});

$('#sort1').on('change', function(){
   var sort1 = this.value;
  //  var cat = $('#cats').val();
   var Url = window.location.href;

   $.ajax({
      type: 'get',
      url: Url,
      data: {
        'sort1': sort1
      },
      success: function(data) {
        $('.ads-list-wrapper').html(data);
      }
   });
});
