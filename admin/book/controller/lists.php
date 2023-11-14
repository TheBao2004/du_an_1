<?php

$data = [
    'titlePage' => 'Sách'
];

layout('header', 'admin', $data);

layout('sidebar', 'admin', $data);

layout('breadcrumb', 'admin', $data);

layout('footer', 'admin');


?>