


{{-- start top --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('image/logo.png')}}">
  <title>
   ترتيل
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/styledash.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">





<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

</head>

<body class="g-sidenav-show rtl bg-gray-100 back" >
{{-- end top  --}}


{{-- start sidebar --}}
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-end me-2 rotate-caret bg-white my-2 back_side" id="sidenav-main ">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src=".{{asset('image/logo-removebg-preview.png')}}" class="navbar-brand-img" width="50" height="50" alt="main_logo">
        <span class="me-1 text-sm text-dark" style="color:#c37044 !important; font-size:xx-large !important;">ترتيل</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto back_side2 " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{url('/dash')}}">
            <i class="material-symbols-rounded opacity-10">dashboard</i>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('viewstudent') }}">
              <i class="material-symbols-rounded opacity-10">group</i>
              <span class="nav-link-text me-1">الطلاب</span>
          </a>
      </li>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" href="#" id="teachersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-symbols-rounded opacity-10">groups</i>
            <span class="nav-link-text me-1">معلمين</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="teachersDropdown">
          @if(auth()->user()->role == 'admin')
              <li>
                  <a class="dropdown-item" href="{{route('addteacher')}}">
                      <i class="material-symbols-rounded opacity-10 me-2">person_add</i>
                      إضافة معلم جديد
                  </a>
              </li>
              <li>
                  <a class="dropdown-item" href="{{route('teachers.index')}}">
                      <i class="material-symbols-rounded opacity-10 me-2">list</i>
                      قائمة المعلمين
                  </a>
              </li>
          @endif
      </ul>
      
    </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/virtual-reality.html">
            <i class="material-symbols-rounded opacity-10">view_in_ar</i>
            <span class="nav-link-text me-1">الواقع الافتراضي</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="../pages/rtl.html">
            <i class="material-symbols-rounded opacity-10">format_textdirection_r_to_l</i>
            <span class="nav-link-text me-1">RTL</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/notifications.html">
            <i class="material-symbols-rounded opacity-10">notifications</i>
            <span class="nav-link-text me-1">إشعارات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{route('profile')}}">
            <i class="material-symbols-rounded opacity-10">person</i>
            <span class="nav-link-text me-1">حساب تعريفي</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/sign-in.html">
            <i class="material-symbols-rounded opacity-10">login</i>
            <span class="nav-link-text me-1">تسجيل الدخول</span>
          </a>
        </li> --}}
        @auth
    <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link text-dark" style="background: none; border: none; padding: 0;">
          <i class="material-symbols-rounded opacity-10">logout</i>
          <span class="nav-link-text me-1">تسجيل الخروج</span>
        </button>
      </form>
    </li>
  @else
    <li class="nav-item">
      <a class="nav-link text-dark" href="{{ route('login') }}">
        <i class="material-symbols-rounded opacity-10">login</i>
        <span class="nav-link-text me-1">تسجيل الدخول</span>
      </a>
    </li>
  @endauth
  
        <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/sign-up.html">
            <i class="material-symbols-rounded opacity-10">assignment</i>
            <span class="nav-link-text me-1">اشتراك</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>
{{-- end sidbare --}}
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
  <!-- start Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
          <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-dark" href="javascript:;">لوحات القيادة</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">RTL</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">RTL</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group input-group-outline">
            <label class="form-label">أكتب هنا...</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <ul class="navbar-nav d-flex align-items-center me-auto ms-0 justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-primary btn-sm mb-0 ms-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">منشئ مضمنة</a>
          </li>
          <li class="mt-1">
            <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          </li>
          <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
            </a>
          </li>

          @php
use App\Models\Contact;
$unreadCount = Contact::where('is_read', false)->count();
$unreadMessages = Contact::where('is_read', false)->latest()->take(5)->get();
@endphp

<li class="nav-item dropdown ps-2 d-flex align-items-center position-relative">
<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="material-symbols-rounded">notifications</i>

    {{-- ✅ badge للرسائل الجديدة --}}
    @if($unreadCount > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $unreadCount }}
            <span class="visually-hidden">رسائل غير مقروءة</span>
        </span>
    @endif
</a>

{{-- ✅ القائمة المنسدلة للرسائل --}}
<ul class="dropdown-menu px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
    @forelse($unreadMessages as $message)
        <li class="mb-2">
            <a class="dropdown-item border-radius-md" href="{{ url('showmessages', $message->id) }}">
                <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary ms-3 my-auto d-flex align-items-center justify-content-center">
                        <i class="material-icons text-white">email</i>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">رسالة جديدة</span> من {{ $message->full_name }}
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            {{ $message->created_at ? $message->created_at->diffForHumans() : '' }}
                        </p>
                    </div>
                </div>
            </a>
        </li>
    @empty
        <li class="mb-2 text-center">
            لا توجد رسائل جديدة
        </li>
    @endforelse
</ul>
</li>

  <!-- End Navbar -->
  <div class="container-fluid py-2  cards">



<div class="container py-4">
    <h2 class="mb-4" style="color: #c37044;">تعديل بيانات المعلم</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" style="background-color: #f9f4ef; padding: 20px; border-radius: 10px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">الاسم الأول</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $teacher->first_name) }}">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">الاسم الأخير</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $teacher->last_name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">العمر</label>
            <input type="number" name="age" class="form-control" value="{{ old('age', $teacher->age) }}">
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">الجندر</label>
            <select name="gender" class="form-control">
                <option value="male" {{ $teacher->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="min_age" class="form-label">أصغر عمر يقوم بتدريسه</label>
            <input type="number" name="min_age" class="form-control" value="{{ old('min_age', $teacher->min_age) }}">
        </div>

        <div class="mb-3">
            <label for="max_age" class="form-label">أكبر عمر يقوم بتدريسه</label>
            <input type="number" name="max_age" class="form-control" value="{{ old('max_age', $teacher->max_age) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">الصورة الشخصية</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn" style="background-color: #c37044; color: white;">تحديث البيانات</button>
    </form>
</div>



    {{-- start footer  --}}
    <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-end">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
     {{-- end footer  --}}
  </div>
</main>



{{-- start end  --}}

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "Views",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "#43A047",
        data: [50, 45, 22, 28, 50, 60, 76],
        barThickness: 'flex'
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: '#e5e5e5'
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            font: {
              size: 14,
              lineHeight: 2
            },
            color: "#737373"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#737373',
            padding: 10,
            font: {
              size: 14,
              lineHeight: 2
            },
          }
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
      datasets: [{
        label: "Sales",
        tension: 0,
        borderWidth: 2,
        pointRadius: 3,
        pointBackgroundColor: "#43A047",
        pointBorderColor: "transparent",
        borderColor: "#43A047",
        backgroundColor: "transparent",
        fill: true,
        data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          callbacks: {
            title: function(context) {
              const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
              return fullMonths[context[0].dataIndex];
            }
          }
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [4, 4],
            color: '#e5e5e5'
          },
          ticks: {
            display: true,
            color: '#737373',
            padding: 10,
            font: {
              size: 12,
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#737373',
            padding: 10,
            font: {
              size: 12,
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

  new Chart(ctx3, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Tasks",
        tension: 0,
        borderWidth: 2,
        pointRadius: 3,
        pointBackgroundColor: "#43A047",
        pointBorderColor: "transparent",
        borderColor: "#43A047",
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [4, 4],
            color: '#e5e5e5'
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#737373',
            font: {
              size: 14,
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [4, 4]
          },
          ticks: {
            display: true,
            color: '#737373',
            padding: 10,
            font: {
              size: 14,
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>





</body>

</html>
{{-- end end  --}}