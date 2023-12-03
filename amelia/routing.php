<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('start'); #default action

Utils::addRoute('start', 'KredytController');
Utils::addRoute('calc', 'KredytController');