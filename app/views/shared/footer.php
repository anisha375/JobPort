</div> <hr class="m-0" style="border-top: 20px solid #e0e0e0;">

<footer style="background-color:rgb(91, 94, 104);" class="text-white pt-5">
  <div class="container">
    <div class="row text-start">

            <div class="col-md-4 mb-4">
        <h6 class="text-uppercase fw-bold">About JobPort</h6>
        <p style="font-size: 0.9rem;">
          Since its launch, JobPort has connected thousands of employers and job seekers across Nepal.
          We help businesses hire faster and job seekers find the right match — fast, free, and reliable.
          <a href="<?= BASE_URL ?>/PageController/about" class="text-info text-decoration-none">Learn More!</a>

        </p>
      </div>

            <div class="col-md-2 mb-4">
        <h6 class="text-uppercase fw-bold">For Job Seeker</h6>
        <ul class="list-unstyled small">
          <li><a href="#" class="text-white-50 text-decoration-none">Search Jobs</a></li>
          <li><a href="<?= BASE_URL ?>/BlogController/index" class="text-white-50 text-decoration-none">Blog</a></li>
          
          <li><a href="<?= BASE_URL ?>/TrainingController/index" class="text-white-50 text-decoration-none">Trainings</a></li>
        </ul>
      </div>

            <div class="col-md-2 mb-4">
        <h6 class="text-uppercase fw-bold">For Employer</h6>
        <ul class="list-unstyled small">
          <li><a href="<?= BASE_URL ?>/EmployerController/postJob" class="text-white-50 text-decoration-none">Post a Job</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Recruitment</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Pricing</a></li>
        </ul>
      </div>

            <div class="col-md-4 mb-4">
        <h6 class="text-uppercase fw-bold">Contact</h6>
        <p class="small text-white-50">
          📍 New Baneshwor, Kathmandu, Nepal<br>
          ☎️ +977-1-1234567<br>
          ✉️ info@jobport.com
        </p>
                <div>
          <a href="#" class="text-white me-2"><i class="bi bi-facebook fs-5"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-twitter fs-5"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-linkedin fs-5"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-youtube fs-5"></i></a>
        </div>
      </div>
    </div>

    <hr class="border-light">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center pb-3">
      <div class="text-white-50 small">
        &copy; <?= date('Y') ?> JobPort. All Rights Reserved.
        <a href="<?= BASE_URL ?>/PageController/privacy" class="text-info text-decoration-none">Privacy</a> |
<a href="<?= BASE_URL ?>/PageController/terms" class="text-info text-decoration-none">Terms</a> |
<a href="<?= BASE_URL ?>/PageController/contact" class="text-info text-decoration-none">Contact</a>

      </div>
      <div class="mt-2 mt-md-0">
        <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="JobPort Logo" style="height: 28px;">
      </div>
    </div>
  </div>
</footer>

<button id="scrollTopBtn" title="Back to top" style="
  position: fixed;
  bottom: 40px;
  right: 25px;
  display: none;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  padding: 12px;
  border-radius: 50%;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
">
  ↑
</button>

<script src="<?= BASE_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/main.js"></script>
</body>
</html>
