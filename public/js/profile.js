$(function() {
  $('.toggle-btn').click(function() {
    $('.filter-btn').toggleClass('open');

  });

  $('.filter-btn a').click(function() {
    $('.filter-btn').removeClass('open');

  });

  $('input[type=file][name="profile_picture"]').change(function() {
  	window.console && console.log('File uploaded');
      $("#submitButton").show();
     });
});

