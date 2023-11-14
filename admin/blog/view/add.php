
<?php


require _WEB_PATH_ROOT.'/admin/blog/model/add.php';

if(is_Post()){

    $data = getRequest('post');

    $errors = [];

    if(empty($data['title'])){
        $errors['title'] = 'Vui lòng điền thông tin';
    }else{
        if(strlen(trim($data['title'])) < 5){
            $errors['title'] = 'Thông tin không được dưới 5 ký tự';
        }
    }

    if(empty($data['blog_type_id'])){
        $errors['blog_type_id'] = 'Vui lòng chọn thông tin';
    }

    if(empty($errors)){
        $dataInsert = [
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 0,
            'blog_type_id' => $data['blog_type_id'],
            'author_id' => 1,
            'create_at' => date('Y-m-d H:i:s')
        ];
        if(insert('blog', $dataInsert)){
            setFlashData('msg', 'Thêm thành công !!!');
            setFlashData('type', 'success');
        }else{
            setFlashData('msg', 'Lỗi hệ thống !!!');
            setFlashData('type', 'danger');
        }
    }else{
        setFlashData('msg', 'Vui lòng kiểm tra form !!!');
        setFlashData('type', 'danger');
        setFlashData('old', $data);
        setFlashData('errors', $errors);
    }

    redirect('?module=blog&action=add');
}

$msg = getFlashData('msg');
$type = getFlashData('type');
$old = getFlashData('old');
$errors = getFlashData('errors');

?>


<div class="container_my">

    <?php getAlert($msg, $type); ?>

    <form action="" method="post" class="row mx-0">

        <div class="form-group col-12">
            <label for="">Tiêu đề</label>
            <input type="text" name="title" value="<?php echo !empty($old['title'])?$old['title']:''; ?>" class="form-control"> 
            <?php echo !empty($errors['title'])?formError($errors['title']):''; ?>
        </div>

        <div class="form-group col-12">
            <label for="">Nội dung</label>
            <textarea name="content" id="" cols="30" rows="10" class="ckediter"><?php echo !empty($old['content'])?$old['content']:''; ?></textarea>
            <?php echo !empty($errors['content'])?formError($errors['content']):''; ?>
        </div>

        <div class="form-group col-12">
            <label for="">Chọn loại</label>
            <select class="form-control" name="blog_type_id" id="">
                <option value="">Chọn</option>
                <?php 
                if($allBlogType):
                    foreach ($allBlogType as $key => $value):
                ?>
                    <option <?php echo !empty($old['blog_type_id']) && $old['blog_type_id'] == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'].' - '.$value['id']; ?></option>
                <?php endforeach;endif; ?>
            </select>
            <?php echo !empty($errors['blog_type_id'])?formError($errors['blog_type_id']):''; ?>
        </div>

        <div class="form-group col-12">
                <input type="submit" value="Thêm" class="btn btn-primary w-100">        
        </div>

    </form>
    <hr>                
    <a href="?module=blog" class="btn btn-success mb-3">Danh sách</a>               

</div>