<?php
echo '<pre>', print_r($_SERVER), '</pre>';
include  __DIR__ . '/../src/App/bootstrap.php';

$app->run();
