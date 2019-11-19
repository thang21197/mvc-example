<?php 
if (!defined('IN_SITE')) die ('The request not found');
// Thiết lập trạng thái đăng nhập
function set_logged($username,$level){
	session_set('ss_user_token',array(
    'username'=>$username,
    'level'=>$level
	));
}
// Thiết lập đăng xuất
function set_logout(){
	session_delete('ss_user_token');
}
// Kiểm tra trạng thái người dùng đăng nhập chưa
function is_logged(){
	$user=session_delete('ss_user_token');
	return $user;
}
// Kiểm tra hàm có phải admin k
function is_admin(){
 $user=is_logged();
 if (!empty($user['level'] && $user['level']=='1')) {
 	return true;
 }
 return false;
}


 ?>