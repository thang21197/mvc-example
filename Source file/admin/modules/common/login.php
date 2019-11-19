<?php 
$error=array();
// Kiểm tra nếu là admin thì redirect
if (is_admin()) {
    redirect(base_url('admin/?m=common&a=dashboard'));
}
// Nếu người dùng submit form
if (is_submit('login')) {
    // Lấy tên  đăng nhập và mật khẩu
    $username=input_post('username');
    $password=input_post('password');
    // Kiểm tra tên đăng nhập
    if (empty($username)) {
        $error['username']='Bạn chưa nhập tên đăng nhập';
    }
    // Kiểm tra mật khẩu
    if (empty($password)) {
        $error['password']='Bạn chưa nhập mật khẩu';
    }
    // Nếu không có lỗi
    if (!$error) {
        // Include file xử lý database user
        include_once('database/user.php');
        // Lấy thông tin theo username
        $user=db_user_get_by_username($username);
        // Nếu không có kết quả
        if (empty($user)) {
            $error['username']='Tên đăng nhập không đúng';
        }
        elseif ($user['password'] != md5($password)) {
            $error['password']='Password của bạn không đúng';
        }
        // Mọi thứ ok thì đăng nhập thành công (redirect sagn trang chủ)
        if (!$error) {
           set_logged($user['username'],$user['level']);
           redirect(base_url('admin/?m=common&a=dashboard'));
        }
    }

}
 ?>
<?php include_once('widgets/header.php'); ?>
<h1>Trang đăng nhập!</h1>
<form method="post" action="">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value=""/><?php show_error($error,'username'); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value=""/><?php show_error($error,'password'); ?>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="request_name" value="login"/></td>
            <td><input type="submit" name="login-btn" value="Đăng nhập"/></td>
        </tr>
    </table>
</form>
<?php include_once('widgets/footer.php'); ?>