<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>多文件上传</title>
</head>
<body>
<form method="post" action="domes_download.php">
    <select name="select[]" multiple="multiple">
        <option value="0">请选择你要下载的文件</option>
        <option value="./file_download/1.jpg">这是第一个文件</option>
        <option value="./file_download/2.jpg">这是第二个文件</option>
        <option value="./file_download/3.jpg">这是第三个文件</option>
    </select>
    <input type="submit" name="submit" value="下载"/>
</form>
</body>
</html>
