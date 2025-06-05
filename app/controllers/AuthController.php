<?php

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $userModel->login($email);

            if ($user && password_verify($password, $user->password)) {
                Session::set(SESSION_USER, $user);

                                switch ($user->role) {
                    case 'admin':
                        header('Location: ' . BASE_URL . '/AdminController/dashboard');
                        break;
                    case 'seeker':
                        header('Location: ' . BASE_URL . '/SeekerController/dashboard');
                        break;
                    case 'employer':
                        header('Location: ' . BASE_URL . '/EmployerController/dashboard');
                        break;
                    default:
                        header('Location: ' . BASE_URL . '/');
                        break;
                }
                exit;
            } else {
                $data['error'] = "Invalid email or password.";
            }
        }

        $this->view('auth/login', $data ?? []);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');

            $data = [
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'role' => $_POST['role']
            ];

            if ($userModel->register($data)) {
                header('Location: ' . BASE_URL . '/AuthController/login');
                exit;
            } else {
                $data['error'] = "Registration failed. Email might already exist.";
            }
        }

        $this->view('auth/signup', $data ?? []);
    }

    public function logout() {
        Session::remove(SESSION_USER);
        Session::destroy();
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
