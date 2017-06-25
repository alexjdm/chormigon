<?php

include_once("BusinessLogic/BusinessLogic.php");

class VigaTController {

    public $BLVigaT;

    public function __construct()
    {
        $this->BLVigaT = new VigaT();
    }

    public function index() {
        require_once('views/vigat/index.php');
    }

    public function calculate() {

        return $this->BLVigaT->checkVigaT();
    }

    public function error() {
        require_once('views/error/error.php');
    }

}