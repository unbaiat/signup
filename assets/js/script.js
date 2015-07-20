$(function(){

  var form  = $('form');
  var submit   = $('#submit');
  var alert  = $('.alert');

  // validate form
  form.validate({
    // validation rules
    rules: {
      // email field only required
      email: 'required'
    },
    // submit ajax request
    submitHandler: ajaxSubmit
  });

  /**
  * ajax submit function
  * sending simple ajax request
  **/

  function ajaxSubmit() {
    $.ajax({
      url: 'ajax.php',
      type: 'POST',
      dataType: 'json',
      // form serialize data
      data: form.serialize(),
      beforeSend: function(){
        alert.fadeOut();
        submit.val('Sending...').attr('disabled', 'disabled');
      },
      success: function(data){
        if ( data.status === 'success' ) {
          // if responce status == success redirect to success page
          $(location).attr('href','success.html');
        } else {
          // not success! show error messages
          alert.html(data.status).fadeIn();
          submit.val('Sign Up').removeAttr('disabled');
        }
      },
      error: function(){
        // show error message
        alert.html('Sending request fail'+errorThrown).fadeIn();
        submit.val('Sign Up').removeAttr('disabled');
      }
    });
  };
});