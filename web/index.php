<?php

require '../bootstrap.php';
require '../HairSalonApplication.php';

// デバッグモードではない
$app = new HairSalonApplication();
//var_dump($app);
$app->run();
