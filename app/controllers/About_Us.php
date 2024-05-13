<?php

namespace app\controllers;

class About_Us extends \app\core\Controller
{
    public function index()
    {
        $this->view("About_Us/index");
    }
}