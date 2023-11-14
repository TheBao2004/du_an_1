
<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    $detailOrder = getRow("SELECT id FROM order_pro WHERE id='$id'");
    if(!empty($detailOrder)){

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
        <input type="hidden" class="qr_text" id="qr_text" placeholder="Nhập text hoặc URL" value="<?php echo _WEB_HOST_ROOT."/?module=cart&action=pay_book&id=$id"; ?>" />

        <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=pay_book&id=$id"; ?>" class="body-qr"></a>
        <div class="footer-qr">
        <a href="" id="generate" class="d-none">Tạo QR Code</a>
        </div>
    </div>

    <div class="d-flex align-items-center" style="border-left: 10px solid #007bff;">
        <div class="mx-auto">
        <h4 class="text-center" style="color: #ffc107;">QUÉT QR ĐỂ THANH TOÁN</h4>
        <p class="text-center">
            <i>( sau khi thanh toán bạn có thể xem tình trạng đơn hàng này ở phần thông tin tài khoản )</i> 
        </p>
        </div>

    </div>

</div>