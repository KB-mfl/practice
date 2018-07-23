<?php
    $filename="jpg.zip";//当前文件夹（包含地址）
    $file_name=$_POST['select'];
    $file_dir="file:///Users/uestc/Desktop/";
    //echo "12123";
    if(!file_exists($filename)) {
      //echo "131233123";
      $zip = new ZipArchive;
      if ($zip->open($filename,ZipArchive::CREATE)===TRUE) {//在此目录下创造一个Zip
        //echo "zhu";
        foreach($file_name as $val) {
          //echo "zhu";
          // print_r($val);
          if(file_exists($val)) {
            $zip->addFile($val,basename($val));
            //echo "下载OK";
          }
        }
        $zip->close();
      }
    }
    if (!file_exists($filename)) {
      echo "安装包不存在";
    }
    header("content-type:application/zip");
    header("content-Disposition:attachment;filename=" . basename($filename));
    header("content-length:" . filesize($filename));
    //$content = file_get_contents($file_dir . $filename);
    //echo $content;
    @readfile($filename);
 ?>
