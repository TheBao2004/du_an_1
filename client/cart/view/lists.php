


<?php

$user_id = _MY_DATA['id'];

require _WEB_PATH_ROOT.'/client/cart/model/lists.php';

$arrPro = [];

$sumPrice = 0;


?>



<div class="box_cart">


    <div>

        <table class="w-100">
            <thead>
                <tr>
                    <th class="board_th">Sản phẩm</th>
                    <th width="17%" class="board_th">Giá sản phẩm</th>
                    <th width="25%" class="board_th">Số lượng</th>
                    <th width="15%" class="board_th">Giá tổng</th>
                    <th width="10%" class="board_th">Xóa</th>
                </tr>
            </thead>
        </table>

        <hr>

<?php

if(!empty($allCart)):
    foreach ($allCart as $key => $value):
        $id = $value['id'];
        $book_id = $value['book_id'];
        $detailBook = getRow("SELECT * FROM book WHERE id='$book_id'");
        $price = $detailBook['price']*$value['quantity'];
        $sumPrice += $price;
        $arrPro[$key]['id'] = $detailBook['id'];
        $arrPro[$key]['quantity'] = $value['quantity'];
?>

        <div class="item_cart">

        <div class="infor_pro d-flex flex-row bd-highlight">
            <img src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/book.png'; ?>" alt="" class="w-25">
            <p class="ml-2 my-auto"><?php echo $detailBook['title']; ?></p>
        </div>

        <div class="price_pro m-auto">
            <h5 class="text-primary"><?php echo $detailBook['price']; ?> VND</h5>
        </div>

        <div class="number_pro m-auto text-center">
                <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=minus_cart&cart_id=$id"; ?>" class="btn btn-primary my-auto"><i class="fa fa-minus"></i></a>
                <input type="number" class="w-25 form-control m-0 d-inline-block" value="<?php echo $value['quantity']; ?>">
                <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=add_cart&cart_id=$id"; ?>" class="btn btn-primary my-auto"><i class="fa fa-plus"></i></a>
        </div>

        <div class="final_price_pro m-auto">
            <h5 class="text-warning"><?php echo $price; ?> VND</h5>
        </div>

        <div class="remove_pro m-auto">
            <a href="<?php echo _WEB_HOST_ROOT."/?module=cart&action=remove_cart&cart_id=$id"; ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
        </div>
        </div>
        <br>

<?php

    endforeach;
else:
?>

<div class="">
    <h3 class="text-center text-danger">CHƯA CÓ SẢN PHẨM NÀO</h3>
</div>

<?php
endif;

?>

    </div>


<?php

$strPro = json_encode($arrPro);

if(is_Post()){

    

    $data = getRequest();

    if(empty($data['address'])){
        $errors['address'] = 'Vui lòng điền thông tin';
    }else if(strlen(trim($data['address'])) < 20){
        $errors['address'] = 'Địa chỉ phải lớn hơn 20 ký tự';
    }

    if(empty($data['phone'])){
        $errors['phone'] = 'Vui lòng điền thông tin';
    }else{
        if(!preg_match('~^0[0-9]{9}$~', $data['phone'])){
            $errors['phone'] = 'Đây không phải số điện thoại';
        }
    }

    if(empty($errors)){

        $dataInsert = [
            'user_id' => $user_id,
            'code_order' => $data['code_order'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'address' => $data['address'],
            'arr_pro' => $strPro,
            'status' => 0,
            'status_pay' => 0,
            'create_at' => date('Y-m-d H:i:s')
        ];

        if(insert('order_pro', $dataInsert)){
            // delete("cart", "user_id='$user_id'");
            $allOrder = getRaw("SELECT id, code_order FROM order_pro WHERE user_id='$user_id'");
            $lastIdOrder = count($allOrder)-1;
            $idOrder = $allOrder[$lastIdOrder]['id'];
            setFlashData('msg', 'Tạo đơn hàng thành công | Mã đơn là: '.$allOrder[$lastIdOrder]['code_order']);
            setFlashData('type', 'success');
            redirect(_WEB_HOST_ROOT."?module=cart&action=qr_book&id=$idOrder");
        }else{
            setFlashData('msg', 'Lỗi hệ thống');
            setFlashData('type', 'danger');
        }
        

    }else{
        setFlashData('msg', 'Vui lòng kiểm tra form');
        setFlashData('type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $data);
    }

    redirect('?module=cart');

}

$msg = getFlashData('msg');
$type = getFlashData('type');
$errors = getFlashData('errors');
$old = getFlashData('old');



if(empty($old)){
    $old = $detailUser;
}

?>


    <div>
            <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
<?php
getAlert($msg, $type);
?>                
                <li class="list-group-item">
                    <form action="" method="post">

                    <input type="hidden" name="code_order" value="CART-<?php echo strtotime(date('Y-m-d H:i:s')).rand(); ?>">

                    <div class="form-group p-2" style="border-bottom: 3px dashed #007bff;">
                        <h6>Tổng tiền: <span class="text-danger"><?php echo $sumPrice; ?> VND</span></h6>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="<?php echo !empty($old['address'])?$old['address']:''; ?>">
                        <span class="text-danger"><?php echo !empty($errors['address'])?$errors['address']:''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo !empty($old['phone'])?$old['phone']:''; ?>">
                        <span class="text-danger"><?php echo !empty($errors['phone'])?$errors['phone']:''; ?></span>
                    </div>

                </li>
                <li class="list-group-item">
                    
                        <input type="submit" <?php echo empty($allCart) || empty($sumPrice)?'disabled':''; ?>  value="Mua ngay" class="btn btn-danger mx-auto d-block">
                    </form>
                </li>
            </ul>
            </div>
    </div>



</div>