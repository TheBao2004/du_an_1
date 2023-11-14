
<?php

$body = getRequest('get');

if(!empty($body['cart_id'])){
    $cart_id = $body['cart_id'];
    $detailCart = getRow("SELECT quantity FROM cart WHERE id='$cart_id'");
    if(!empty($detailCart)){
        
        if(delete('cart', "id='$cart_id'")){

        }else{
            setFlashData('msg', 'Xóa sản phẩm thất bại');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'Xóa sản phẩm thất bại');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'Xóa sản phẩm thất bại');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);


?>


?>