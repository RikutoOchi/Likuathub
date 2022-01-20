<?php
    require_once __DIR__.'/../header.php';  
    //セッションに保存されている情報（ユーザーID、名前、フリガナ、郵便番号等をから空にし、
    //クッキーに保存されているセッションIDも無効にしてセッションを破棄する
    $_SESSION=[];
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-1000,'/');
    }
    session_destroy();

    //ユーザIDと名前のクッキー情報も破棄
    setcookie('userId','',time()-1000,'/');
    setcookie('userName','',time()-1000,'/');

    //ジャンル選択画面へ
    header("location:".$index_php);