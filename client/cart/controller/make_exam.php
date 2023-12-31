<?php

layout('header', 'client');

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    $user_id = _MY_DATA['id'];

    $detailExam = getRow("SELECT id FROM exam WHERE id='$id'");

    if(!empty($detailExam)){

        $dataInsert = [
            'exam_id' => $id,
            'user_id' => $user_id,
            'create_at' => date('Y-m-d H:i:s')
        ];

        if(insert('make_exam', $dataInsert)){
            setFlashData('msg', 'Hãy làm bài đúng giờ nhé');
            setFlashData('type', 'success');
            redirect(_WEB_HOST_ROOT);
        }else{  
            setFlashData('msg', 'Lỗi hệ thống');
            setFlashData('type', 'danger');
            redirect(_WEB_HOST_ROOT);
        }

    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
        redirect(_WEB_HOST_ROOT);
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
    redirect(_WEB_HOST_ROOT);
}

?>