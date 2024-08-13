<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
  <style>
    body.dark-mode {
      background-color: #343a40;
      color: #ffffff;
    }

    .dark-mode .main-header.navbar {
      background-color: #343a40;
    }

    .dark-mode .main-sidebar {
      background-color: #343a40;
    }

    .dark-mode .content-wrapper {
      background-color: #343a40;
    }

    .dark-mode .footer {
      background-color: #343a40;
      color: #ffffff;
    }

    .dark-mode .nav-link .fas {
      color: #ffffff !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" id="theme-toggle">
            <i class="fas fa-moon"></i>
          </a>
        </li>
        <!-- Existing items ... -->
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{URL::to('')}}" class="brand-link">
        <img src="../adminLTE/dist/img/logoH.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
        <span class="brand-text font-weight-light ">Hospital Regional</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/adminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{URL::to('')}}" class="nav-link">
                <i class="fa-solid fa-house-medical" style="color: #f35e8a;"></i>
                <p>Inicio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-users-line" style="color: #82a2d9;"></i>
                <p>Paciente<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{URL::to('/paciente')}}" class="nav-link">
                    <i class="fa-solid fa-hospital-user nav-icon" style="color: #a8c3f5;"></i>
                    <p>Listado</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{URL::to('/cita')}}" class="nav-link">
                    <i class="fa-solid fa-hand-holding-medical nav-icon" style="color: #f7ae69;"></i>
                    <p>Citas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{URL::to('/historia')}}" class="nav-link">
                    <i class="fa-solid fa-file-medical fa-lg nav-icon" style="color: #7ce48d;"></i>
                    <p>Historia Clinica</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-chart-line nav-icon" style="color: #a183fb;"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div>
        </div>
      </section>
      <section class="content">
        @yield('contenido')
      </section>
    </div>
    <footer class="bg-dark text-white text-center py-3">
      <p>&copy; 2024 Hospital RDT. Todos los derechos reservados.</p>
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <script src="/adminLTE/plugins/jquery/jquery.min.js"></script>
  <script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/adminLTE/dist/js/adminlte.min.js"></script>
  <script src="/adminLTE/dist/js/demo.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggle = document.getElementById('theme-toggle');
      const body = document.body;

      // Load the user's preference from localStorage
      if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        toggle.querySelector('i').classList.remove('fa-moon');
        toggle.querySelector('i').classList.add('fa-sun');
        toggle.querySelector('i').style.color = '#ffffff';
      }

      // Toggle dark mode
      toggle.addEventListener('click', function() {
        body.classList.toggle('dark-mode');
        if (body.classList.contains('dark-mode')) {
          localStorage.setItem('theme', 'dark');
          toggle.querySelector('i').classList.remove('fa-moon');
          toggle.querySelector('i').classList.add('fa-sun');
          toggle.querySelector('i').style.color = '#ffffff';
        } else {
          localStorage.removeItem('theme');
          toggle.querySelector('i').classList.remove('fa-sun');
          toggle.querySelector('i').classList.add('fa-moon');
          toggle.querySelector('i').style.color = '';
        }
      });
    });
  </script>
</body>

</html>