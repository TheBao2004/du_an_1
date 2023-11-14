<?php

// layout('header', 'client');

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    // $user_id = _MY_DATA['id'];
    $detailOrder = getRow("SELECT id FROM order_pro WHERE id='$id'");
    if(!empty($detailOrder)){
        $dataUpdate = [
            'status_pay' => 1
        ];

        if(update('order_pro', $dataUpdate, "id='$id'")){
            setFlashData('msg', 'Thanh toán thành công');
            setFlashData('type', 'success');
            redirect(_WEB_HOST_ROOT);
        }else{
            setFlashData('msg', 'lỗi hệ thống');
            setFlashData('type', 'danger');
        }   

    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);

?>