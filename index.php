<?php

require_once 'controllers/index.controller.php';
require_once 'controllers/usuario.controller.php';

require_once 'models/usuario.model.php';

$vista = new IndexController();

$vista -> getView() ;

