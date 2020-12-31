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
  
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#uploadBtn").change(function(){
        readURL(this);
    });
});

