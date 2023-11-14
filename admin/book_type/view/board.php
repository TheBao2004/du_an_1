<?php


require _WEB_PATH_ROOT."/admin/book_type/model/board.php";



?>

<div class="container_my">

    <a href="" class="btn btn-primary">Thêm <i class="fa fa-adjust mx-2"></i></a>

    <br>

    <table width="100%" class="mt-3">
        <thead>
            <tr>
                <th width="10%" class="board_th">STT</th>
                <th class="board_th">Tên</th>
                <th width="10%" class="board_th">Sửa</th>
                <th width="10%" class="board_th">Xóa</th>
            </tr>
        </thead>
        <tbody>

<?php

    if(!empty($allBookType)){

?>

            <tr>
                <td class="board_td text-center">1</td>
                <td class="board_td">1</td>
                <td class="board_td text-center"><a href="" class="btn btn-warning">Sửa</a></td>
                <td class="board_td text-center"><a href="" class="btn btn-danger">Xóa</a></td>
            </tr>

<?php

    }

?>

        </tbody>
    </table>

</div>