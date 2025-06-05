<?php $user = Session::get(SESSION_USER); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JobPort</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css?v=2">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
  <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold text-primary fs-4" 
       href="<?php
         if (!$user) echo BASE_URL;
         elseif ($user->role === 'admin') echo BASE_URL . '/AdminController/dashboard';
         elseif ($user->role === 'employer') echo BASE_URL . '/EmployerController/dashboard';
         elseif ($user->role === 'seeker') echo BASE_URL . '/SeekerController/dashboard';
         else echo BASE_URL;
       ?>">
      <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="JobPort Logo" height="28" class="me-2">
      JobPort
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center gap-3">

        <?php if (!$user): ?>
                    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-medium" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-briefcase me-1"></i> Browse Jobs
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= BASE_URL ?>/JobController/browse">All Jobs</a></li>
              <li><a class="dropdown-item" href="#">Top Companies</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/BlogController/index">
              <i class="bi bi-journal-text me-1"></i> Blog
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/TrainingController/index">
              <i class="bi bi-mortarboard me-1"></i> Training
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>/AuthController/login" class="btn btn-outline-primary btn-sm">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL ?>/AuthController/register" class="btn btn-primary btn-sm">
              <i class="bi bi-person-plus me-1"></i> Register
            </a>
          </li>

        <?php elseif ($user->role === 'admin'): ?>
                    <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/AdminController/dashboard">
              <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>/AdminController/blogs" class="nav-link text-dark fw-medium">
              <i class="bi bi-journal-text me-1"></i> Manage Blogs
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>/AdminController/trainings" class="nav-link text-dark fw-medium">
              <i class="bi bi-mortarboard me-1"></i> Manage Trainings
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/AuthController/logout">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </li>

        <?php elseif ($user->role === 'employer'): ?>
                    <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/EmployerController/dashboard">
              <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/EmployerController/profile">
              <i class="bi bi-person-circle me-1"></i> My Profile
            </a>
          </li>
                    <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/EmployerController/settings">
              <i class="bi bi-gear-wide-connected me-1"></i> Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/AuthController/logout">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </li>

        <?php elseif ($user->role === 'seeker'): ?>
                    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-medium" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-briefcase me-1"></i> Browse Jobs
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= BASE_URL ?>/JobController/browse">All Jobs</a></li>
              <li><a class="dropdown-item" href="#">Top Companies</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/BlogController/index">
              <i class="bi bi-journal-text me-1"></i> Blog
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/TrainingController/index">
              <i class="bi bi-mortarboard me-1"></i> Training
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/SeekerController/dashboard">
              <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/UserController/profile">
              <i class="bi bi-person-circle me-1"></i> My Profile
            </a>
          </li>

                               <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/UserController/settings">
              <i class="bi bi-gear-wide-connected me-1"></i> Settings
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-dark fw-medium" href="<?= BASE_URL ?>/AuthController/logout">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
