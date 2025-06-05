<?php

class ContactController extends Controller {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $messageModel = $this->model('Message');

            $messageModel->save([
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'message' => trim($_POST['message'])
            ]);

            $data['success'] = "Your message has been sent successfully.";
            $this->view('public/contact', $data);
        } else {
            $this->view('public/contact');
        }
    }
}
