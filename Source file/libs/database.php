<?php 
$conn=null;
function db_connect(){
	global $conn;
	if (!$conn) {
		$conn=mysqli_connect('localhost','root','','php_example') or die("Không thể kết nối CSDL");
	mysqli_set_charset($conn,'UTF-8');
	}
}
// Hàm ngắt kết nối
function db_close(){
	global $conn;
	if ($conn) {
		mysqli_close($conn);
	}
}
// Hàm lấy danh sách, kết quả trả về là 1 mảng
function db_get_list($sql){
	db_connect();
	global $conn;
	$data=array();
	$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result)) {
		$data[]=$row;
	}
	return $data;
}
// Hàm lấy chi tiết theo ID
function db_get_row($sql){
	db_connect();
	global $conn;
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		$row=mysqli_fetch_assoc($result);
	}
	return $row;
}
// Hàm thực thi câu lệnh truy vấn insert,update,delete
function db_excute($sql){
	db_connect();
	global $conn;
	return mysqli_query($conn,$sql);
}

?>