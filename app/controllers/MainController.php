<?php

class MainController extends Controller {
    public function action_index(){
        $this->view->page='page_main_index_view';
        $this->view->render();
    }
}
