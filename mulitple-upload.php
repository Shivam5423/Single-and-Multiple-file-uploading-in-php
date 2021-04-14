<?php

if($_SERVER['REQUEST_METHOD']=='POST'):

if(isset($_POST['submit_btn']) and !empty($_POST['submit_btn'])):

$files_arr = $_FILES['file_name']; #Two Dimensional Array

$filename_arr =  $files_arr['name'];
$filetype_arr =  $files_arr['type'];
$file_tmpname_arr =  $files_arr['tmp_name'];
$file_size_arr =  $files_arr['size'];

$upload_path = __DIR__.'/uploads/';

for($i=0;$i<count($filename_arr);$i++):
	$uploaded_filename = $upload_path.$filename_arr[$i];
	if(!move_uploaded_file($file_tmpname_arr[$i],$uploaded_filename)):
		echo 'Cannot Uploaded File';
		break;
	else:
		echo "{$i} files Uploaded";
	endif;
endfor;

endif;

endif;

?>
<!Doctype html>
<html>
	<head>
	</head>
	<body>
		<h1>multiple File Uploading</h1>
		
		<form action="<?php basename($_SERVER['PHP_SELF']);?>" method="post"
		enctype="multipart/form-data">
		
		Select the File : <input type="file" name="file_name[]" multiple accept=".pdf"/>
		<input type="submit" name="submit_btn">
		
	
		</form>
	</body>
</html>