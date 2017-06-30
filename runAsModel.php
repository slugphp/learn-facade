<?php

use Model\TestModel\User;

require_once __DIR__ . '/model.php';

$user = new User();
echo $user->get();
