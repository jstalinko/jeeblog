<?php
require_once __DIR__ . '/layout/header.php';

route_dispatch(__DIR__.'/routes' , request_get_value('route'));


require_once __DIR__ . '/layout/footer.php';
?>