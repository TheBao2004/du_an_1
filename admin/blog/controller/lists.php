<?php

$data = [
    'titlePage' => 'Blog'
];

layout('header', 'admin', $data);

?>


<?php

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

view('board', 'admin', 'blog');

?>


<?php

layout('footer', 'admin');


?>