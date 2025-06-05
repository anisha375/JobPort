<?php

class SeekerController extends Controller {

    public function index() {
                header('Location: ' . BASE_URL . '/SeekerController/dashboard');
        exit;
    }

    public function dashboard() {
        $user = Session::get(SESSION_USER);
        if (!$user || $user->role !== 'seeker') {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

                $this->view('seeker/dashboard');
    }

    public function saved() {
        $user = Session::get(SESSION_USER);
        $jobModel = $this->model('Job');
        $data['saved_jobs'] = $jobModel->getSavedJobs($user->id);
        $this->view('seeker/saved', $data);
    }

    public function saveJob($jobId) {
        $user = Session::get(SESSION_USER);
        $jobModel = $this->model('Job');
        $jobModel->saveJob($user->id, $jobId);
        header('Location: ' . BASE_URL . '/SeekerController/jobs');
    }

    public function unsaveJob($jobId) {
        $user = Session::get(SESSION_USER);
        $jobModel = $this->model('Job');
        $jobModel->unsaveJob($user->id, $jobId);
        header('Location: ' . BASE_URL . '/SeekerController/saved');
    }

    public function jobs() {
        $user = Session::get(SESSION_USER);
        $jobModel = $this->model('Job');
        $data['jobs'] = $jobModel->getAll();
        $this->view('seeker/jobs', $data);
    }

    public function jobDetail($id) {
        $user = Session::get(SESSION_USER);
        $jobModel = $this->model('Job');
        $appModel = $this->model('Application');

        $data['job'] = $jobModel->getById($id);
        $data['has_applied'] = $appModel->hasApplied($user->id, $id);
        $data['saved'] = $jobModel->getSavedJobs($user->id);
        $this->view('seeker/job-detail', $data);
    }

    public function applications() {
        $user = Session::get(SESSION_USER);
        $appModel = $this->model('Application');
        $data['applications'] = $appModel->getByUser($user->id);
        $this->view('seeker/applications', $data);
    }

    public function apply($jobId) {
        $user = Session::get(SESSION_USER);
        $appModel = $this->model('Application');

        if (!$appModel->hasApplied($user->id, $jobId)) {
            $appModel->apply($user->id, $jobId);
        }

        header('Location: ' . BASE_URL . '/SeekerController/jobDetail/' . $jobId);
    }
}
