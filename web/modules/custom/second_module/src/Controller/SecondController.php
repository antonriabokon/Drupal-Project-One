<?php

namespace Drupal\second_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class SecondController extends ControllerBase {

    public function second() {
        return new Response('Hello, Anton!');
    }
} 
?>
