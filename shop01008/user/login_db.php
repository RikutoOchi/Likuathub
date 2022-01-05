<?php
//送られてきたユーザIDとパスワードを取得
$userId = $_POST['userId'];
$password = $_POST['password'];

//Userオブジェクトを生成し、「authUser()」を呼び出す
require_once __DIR__.'/../classes/user.php';
$user = new User();
$result = $user -> authUser($userId,$password);

session_start();
//ログイン失敗時にエラーメッセージをセッションに保存後ログイン画面に遷移
if(empty($result['userId'])){
    $_SESSION['login_error']='ユーザーID、パスワードを確認してください';
    header('Location:login.php');
    exit();
}

//データベースから名前を取得
$userName = $result['userName'];
$user -> changeCartUserId($_SESSION['userId'],$userId);

//ユーザ情報をセッションに保持
$_SESSION['userId'] = $userId;
$_SESSION['userName'] = $userName;
$_SESSION['kana'] = $result['kana'];
$_SESSION['zip'] = $result['zip'];
$_SESSION['address'] = $result['address'];
$_SESSION['tel'] = $result['tel'];

//ユーザIDと名前をクッキーへ
setcookie("userId",$userId,time()+60*60*24*14);
setcookie("userName",$userName,time()+60*60*24*14);

require_once __DIR__.'/../header.php';
require_once __DIR__.'/../util.php';
?>
<p>こんにちは　<?=$userName?>さん</p>
<p>ショッピングをお楽しみください。</p>
<?php
    require_once __DIR__.'/../footer.php';
?>