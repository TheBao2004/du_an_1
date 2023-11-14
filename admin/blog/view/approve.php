<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    require _WEB_PATH_ROOT.'/admin/blog/model/approve.php';

    if(!empty($detailBlog)){
        if($detailBlog['status'] == 0){
            $statusUpdate = update(
                'blog',
                [
                    'status' => 1
                ],
                "id='$id'"
            );
        }
        if($detailBlog['status'] == 1){
            $statusUpdate = update(
                'blog',
                [
                    'status' => 0
                ],
                "id='$id'"
            );
        }

        if($statusUpdate){
            setFlashData('msg', 'Cập nhật thành công !!!');
            setFlashData('success', 'danger');
        }else{
            setFlashData('msg', 'Lỗi hệ thống');
            setFlashData('success', 'danger');
        }

    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('success', 'danger');
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('success', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);


?>