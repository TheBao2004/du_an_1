<?php

$body = getRequest('get');

if(!empty($body['cart_id'])){
    $cart_id = $body['cart_id'];
    $detailCart = getRow("SELECT quantity FROM cart WHERE id='$cart_id'");
    if(!empty($detailCart)){
        $quantity = $detailCart['quantity']-1;
        if($quantity <= 0) $quantity = 1;
        $dataUpdate = [
            'quantity' => $quantity
        ];

        if(update('cart', $dataUpdate, "id='$cart_id'")){

        }else{
            setFlashData('msg', 'Giảm sản phẩm thất bại');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'Giảm sản phẩm thất bại');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'Giảm sản phẩm thất bại');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);


?>