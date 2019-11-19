<?php 
if (!defined('IN_SITE')) die ('The request not found');
// Gán session (SET)
session_start();
function session_set($key,$val)
{
	$_SESSION[$key]=$val;
}
// Lấy Session (GET)
function session_get($key){
	return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
}
// Xóa Session
function session_delete($key){
	if (isset($_SESSION[$key])) {
		unset($_SESSION[$key]);
	}
}
 ?>