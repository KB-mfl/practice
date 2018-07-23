<?php
$file_name = "cava3的副本.jpg";     //下载文件名
$file_dir = "file:///Users/uestc/Desktop/";        //下载文件存放目录
//echo $file_dir;
//检查文件是否存在
if (! file_exists ( $file_dir . $file_name )) {
    echo "没有该文件";
} else {
    //以只读和二进制模式打开文件
    //$file = fopen ( $file_dir . $file_name, "rb" );

    //告诉浏览器这是一个文件流格式的文件
    header ( "Content-type: application/jpg" );
    //请求范围的度量单位
    header ( "Accept-Ranges: bytes" );
    //Content-Length是指定包含于请求或响应中数据的字节长度
    header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );
    //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
    header ( "Content-Disposition: attachment; filename=" . $file_name );
    //读取文件内容并直接输出到浏览器
    //echo fread ( $file, filesize ( $file_dir . $file_name ) );
    //fclose ( $file );
    $content = file_get_contents($file_dir . $file_name);
    echo $content;
    // @readfile($file_name);
    // exit ();
}
