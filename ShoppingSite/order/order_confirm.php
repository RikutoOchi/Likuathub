<?php
session_start();
    if($_SESSION['userName'] === "ゲスト"){
        header('Location:./../user/login.php');
        exit();
    }

    //セッションから情報取得
    $userName = $_SESSION['userName'];
    $zip = $_SESSION['zip'];
    $address = $_SESSION['address'];
    $tel = $_SESSION['tel'];

    //カートオブジェクトを生成
    require_once __DIR__.'/../classes/cart.php';
    $cart = new Cart();

    $cartitems = $cart->getItems($_SESSION['userId']);

    require_once __DIR__.'/../header.php';
    require_once __DIR__.'/../util.php';
?>

<p>注文内容をご確認ください
    <a href="../order/order_now.php"><span class="button_image2">注文を確定する</span></a>
</p>
<table>
    <caption>お届け先</caption>
    <tr><td>お名前</td><td><?=h($userName)?></td></tr>
    <tr><td>郵便番号</td><td><?=h(mb_substr($zip,0,3))?>-<?=h(mb_substr($zip,3))?></td></tr>
    <tr><td>住所</td><td><?=h($address)?></td></tr>
    <tr><td>電話番号</td><td><?=h($tel)?></td></tr>
    <tr><td colspan="2" class="tb_center">
        <a href="../user/signup.php"><span class="button_image">お届け先を変更する</span></a>
    </td></tr>
</table>

<table>
    <caption>注文内容</caption>
    <tr><th>&nbsp;</th><th>商品名</th><th>メーカー・著者<br>アーティスト</th><th>価格</th><th>注文数</th><th>金額</th></tr>

    <?php
    $total = 0;
    foreach($cartitems as $item){
        $total +=$item['price']*$item['ident'];
    ?>

    <tr>
        <td class="td_mini_img"><img class="mini_img"src="../images/<?= $item['image'] ?>"></td>
        <td class="td_item_name"><?= $item['name'] ?></td>
        <td class="td_item_maker"><?= $item['maker'] ?></td>
        <td class="td_right">&yen;<?= number_format($item['price']) ?></td>
        <td class="td_right"><?=$item['quantity']?></td>
        <td class="td_right">&yen;<?= number_format($item['price']*$item['quantity']) ?></td>
    </tr>

    <?php 
    }
    ?>

    <tr><th colspan="5">合計金額</th>
    <td class="td_right">&yen;<?= number_format($total) ?></td>
    </tr>
    <tr><td colspan="6" class="td_center">
        <a href="../cart/cart_list.php"><span class="button_image">注文内容を変更する</span></a>
    </td></tr>
</table>
<?php
    require_once __DIR__.'/../footer.php';