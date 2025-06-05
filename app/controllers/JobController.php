<?php

class JobController extends Controller {

public function browse() {
    
    $jobModel = $this->model('Job');

    $query = $_GET['query'] ?? '';
    $location = $_GET['location'] ?? '';
    $type = $_GET['type'] ?? '';

        $data['jobs'] = $jobModel->searchJobs($query, $location, $type);

        $data['locations'] = $jobModel->getAllLocations();
    $data['types'] = ['Full-time', 'Part-time', 'Contract']; 
        $data['search'] = [
        'query' => $query,
        'location' => $location,
        'type' => $type
    ];

    $this->view('public/browse-jobs', $data);



}



    public function detail($id) {
        $jobModel = $this->model('Job');
        $data['job'] = $jobModel->getById($id);
        $this->view('public/job-details', $data);
    }

    public function apply($jobId) {
        if (!Session::isLoggedIn()) {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

        $user = Session::get(SESSION_USER);
        $appModel = $this->model('Application');

        if (!$appModel->hasApplied($user->id, $jobId)) {
            $appModel->apply($user->id, $jobId);
        }

        header('Location: ' . BASE_URL . '/JobController/detail/' . $jobId);
    }

}
