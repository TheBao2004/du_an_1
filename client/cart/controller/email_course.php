<?php

layout('header', 'client');

$body = getRequest('get');

if(!empty(!empty($body['course_id']))){

    $user_id = _MY_DATA['id'];
    $course_id = $body['course_id'];

    $checkActiveCourse = getCountRows("SELECT * FROM active_course WHERE user_id='$user_id' AND course_id='$course_id'");

    $dataInsert = [
        'user_id' => $user_id,
        'course_id' => $course_id,
        'token_active' => rand(),   
        'status' => 0,
        'create_at' => date('Y-m-d H:i:s')
    ]; 

    if(!empty($checkActiveCourse)){
        delete('active_course', "user_id='$user_id' AND course_id='$course_id'");
        insert("active_course", $dataInsert);
    }else{
        insert("active_course", $dataInsert);
    }

    $detailUser = getRow("SELECT * FROM user WHERE id='$user_id'");

    $email = $detailUser['email'];

    $subject = "SMARTFL XIN GỬI BẠN MÃ KÍCH HOẠT KHÓA HỌC";

    $detailActiveCourse = getRow("SELECT * FROM active_course WHERE user_id='$user_id' AND course_id='$course_id'");

    $token = $detailActiveCourse['token_active'];

    $content = '<h3>Xin chào '.$detailUser['fullname'].'</h3>';
    $content .= '<p>Xin cảm ơn bạn đã tin tưởng và mua khóa học của chúng tôi.</p>';
    $content .= '<p>Link khóa học cần xác nhận: <a href="'._WEB_HOST_ROOT."/?module=course&action=detail_course&course_id=$course_id".'">bấm vào đây để đến khóa học.</a></p>';
    $content .= "<p>Đây là mã xác nhận $token.</p>";
    $content .= "<p>Chúc bạn có những giờ học cùng SAMRTFL vui vẻ.</p>";

    $send = sendMail($email, $subject, $content);

    if(!empty($send)){
        redirect(_WEB_HOST_ROOT);
    }


}else{
    // setFlashData('msg', 'url này lỗi');
    // setFlashData('type', 'danger');
    // redirect(_WEB_HOST_ROOT);
}




?>