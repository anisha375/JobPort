<?php

class EmployerController extends Controller {

    private $user;
    private $companyModel;
    private $jobModel;
    private $appModel;

    public function __construct() {
        $this->user = Session::get(SESSION_USER);
        if (!$this->user || $this->user->role !== 'employer') {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

        $this->companyModel = $this->model('Company');
        $this->jobModel = $this->model('Job');
        $this->appModel = $this->model('Application');
    }

    public function index() {
        header('Location: ' . BASE_URL . '/EmployerController/dashboard');
        exit;
    }

public function dashboard() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'employer') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $companyModel = $this->model('Company');
    $data['company'] = $companyModel->getByUserId($user->id);  
    $this->view('employer/dashboard', $data);
}


    public function postJob() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $company = $this->companyModel->getByUser($this->user->id);

            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'salary' => $_POST['salary'],
                'type' => $_POST['type'],
                'company_id' => $company->id
            ];

            $this->jobModel->create($data);
            header('Location: ' . BASE_URL . '/EmployerController/myJobs');
            exit;
        }

        $this->view('employer/post-job');
    }

    public function myJobs() {
        $company = $this->companyModel->getByUser($this->user->id);
        $data['jobs'] = $this->jobModel->getByCompany($company->id ?? 0);
        $this->view('employer/my-jobs', $data);
    }

    public function viewJob($id) {
        $data['job'] = $this->jobModel->getById($id);
        $this->view('employer/view-job', $data);
    }

    public function applicants($jobId) {
        $data['job'] = $this->jobModel->getById($jobId);
        $data['applicants'] = $this->appModel->getByJob($jobId);
        $this->view('employer/applicants', $data);
    }

    public function profile() {
    $user = Session::get(SESSION_USER);

    $companyModel = $this->model('Company');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $logo = null;

                if (!empty($_FILES['logo']['name'])) {
            $targetDir = '../public/assets/images/';
            $logo = time() . '_' . basename($_FILES['logo']['name']);
            $targetFile = $targetDir . $logo;
            move_uploaded_file($_FILES['logo']['tmp_name'], $targetFile);
        }

        $companyModel->updateCompanyProfile($user->id, [
            'name' => $name,
            'description' => $description,
            'logo' => $logo
        ]);

        header('Location: ' . BASE_URL . '/EmployerController/profile');
        exit;
    }

        $data['company'] = $companyModel->getByUserId($user->id);
    $this->view('employer/profile', $data);
}


    public function settings() {
        $this->view('employer/settings');
    }

    public function deleteJob($id) {
        $this->jobModel->delete($id);
        header('Location: ' . BASE_URL . '/EmployerController/myJobs');
    }

    public function changePassword() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'employer') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $userModel = $this->model('User');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $current = $_POST['current_password'];
        $new = $_POST['new_password'];
        $confirm = $_POST['confirm_password'];

                $currentUser = $userModel->getById($user->id);

        if (!password_verify($current, $currentUser->password)) {
            $data['error'] = "Current password is incorrect.";
        } elseif ($new !== $confirm) {
            $data['error'] = "New passwords do not match.";
        } elseif (strlen($new) < 6) {
            $data['error'] = "Password must be at least 6 characters.";
        } else {
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            $userModel->updatePassword($user->id, $hashed);
            $data['success'] = "Password updated successfully.";
        }

                $this->view('employer/settings', $data ?? []);
    }
}

public function deactivateAccount() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'employer') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $userModel = $this->model('User');
    $jobModel = $this->model('Job');

        $jobModel->deleteByEmployer($user->id);

        $userModel->delete($user->id);

        Session::remove(SESSION_USER);
    Session::destroy();

        header('Location: ' . BASE_URL . '?deactivated=true');
    exit;
}


}
