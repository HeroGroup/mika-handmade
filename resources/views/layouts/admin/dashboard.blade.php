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
  <link rel="stylesheet" href="/assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/admin/css/style.css">
  <link rel="stylesheet" href="/assets/admin/css/slider.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/assets/admin/images/favicon.ico" />
</head>
<body>
  <div class="container-scroller">
    @include('layouts.admin.partials.navbar')
    <div class="container-fluid page-body-wrapper">      
        @include('layouts.admin.partials.sidebar')
      <div class="main-panel">
          <div class="content-wrapper">
            @include('layouts.admin.partials.response')
            @yield('content')
          </div>
        @include('layouts.admin.partials.footer')
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/assets/admin/vendors/chart.js/chart.umd.js"></script>
  <script src="/assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/assets/admin/js/off-canvas.js"></script>
  <script src="/assets/admin/js/hoverable-collapse.js"></script>
  <script src="/assets/admin/js/template.js"></script>
  <script src="/assets/admin/js/settings.js"></script>
  <script src="/assets/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/assets/admin/js/dashboard.js"></script>

  <!-- End custom js for this page-->
  <script src="/assets/admin/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="/assets/admin/js/utils.js" type="text/javascript"></script>
  <script>
    function removeRecord(route, elementId) {
      if (confirm("Delete this record?")) {
        var formData = createFormData({
          '_token': '{{csrf_token()}}',
          '_method': 'DELETE'
        });

        var params = {
          method: 'POST',
          route,
          formData,
          successCallback: function() {
            document.getElementById(elementId).remove();
          }
        }; 

        sendRequest(params);
      }
    }

    function toggleEnable(id, checked, route) {
      var formData = createFormData({
        '_token': '{{csrf_token()}}',
        'id': id,
        'is_active': checked ? 1 : 0
      });
          
      var params = {
        method: 'POST',
        route,
        formData,
        failCallback: function() {
          document.getElementById(`enabled_${id}`).checked = !checked;
        }
      };

      sendRequest(params);
    }
  </script>
</body>

</html>

