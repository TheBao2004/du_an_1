<?php


layout('header', 'client');

?>

<div class="container_my padding_X py-3">

<div class="box_profile">



<?php

view('sidebar', 'client', 'profile');

view('exam', 'client', 'profile');

?>

</div>
</div>

<?php

layout('footer', 'client');

?>