<?php

class TrainingController extends Controller {

    public function index() {
        $trainingModel = $this->model('Training');
        $data['trainings'] = $trainingModel->getAll();
        $this->view('public/training', $data);
    }

    public function single($id) {
        $trainingModel = $this->model('Training');
        $data['training'] = $trainingModel->getById($id);
        $this->view('public/training-single', $data);
    }
}
