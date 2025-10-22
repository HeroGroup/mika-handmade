<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | {{$pageTitle}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/assets/admin/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/assets/admin/images/logo.svg" alt="logo">
              </div>
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/assets/admin/js/off-canvas.js"></script>
  <script src="/assets/admin/js/hoverable-collapse.js"></script>
  <script src="/assets/admin/js/template.js"></script>
  <script src="/assets/admin/js/settings.js"></script>
  <script src="/assets/admin/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
