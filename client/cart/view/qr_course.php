

<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    require _WEB_PATH_ROOT.'/client/cart/model/qr_course.php';

    $user_id = _MY_DATA['id'];

    if(!empty($detailCourse)){
        $detaiUser = getRow("SELECT email FROM user WHERE id='$user_id'");
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




<div class="box_form_course">

    <div class="course_pro">
        <img src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$detailCourse['image']; ?>" class="w-100 box_shadow" alt="">
        <hr>
        <h5>Tiêu đề: <?php echo $detailCourse['title']; ?></h5>
        <br>
        <h5>Giá: <?php echo $detailCourse['price']; ?> VND</h5>
        <br>
        <h5>Chương: <?php echo !empty($allChapter)?$allChapter:'0'; ?> chương</h5>
    </div>

    <div class="d-flex align-items-center" style="border-left: 10px solid #ffc107;">
           <div class="form_course mx-auto">
            <h3 class="text-center text-warning">QUÉT MÃ QR ĐỂ THANH TOÁN</h3>
            <i class="text-center mb-3 d-block">( chú ý sau khi thanh toán bằng qr chúng tôi sẽ gửi bạn mã kích hoạt vào email của tài khoản này )</i>
            <!-- 
            <form action="" method="post">

                <input type="hidden" name="course_id" value="<?php echo $detailCourse['id']; ?>" >

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $detaiUser['email']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" value="Mua ngay">
                </div>
            </form> -->


            <input type="hidden" class="qr_text" id="qr_text" placeholder="Nhập text hoặc URL" value="<?php echo _WEB_HOST_ROOT."/?module=cart&action=email_course&course_id=$id"; ?>" />

            <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=email_course&course_id=$id"; ?>" class="body-qr"></a>
            <div class="footer-qr">
            <a href="" id="generate" class="d-none">Tạo QR Code</a>
            </div>


        </div> 
    </div>



</div>