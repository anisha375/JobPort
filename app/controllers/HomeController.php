<?php

class HomeController extends Controller {

    public function index() {
        $jobModel = $this->model('Job');
        $applicationModel = $this->model('Application');

                $topJobs = $jobModel->getTopJobsByApplications(3);

        $data['top_jobs'] = $topJobs;

        $this->view('public/index', $data);
    }
}
