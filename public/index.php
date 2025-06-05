<?php

require_once '../config/config.php';
require_once '../config/constants.php';


require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/Database.php';
require_once '../app/core/Session.php';

Session::start();


$app = new App();
