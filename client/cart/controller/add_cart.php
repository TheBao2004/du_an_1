<?php

$body = getRequest('get');

if(!empty($body['cart_id'])){
    $cart_id = $body['cart_id'];
    $detailCart = getRow("SELECT quantity FROM cart WHERE id='$cart_id'");
    if(!empty($detailCart)){
        $quantity = $detailCart['quantity']+1;
        if($quantity > 10) $quantity = 10;
        $dataUpdate = [
            'quantity' => $quantity
        ];

        if(update('cart', $dataUpdate, "id='$cart_id'")){

        }else{
            setFlashData('msg', 'Thêm sản phẩm thất bại');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'Thêm sản phẩm thất bại');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'Thêm sản phẩm thất bại');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);


?>