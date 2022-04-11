$(function(){

  //Displaying all Tasks From database function
  selectAll()


  //ADD new task btn
  $("#addBtn").click(function(){
    let task = $("#addInput");
    if(task.val() == ""){
      $("#indexResponse").html("<span style='background-color:#ff4d4d; padding:10px;'>You must enter task</span>");
      task.focus();
      return false;
    }

    $.ajax({
      url:"app/index.php?option=add",
      type:"POST",
      data:{task:task.val()},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          $("#indexResponse").html("<span style='background-color:#29a329; padding:10px;'>"+obj.success+"</span>");
          task.val("");
          selectAll();
        }
        else {
          $("#indexResponse").html("<span style='background-color:#ff4d4d; padding:10px;'>"+obj.error+"</span>");
        }
        // alert(response);
      }
    });
  })
  // End add new task


  //Deleteing One Taks BY ID;
  $(document).on('click', '[data-role=deleteTask]', function(){
    let id = $(this).data("id");
    $.ajax({
      url:"app/index.php?option=delete",
      type:"POST",
      data:{id:id},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          selectAll();
        }
        else alert(obj.error);
      },
      beforeSend:function(response){
        if(!confirm("Have you complited this task?")) return false;
      }
    });
  })
  // END DELETEING;

});


function selectAll(){
  $.get("app/index.php?option=select", function(response){
    let obj = JSON.parse(response);
    if(obj.length == 0 ){
      $(".list").html("No tasks yet...")
    }
    else {
      let str = "";
      for(el of obj)
        str += "<i class='fa-solid fa-xmark' data-role='deleteTask' data-id='"+el.id+"'> </i> <span>"+el.title+"</span><br><br>";
        $(".list").html(str);
    }

  })
}
