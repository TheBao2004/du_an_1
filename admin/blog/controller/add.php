<?php

$data = [
    'titlePage' => 'Thêm Blog'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('add', 'admin', 'blog');

?>


<?php

layout('footer', 'admin');


?>