$(function(){


  //LOGIN USER
  $("#loginBtn").click(function(){
    let email = $("#email");
    let password = $("#password");

    if(email.val() == ""){
      $("#loginResponse").html("<span style='padding:10px;'>Field email is required</span>");
      email.focus();
      return false;
    }
    if(password.val() == ""){
      $("#loginResponse").html("<span style='padding:10px;'>Field password is required</span>");
      password.focus();
      return false;
    }

    $.ajax({
      url:"app/login.php?option=login",
      type:"POST",
      data: new FormData(document.getElementById('login-form')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          window.location.assign(obj.success); // redirect to index page, main PAGE
        }
        else {
          $("#loginResponse").html("<span style='padding:50px;'>"+obj.error+"</span>");
        }
      }
    });
  })
  //END LOGIN USER

})
