<?php

class VigaTController {

public $model;

    public function index() {
        require_once('views/vigat/index.php');
    }

    public function calculate() {
        require_once('BusinessLogic/checkVigaT.php');
    }

    public function error() {
        require_once('views/error/error.php');
    }

}