<?php

class ErrorController extends Controller {
    public function index() {
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
    }
}
