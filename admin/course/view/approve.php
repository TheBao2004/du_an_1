<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];

    $detailCourse = getRow("SELECT `status` FROM course WHERE id='$id'");

    if(!empty($detailCourse)){
        
        if($detailCourse['status'] == 0){
            $statusUpdate = update(
                'course',
                [
                    'status' => 1
                ],
                "id='$id'"
            );
        }
        if($detailCourse['status'] == 1){
            $statusUpdate = update(
                'course',
                [
                    'status' => 0
                ],
                "id='$id'"
            );
        }

        if($statusUpdate){
            setFlashData('msg', 'Cập nhật thành công !!!');
            setFlashData('type', 'success');
        }else{
            setFlashData('msg', 'Lỗi hệ thống');
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