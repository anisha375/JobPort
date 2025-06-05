<?php

class BlogController extends Controller {
    public function index() {
        $blogModel = $this->model('Blog');
        $data['blogs'] = $blogModel->getAll();
        $this->view('public/blog', $data);
    }

    public function single($id) {
        $blogModel = $this->model('Blog');
        $data['blog'] = $blogModel->getById($id);
        $this->view('public/blog-single', $data);
    }
}
