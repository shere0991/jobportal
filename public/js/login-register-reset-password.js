var email=$('.help-block').html();
  $('#message').html(email).find('strong').addClass('callout callout-danger help-block');
   $("#message").show().fadeOut(8000).queue(function(n) {
          $(this).hide(); n();
    });

$('#loginbtn').on('click',function(){
  if ($('#login_username').val()!="" && $('#login_password').val()!="") {
  $(this).html("");
  $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>').show();
    
  }
});

$('#registerbtn').on('click',function(){
  if ($('#register_username').val()!="" && $('#register_email').val()!="") {
    $(this).html("");
    $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>').show();

  }
});
$('#sendbtn').on('click',function(){
  if ($('#lost_email').val()!="") {
    $(this).html("");
    $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>').show();

  }
});

$('#sendbtn').on('click',function(){
  if ($('#register_username').val()!="" && $('#register_email').val()!="") {
    $(this).html("");
    $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>').show();

  }
});