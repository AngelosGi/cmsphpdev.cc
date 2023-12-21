<?php

class Posts extends Controller {
    protected function Index(){
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->Index(), true);
    }
}