<?php
// 現在アクセスしているユーザーIDとユーザー名を特定する
//特定できない場合仮のIDを発行する
//この場合、ユーザーIDは"八桁の乱数"でユーザー名は"ゲスト"とする

//セッションが開始されていなければ開始する
if(!isset($_SESSION)){
    session_start();
}

//セッション情報としてユーザID,名前が保持されているなら、それを取得
$userId = isset($_SESSION['userId'])?$_SESSION['userId']:'';
$userName = isset($_SESSION['userName'])?$_SESSION['userName']:'';

//セッション情報にユーザID,名前が保持されていないとき
if(empty($userId) || empty($userName)){
    //クッキーにユーザID,名前が保持されているときそれを使用する
    if(isset($_COOKIE['userId']) && isset($_COOKIE['userName'])){
        $userId = $_COOKIE['userId'];
        $userName = $_COOKIE['userName'];
        //クッキーにもユーザID,名前が保存されていないなら、八桁の乱数を発生させ
        //仮のユーザネームとする 有効期限は2週間
    }else{
        $userId = (string)mt_rand(10000000,99999999);
        $userName='ゲスト';
        setcookie("userId",$userId,time()+60*60*24*14,'/');
        setcookie("userName",$userName,time()+60*60*24*14,'/');
    }

    //以上で決定したユーザID名前をセッション情報として保持する
    $_SESSION['userId']=$userId; //セッション変数をUserIdとして保持
    $_SESSION['userName']=$userName; //セッション変数をuserNameとして保持
}

//ヘッダ・フッタで使用するリンクのFQDNの作成準備
$http_host = '//'.$_SERVER['SERVER_NAME']; //なんかあのURL取得
$shopid = mb_substr($_SERVER['REQUEST_URI'],1,9); //shop01008を取得

//ヘッダ・フッタで使用するリンクのURLを用意する
$index_php = $http_host.'/'.$shopid.'/index.php'; //index.phpのURL
$cart_list_php = $http_host.'/'.$shopid.'/cart/cart_list.php'; //カートURL
$order_history_php = $http_host.'/'.$shopid.'/order/order_history.php'; //カートURL
$login_php = $http_host.'/'.$shopid.'/user/login.php'; //ログインURL
$logout_php = $http_host.'/'.$shopid.'/user/logout.php'; //ログアウトURL
$signup_php = $http_host.'/'.$shopid.'/user/signup.php'; //ログインURL

//cssファイルのURLを用意
$shop_css = $http_host.'/'.$shopid.'/css/shop.css';