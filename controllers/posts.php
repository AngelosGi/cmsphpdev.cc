<?php

class Posts extends Controller {
    protected function Index(){
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

    protected function add(){
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->add(), true);
    }
}