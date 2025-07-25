<?php

    $db_host1 = '45.122.220.136';
    // $db_host1 = 'http://thietkeweb123.thietkewebsitegbvn.com/';
	// $db_host1 = 'thietkeweb123.thietkewebsitegbvn.com';
	$db_user_vn1 = 'thietkeweb_db';
	$db_pass1 = 'KMe7QAeSw7SPFjqT';
	$db_name_vn1 = 'thietkeweb_db';
	
	 $conn_vn1 = NULL;
	 $result_vn1 = NULL;
	
	
	/*------------------------*/
	// private function connectdb(){		
	
		$sql1 = "SET NAMES 'utf8'";		
		$conn_vn1 =  mysqli_connect($db_host1, $db_user_vn1, $db_pass1);
		if ($conn_vn1){
			$select_db1 = mysqli_select_db($conn_vn1,$db_name_vn1);
			if(!$select_db1){
				echo 'Not found database';
			}
		}
		else{
			echo 'Can not connect to database!';
		}
		mysqli_query($conn_vn1,$sql1);
		// echo 'tuan';die;						
	// }

	
	
	// public function disconnect(){
	// 	global $conn_vn;
	// 	if($conn_vn){
	// 		mysqli_close($conn_vn);
	// 	}
	// } 
	
	// public function query($sql){
	// 	global $conn_vn;
	// 	global $result_vn;
	// 	free_query();
	// 	$result_vn = mysqli_query($conn_vn,$sql);
	// }
	
	// public function free_query(){
	// 	global $conn_vn;
	// 	global $result_vn;
	// 	if($result_vn){
	// 		mysqli_free_result($result_vn);		
	// 	}
		
	// }
	
	// public function num_row(){
	// 	global $conn_vn;
	// 	global $result_vn;
	// 	if($result_vn){
	// 		$rows = mysqli_num_rows($result_vn);
	// 		return $rows;
	// 	}
		
	// }
	
	// public function fetch(){
	// 	global $conn_vn;
	// 	global $result_vn;
	// 	if($result_vn){
	// 		$row = mysqli_fetch_array($result_vn);
	// 		return $row;
	// 	}
				
	// }
	
	// public function fetch_one(){
	// 	global $conn_vn;
	// 	global $result_vn;
	// 	if($result_vn){
	// 		$row = mysqli_fetch_assoc($result_vn);
	// 		return $row;
	// 	}
		
	// }
