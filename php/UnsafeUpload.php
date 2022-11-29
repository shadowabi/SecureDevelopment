<?php
	require_once "publicfunc.php";
	
	header("content-type:text/html;charset=utf-8");
	$error = $_FILES['file']['error'];
	if($error)
	{
		echo "<p>文件上传失败,错误码：$error</p>";
		Free($error,$_FILES['file']);
		die();
	}

	if(!in_array($_FILES['file']['type'], array('image/jpg','image/jpeg','image/png')))
	{
		echo "<p>上传的文件类型只能是jpg,jpeg,png</p>";
		Free($_FILES['file']);
		die();
	}

	if (!file_exists('../uploads/'))
	{
		mkdir('../uploads/');
	}	

	$filename = $_FILES['file']['name'];
	$temp_name = $_FILES['file']['tmp_name'];
	if (move_uploaded_file($temp_name, '../uploads/'.$filename))
	{
		echo "<p>文件保存在：uploads/$filename</p>";
		Free($error,$_FILES['file'],$filename,$temp_name);
		die();
	}
	else
	{
		$error = $_FILES['file']['error'];
		echo "<p>文件上传失败,错误码：$error</p>";
		Free($error,$_FILES['file'],$filename,$temp_name);
		die();
	}
?>
