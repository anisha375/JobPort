<?php

class AdminController extends Controller {
public function index() {
    header('Location: ' . BASE_URL . '/AdminController/dashboard');
    exit;
}

    public function dashboard() {
        $user = Session::get(SESSION_USER);
        if (!$user || $user->role !== ROLE_ADMIN) {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

        $adminModel = $this->model('Admin');
        $data['users'] = $adminModel->getAllUsers();
        $data['jobs'] = $adminModel->getAllJobs();
        $this->view('admin/dashboard', $data);
    }

    public function deleteUser($id) {
        $this->model('Admin')->deleteUser($id);
        header('Location: ' . BASE_URL . '/AdminController/dashboard');
    }

    public function deleteJob($id) {
        $this->model('Admin')->deleteJob($id);
        header('Location: ' . BASE_URL . '/AdminController/dashboard');
    }


public function blogs() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'admin') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $blogModel = $this->model('Blog');

        if (isset($_GET['delete'])) {
        $blogModel->delete($_GET['delete']);
        header('Location: ' . BASE_URL . '/AdminController/blogs');
        exit;
    }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = htmlspecialchars(trim($_POST['title']));
        $content = trim($_POST['content']);
        $imageName = null;

                if (!empty($_FILES['image']['name'])) {
            $targetDir = '../public/assets/images/';
            $imageName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $targetDir . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        }

        $blogId = $_POST['id'] ?? null;

        if ($blogId) {
                        $blogModel->update($blogId, [
                'title' => $title,
                'content' => $content,
                'image' => $imageName
            ]);
        } else {
                        $blogModel->create([
                'title' => $title,
                'content' => $content,
                'image' => $imageName,
                'admin_id' => $user->id
            ]);
        }

        header('Location: ' . BASE_URL . '/AdminController/blogs');
        exit;
    }

        $edit = null;
    if (isset($_GET['edit'])) {
        $edit = $blogModel->getById($_GET['edit']);
    }

    $data['edit'] = $edit;
    $data['blogs'] = $blogModel->getAll();
    $this->view('admin/blogs', $data);
}


public function trainings() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'admin') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $trainingModel = $this->model('Training');

        if (isset($_GET['delete'])) {
        $trainingModel->delete($_GET['delete']);
        header('Location: ' . BASE_URL . '/AdminController/trainings');
        exit;
    }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = htmlspecialchars(trim($_POST['title']));
        $content = trim($_POST['content']);
        $imageName = null;

        if (!empty($_FILES['image']['name'])) {
            $targetDir = '../public/assets/images/';
            $imageName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $targetDir . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        }

        $trainingId = $_POST['id'] ?? null;

        if ($trainingId) {
            $trainingModel->update($trainingId, [
                'title' => $title,
                'content' => $content,
                'image' => $imageName
            ]);
        } else {
            $trainingModel->create([
                'title' => $title,
                'content' => $content,
                'image' => $imageName,
                'admin_id' => $user->id
            ]);
        }

        header('Location: ' . BASE_URL . '/AdminController/trainings');
        exit;
    }

        $edit = null;
    if (isset($_GET['edit'])) {
        $edit = $trainingModel->getById($_GET['edit']);
    }

    $data['edit'] = $edit;
    $data['trainings'] = $trainingModel->getAll();
    $this->view('admin/trainings', $data);
}


public function users() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'admin') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $userModel = $this->model('User');
    $jobModel = $this->model('Job');
    $appModel = $this->model('Application');

    $data = [
        'total_users' => $userModel->getTotal(),
        'seekers' => $userModel->countByRole('seeker'),
        'employers' => $userModel->countByRole('employer'),
        'total_jobs' => $jobModel->getTotal(),
        'total_applications' => $appModel->getTotal(),
        'application_rate' => $appModel->getAverageApplicationsPerJob()
    ];

    $this->view('admin/users', $data);
}
public function jobs() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'admin') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $jobModel = $this->model('Job');
    $appModel = $this->model('Application');

    $data['jobs'] = $jobModel->getAllWithEmployer();
    $data['applications'] = $appModel->countApplicationsPerJob();

    $this->view('admin/jobs', $data);
}

public function messages() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'admin') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $messageModel = $this->model('Message');
    $data['messages'] = $messageModel->getAll();

    $this->view('admin/messages', $data);
}



}
