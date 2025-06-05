<?php

class DashboardController extends Controller {

    public function index() {
        $user = Session::get(SESSION_USER);

        if (!$user) {
            header('Location: ' . BASE_URL . '/AuthController/login');
            exit;
        }

        switch ($user->role) {
            case ROLE_SEEKER:
                header('Location: ' . BASE_URL . '/SeekerController/dashboard');
                break;
            case ROLE_EMPLOYER:
                header('Location: ' . BASE_URL . '/EmployerController/dashboard');
                break;
            case ROLE_ADMIN:
                header('Location: ' . BASE_URL . '/AdminController/dashboard');
                break;
            default:
                header('Location: ' . BASE_URL);
        }
    }
}
