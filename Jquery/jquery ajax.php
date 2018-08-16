<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jquery&&ajax</title>
    <script src="jquery-3.2.1.min的副本.js"></script>
</head>
<body>
    <label>用户：</label><input type="text" id="tt_username" placeholder="请输入"/></br>
    <label>邮箱：</label><input type="text" id="tt_email" placeholder="请输入"/></br>
    <label>电话：</label><input type="text" id="tt_phone" placeholder="请输入"/></br>
    <button id="check_aLL">检测</button><br/>
</body>
<script>
  $(document).ready(function(){
    $("#check_aLL").click(function(){
      $.ajax({
        url:"user_infor.php",
        type:"POST",
        dataType:"json",
        data:{
          user_name: $("#tt_username").val(),
          user_email: $("#tt_email").val(),
          user_phone: $("#tt_phone").val(),
        },
        success:function(data){
          if(data){
            console.log(data.user_name);
            //var obj = jQuery.parseJSON(data);
            // console.log(obj);
          }
          else {
            console.log("数据不存在");
          }
        }
      })
    });
  });
</script>
