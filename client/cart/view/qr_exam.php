
<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    $detailExam = getRow("SELECT id FROM exam WHERE id='$id'");
    if(!empty($detailExam)){

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

$msg = getFlashData('msg');
$type = getFlashData('type');

?>

<?php getAlert($msg, $type); ?>

<div class="box_qr">
    
    <div class="text-center " style="border-right: 10px solid #007bff;">
        <input type="hidden" class="qr_text" id="qr_text" placeholder="Nhập text hoặc URL" value="<?php echo _WEB_HOST_ROOT."/?module=cart&action=make_exam&id=$id"; ?>" />

        <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=make_exam&id=$id"; ?>" class="body-qr"></a>
        <div class="footer-qr">
        <a href="" id="generate" class="d-none">Tạo QR Code</a>
        </div>
    </div>

    <div class="d-flex align-items-center" style="border-left: 10px solid #007bff;">
        <div class="mx-auto">
        <h4 class="text-center" style="color: #ffc107;">QUÉT QR ĐỂ THANH TOÁN</h4>
        <p class="text-center">
            <i>( hãy làm bài đúng giờ nhé, lưu ý nếu không làm bài bạn sẽ không có kết quả của bài thi này )</i> 
        </p>
        </div>

    </div>

</div>