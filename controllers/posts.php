<?php

class Posts extends Controller {
    protected function Index(){
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'posts');
        }
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->add(), true);
    }
}