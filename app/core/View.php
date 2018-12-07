<?php

class View {
    public $template;
    public $page;
    public function __construct() {
	$this->template = 'template_main_view';
    }
    public function render(){
	include_once 'app/views/'.$this->template.'.php';
    }
}
