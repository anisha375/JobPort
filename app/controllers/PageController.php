<?php

class PageController extends Controller {

    public function privacy() {
        $this->view('public/privacy');
    }

    public function terms() {
        $this->view('public/terms');
    }

    public function contact() {
        $this->view('public/contact');
    }
    public function about() {
        $this->view('public/about');
    }
}
