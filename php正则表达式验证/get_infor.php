<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>sda</title>
  <script type="text/javascript" src="jquery-3.2.1.min的副本.js"></script>
</head>
<body>
  <table  cellpadding="20" width="300" cellspaceing='0' border="1" bgcolor='#ABCDEF'>
    <tbody id="form">
      <tr>
        <td>用户名</td>
        <td>email</td>
        <td>电话</td>
        <button id="show">显示</button>
      </tr>
</body>
<script>
$(document).ready(function(){
  $("#show").click(function(){
    // console.log(111);
    $.ajax({
      url:"conn_databases.php",
      type:"GET",
      dataType:"json",
      data:{
        // "id":"0",
        // "last_id":"";
        "username":"",
        "email":"",
        "phone":"",
      },
      success:function(data){
        // console.log(data.length);
        // console.log(data);
        for(var i=0;i<data.length;i++){
          $("#form").append(`<tr><td>${data[i].username}</td><td>${data[i].email}</td><td>${data[i].phone}</td></tr>`);
        }
      }
    });
  })
})
</script>
</html>
