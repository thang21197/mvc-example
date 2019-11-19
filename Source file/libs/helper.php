<?php 
if (!defined('IN_SITE')) die ('The request not found');
// Hàm tạo URL
function base_url($uri=''){
 return 'http://localhost/mvc-example/'.$uri;
}
// Hàm Redirect
function redirect($url){
	header('location:{$url}');
	exit();
}
// hàm lấy giá trị từ $_POST
function input_post($key){
	 return isset($_POST[$key])? trim($_POST[$key]):false;
}
// hàm lấy giá trị từ $_GET
function input_get($key){
	 return isset($_GET[$key])? trim($_GET[$key]):false;
}
// Kiểm tra hàm submit
function is_submit($key){
	return (isset($_POST['request_name']) && $_POST['request_name']==$key);
}
// Hàm Show error
function show_error($error,$key){
	echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>'; 
}


 ?>
