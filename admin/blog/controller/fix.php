<?php

$data = [
    'titlePage' => 'Sửa Blog'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('fix', 'admin', 'blog');

?>


<?php

layout('footer', 'admin');


?>