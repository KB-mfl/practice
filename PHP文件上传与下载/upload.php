<?php
	//1.接收提交文件的用户
	$username=$_POST['username'];
	//echo $username;
	//print_r($_FILES);
	$fileintro=$_POST['fileintro'];//文件介绍
	$file_size=$_FILES['myfile']['size'];//文件大小
	if($file_size>2*1024*1024) {
		echo "文件过大，不能上传大于2M的文件";
		exit();
	}
	$file_type=$_FILES['myfile']['type'];
	//echo $file_type;
	if($file_type!="application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
		echo "文件类型只能为docx格式";
		exit();
	}
	//判断是否上传成功（是否使用post方式上传）
	if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
		//echo $_FILES['myfile']['tmp_name'];
		//把文件转存到你希望的目录（不要使用copy函数）
		$uploaded_file=$_FILES['myfile']['tmp_name'];
		//echo $uploaded_file;
		//我们给每个用户动态的创建一个文件夹
		//echo $_SERVER['DOCUMENT_ROOT'];
		$user_path=$_SERVER['DOCUMENT_ROOT']."/file_upload".$username;
		//判断该用户文件夹是否已经有这个文件夹
		if(!file_exists($user_path)) {
			mkdir($user_path);//创建该目录
      $file_true_name=$_FILES['myfile']['name'];
  		$move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
  		//echo "$uploaded_file   $move_to_file";
  		if(move_uploaded_file($uploaded_file,$move_to_file)) {
  			echo $_FILES['myfile']['name']."上传成功";
  		} else {
  			echo "上传失败";
  		}
		} else {
			//echo 3123;
		  echo "上传失败";
    }
	}
?>
