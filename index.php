<?php

if($_SERVER['REQUEST_METHOD']=='POST'):

if(isset($_POST['submit_btn']) and !empty($_POST['submit_btn'])):

$files_arr = $_FILES['file_name']; #Two Dimensional Array
$filename =  $files_arr['name'];
$filetype =  $files_arr['type'];
$file_tmpname =  $files_arr['tmp_name'];
$file_size =  $files_arr['size'];

$upload_path = __DIR__.'/uploads/';

$uploaded_filename = $upload_path.$filename;

if(move_uploaded_file($file_tmpname,$uploaded_filename)):
	
	#include dbconnect
	# tbl_files
	# insert into tbl_files(file) value('$filename');

	 echo 'File Uploaded ';
else:
	 echo 'File Not Uploaded';
endif;
	
else:
	echo 'Press Upload Button';
endif;

endif;

?>
<!Doctype html>
<html>
	<head>
	</head>
	<body>
		<h1>Single File Uploading</h1>
		
		<form action="<?php basename($_SERVER['PHP_SELF']);?>" method="post"
		enctype="multipart/form-data">
		
		Select the File : <input type="file" name="file_name" />
		<input type="submit" name="submit_btn">
		
	
		</form>
	</body>
</html>