<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>images</title>
</head>
<body>
	<form action="addpic.php" method="POST">
		<input type="name" placeholder="name">
		<input type="path" placeholder="path">
		<input type="submit" name="submit">
	</form>
	<?php 	
		if (isset($_POST['submit']) &&  isset($_POST['name'])&& isset($_POST['path'])) { 
	        $pics = file_get_contents('pics.json');
	        $arr = json_decode($pics, true);
	        $currimg['name'] = $_POST['name'];
	        $currimg['path'] = $_POST['path']; 
	        array_push( $arr['pictures'], $currimg);
	        $pics = json_encode($arr);
	        if (json_decode($pics) != null) {	
	           	$file = fopen('pics.json','w');
	            fwrite($file, $pics);
	            fclose($file);
	            echo "added thing to thig";
	        }
	        else {
	             echo ":(" ; 
	        }
		}
	 ?>
</body>
</html>