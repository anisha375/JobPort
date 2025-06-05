<?php

class UserController extends Controller {

    public function index() {
    header('Location: ' . BASE_URL . '/UserController/profile');
    exit;
}

    public function profile() {
        $user = Session::get(SESSION_USER);
        if (!$user || $user->role !== 'seeker') {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

        $userModel = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cvFile = $user->cv_file;

            if (!empty($_FILES['cv']['name'])) {
                $targetDir = '../public/assets/uploads/';
                $cvFile = time() . '_' . basename($_FILES['cv']['name']);
                move_uploaded_file($_FILES['cv']['tmp_name'], $targetDir . $cvFile);
            }

            $updateData = [
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'bio' => $_POST['bio'],
                'skills' => $_POST['skills'],
                'cv_file' => $cvFile
            ];

            $userModel->updateProfile($user->id, $updateData);
            $user = $userModel->getById($user->id);
            Session::set(SESSION_USER, $user);             $data['success'] = "Profile updated successfully.";
        }

        $data['user'] = $user;
        $data['applications'] = $userModel->getApplications($user->id);

        $this->view('seeker/profile', $data);
    }

    public function changePassword() {
    $user = Session::get(SESSION_USER);
    if (!$user || $user->role !== 'seeker') {
        header('Location: ' . BASE_URL . '/AuthController/login');
        exit;
    }

    $userModel = $this->model('User');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $current = $_POST['current_password'];
        $new = $_POST['new_password'];
        $confirm = $_POST['confirm_password'];

        $userInDb = $userModel->getById($user->id);

        if (!password_verify($current, $userInDb->password)) {
            $data['error'] = "Current password is incorrect.";
        } elseif ($new !== $confirm) {
            $data['error'] = "New passwords do not match.";
        } else {
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            $userModel->updatePassword($user->id, $hashed);
            $data['success'] = "Password updated successfully.";
        }
    }

    $this->view('seeker/settings', $data ?? []);
}
public function settings() {
    header('Location: ' . BASE_URL . '/UserController/changePassword');
    exit;
}


}
