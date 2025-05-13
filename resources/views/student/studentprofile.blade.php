
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    لوحة التحكم المادية - الإصدار 3
  </title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,600,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/studentstyle.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">





  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<style>
  html, body {
  max-width: 100%;
  overflow-x: hidden;
}

.container {
  max-width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}
  </style>
<body class="g-sidenav-show bg-gray-100" style=" overflow-x: hidden;">
  <div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/image/صورةجديد.jpg');">
      <span class="mask "></span>
    </div>


    <div class="card card-body mx-2 mx-md-2 mt-n6">
      <div class="row gx-4 mb-2 align-items-center justify-content-between">
        {{-- هاي لصورة البروفايل  --}}
        <div class="col-auto">
            <form id="avatarForm" action="{{ route('photostudent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="Image-profile-container" style="display: flex; align-items: center; gap: 20px;">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{ auth()->check() && auth()->user()->image ? asset('storage/' . auth()->user()->image) : '/image/profile.jpg' }}');">
                            </div>
                        </div>
                    </div>
                    <div class="avatar-info">
                        <h5 class="mb-1">
                            {{ $student->first_name }} {{ $student->last_name }}
                        </h5>
                    </div>
                </div>
            </form>
        </div>
        {{-- نهاية لصورة البروفايل  --}}
    
        {{-- بدايتها هاي تبعت تنقل الصفحات  --}}
        <div class="col-auto">
            <div class="nav-wrapper position-relative">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-2 py-1 active" id="app-tab" data-bs-toggle="tab" href="#app" role="tab" aria-selected="true">
                            <i class="material-symbols-rounded text-lg position-relative">home</i>
                            <span class="me-1">الرئيسية</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-2 py-1" id="messages-tab" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false">
                          <i class="material-symbols-rounded text-lg position-relative">event_note</i>
                          <span class="me-1">جداول الحفظ</span>
                          
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-2 py-1" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">
                          <i class="material-symbols-rounded text-lg position-relative">menu_book</i>
                          <span class="me-1">أحكام التجويد</span>
                          
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle mb-0 px-2 py-1" id="settingsDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="material-symbols-rounded text-lg position-relative">settings</i>
                        <span class="me-1">الإعدادات</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end text-end" aria-labelledby="settingsDropdown">
                        <li>
                          <a class="dropdown-item" href="#notifications" data-bs-toggle="tab">
                            <i class="material-symbols-rounded ms-1">notifications</i>
                            الإشعارات
                          </a>
                        </li>
                      
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <a class="dropdown-item text-danger" href="{{route('index')}}">
                            <i class="material-symbols-rounded ms-1">logout</i>
                            تسجيل الخروج
                          </a>
                        </li>
                      </ul>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        {{-- نهاية تنقل الصفحات  --}}
    </div>



      
      <div class="tab-content">
        <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
          <div class="row">

   <div class="container" style="width: 550px; margin-left: 0;">
    <div class="row" style="justify-content: flex-end;">
        <!-- الدائرة الأولى -->
        <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">90%</div>
            </div>
            <div class="progress-label">المستوى الأول</div>
        </div>
        
        <!-- الدائرة الثانية -->
        <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
            <div class="progress-label">المستوى الثاني</div>
        </div>
        
        <!-- الدائرة الثالثة -->
        <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">60%</div>
            </div>
            <div class="progress-label">المستوى الثالث</div>
        </div>
    </div>
</div>

          </div>
        </div>
        
 {{-- هاد ستايل circile progress bar --}}
<style>
  .progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #ffffff;
    font-size: 24px;
    color:  #c37044;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color:  #c37044;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}






