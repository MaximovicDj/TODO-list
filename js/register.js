$(function(){

  //Register new USER
  $("#registerBtn").click(function(){
    let name = $("#first_name");
    let last_name = $("#last_name");
    let email = $("#email");
    let password = $("#password");

    if(name.val() == ""){
      $("#regResponse").html("<span style='padding:50px;'>Field name is required</span>");
      name.focus();
      return false;
    }
    if(last_name.val() == ""){
      $("#regResponse").html("<span style='padding:50px;'>Field last last name is required</span>");
      last_name.focus();
      return false;
    }
    if(email.val() == ""){
      $("#regResponse").html("<span style='padding:50px;'>Field email is required</span>");
      email.focus();
      return false;
    }
    if(password.val() == ""){
      $("#regResponse").html("<span style='padding:50px;'>Field password is required</span>");
      password.focus();
      return false;
    }

    $.ajax({
      url:"app/register.php?option=register",
      type:"POST",
      data: new FormData(document.getElementById('register-form')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          window.location.assign(obj.success);//Redirect to login page
        }
        else {
          $("#regResponse").html("<span style='padding:50px;'>"+obj.error+"</span>");
        }
      }
    });
  })
  //end register user

});
