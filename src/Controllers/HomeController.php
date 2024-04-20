<?php
namespace Php\Primeiroprojetocomposer\Controllers;

class HomeController {
    public function index() {
        require_once("../src/Views/home/index.html");
    }
}