@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

  </style>
        {{-- هون صفحة الرسائل  --}}
        <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
              {{-- <i class="material-symbols-rounded text-6xl text-secondary">email</i>
              <h4 class="mt-3">قسم الرسائل</h4>
              <p class="text-muted">هنا يمكنك عرض وإدارة جميع رسائلك</p> --}}
              @include('student.tables')
            </div>
          </div>
        </div>    
        {{-- نهاية صفحة الرسائل --}}



        {{-- هون صفحة الاعدادات --}}
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
              {{-- <i class="material-symbols-rounded text-6xl text-secondary">settings</i>
              <h4 class="mt-3">الإعدادات المتقدمة</h4>
              <p class="text-muted">هنا يمكنك تعديل إعدادات حسابك وتفضيلاتك</p> --}}
              @include('student.disblay_video')

            </div>
          </div>
        </div>
        {{-- نهاية صفحة الاعدادت --}}



      </div>

    {{--  بداية اختر معلمك  --}}
    <div class="mb-5 pe-3">
      <h6 class="mb-1">المعلمين</h6>
    </div>
    
    <div class="row">
      @if ($selectedTeacher)
        عرض المعلم الذي تم اختياره
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
          <div class="card card-blog card-plain">
            <div class="card-header p-0 m-2">
              <a class="d-block shadow-xl border-radius-xl">
                <img src="{{ $selectedTeacher->image ? asset('storage/' . $selectedTeacher->image) : asset('image/صورة شخصية.jpg') }}" alt="صورة المعلم" class="img-fluid shadow border-radius-lg">
              </a>
            </div>
            <div class="card-body p-3">
              <a href="javascript:;">
                <h5>
                  {{ $selectedTeacher->first_name }} {{ $selectedTeacher->last_name }}
                </h5>
              </a>
              <div class="avatar-group mt-2">
                @foreach ($selectedTeacher->students as $student)
                  <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $student->first_name }} {{ $student->last_name }}">
                    <img alt="صورة الطالب" src="{{ $student->image ? asset('storage/' . $student->image) : asset('image/صورة شخصية.jpg') }}">
                  </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      @elseif($teachers)
        عرض كل المعلمين إذا الطالب لم يختر بعد
        @foreach ($teachers as $teacher)
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="card-header p-0 m-2">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('image/صورة شخصية.jpg') }}" alt="صورة المعلم" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body p-3">
                <a href="javascript:;">
                  <h5>
                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                  </h5>
                </a>
                <div class="d-flex align-items-center justify-content-between">
                  <form action="{{ route('select.teacher') }}" method="POST">
                    @csrf
                    <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0">اختر معلمك</button>
                  </form>
                  <div class="avatar-group mt-2">
                    @foreach ($teacher->students as $student)
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $student->first_name }} {{ $student->last_name }}">
                        <img alt="صورة الطالب" src="{{ $student->image ? asset('storage/' . $student->image) : asset('image/صورة شخصية.jpg') }}">
                      </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div> 
{{-- نهاية اختر معلمك --}}


{{-- هون اختيار جدول للحفظ  --}}
@if ($needsMemorizationProgram)
    <form action="{{ route('setMemorizationProgram') }}" method="POST">
        @csrf
        <label for="memorization_program">اختر برنامج الحفظ اليومي:</label>
        <select name="memorization_program" id="memorization_program" class="form-select">
            <option value="half_page">نصف صفحة</option>
            <option value="one_page">صفحة</option>
            <option value="two_pages">صفحتين</option>
        </select>
        <button type="submit" class="btn btn-primary mt-2">حفظ الاختيار</button>
    </form>
@endif
{{-- نهياة اختيار جدول الحفظ  --}}


    </div>
  </div>

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  
  <script>
    // تفعيل تبويبات التطبيق والرسائل والإعدادات
    document.addEventListener('DOMContentLoaded', function() {
      // تغيير الاتجاه للعناصر الديناميكية
      document.querySelectorAll('.form-check-input').forEach(function(el) {
        el.style.marginRight = '-1.5em';
        el.style.marginLeft = '0';
      });
      
      // تفعيل أدوات التلميح
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
          placement: 'right'
        });
      });
      
      // زر تعديل الملف الشخصي
      document.getElementById('edit-profile').addEventListener('click', function() {
        alert('سيتم فتح نموذج تعديل الملف الشخصي');
      });
      
      // تفعيل التبويبات
      var tabElms = document.querySelectorAll('a[data-bs-toggle="tab"]');
      tabElms.forEach(function(tabElm) {
        tabElm.addEventListener('shown.bs.tab', function (event) {
          event.target // تبويب مفعل حديثًا
          event.relatedTarget // التبويب السابق النشط
        });
      });
    });
  </script>
       
       <script>
        document.getElementById('imageUpload').addEventListener('change', function() {
            // عرض معاينة الصورة
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').style.backgroundImage = 'url(' + e.target.result + ')';
                }
                reader.readAsDataURL(this.files[0]);
                
                // إرسال الفورم تلقائيًا
                document.getElementById('avatarForm').submit();
            }
        });
        </script>




















</body>
</html> 