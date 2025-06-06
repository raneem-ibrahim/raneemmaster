
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




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
/* حل المساحة الفارغة */
.tab-content {
  min-height: 300px; /* ارتفاع أدنى لتجنب المساحة الفارغة */
  position: relative;
}

.tab-pane {
  padding: 20px 0;
  transition: opacity 0.3s ease; /* تأثير انتقالي سلس */
}

/* إصلاح مشكلة التحميل */
.tab-pane:not(.active) {
  display: none !important; /* إخفاء التبويبات غير النشطة تماماً */
}

.tab-pane.active {
  display: block;
  opacity: 1;
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
                   <!-- تغيير التبويب والمحتوى الخاص بأحكام التجويد -->
<li class="nav-item">
    <a class="nav-link mb-0 px-2 py-1" id="tajweed-tab" data-bs-toggle="tab" href="#tajweed" role="tab" aria-selected="false">
      <i class="material-symbols-rounded text-lg position-relative">menu_book</i>
      <span class="me-1">أحكام التجويد</span>
    </a>
</li>
                   
                    
                </ul>
            </div>
        </div>
        {{-- نهاية تنقل الصفحات  --}}
    </div>

<div class="mb-5 pe-3">


  {{-- إذا كان الطالب لم يختر بعد --}}
  @if (!$selectedTeacher && $teachers)
    <h6 class="mb-3 fw-bold text-dark">اختر معلمك</h6>
    <form action="{{ route('select.teacher') }}" method="POST">
      @csrf

      {{-- قائمة المعلمين --}}
      <div class="list-group mb-3">
        @foreach ($teachers as $teacher)
          <label class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
              <input class="form-check-input me-2" type="radio" name="teacher_id" value="{{ $teacher->id }}">
              <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('image/صورة شخصية.jpg') }}"
                   alt="صورة المعلم"
                   class="rounded-circle"
                   style="width: 40px; height: 40px; object-fit: cover;">
              <span class="fw-semibold">{{ $teacher->first_name }} {{ $teacher->last_name }}</span>
            </div>
            <small class="text-muted">{{ $teacher->students->count() }} طلاب</small>
          </label>
        @endforeach
      </div>

      {{-- زر الحفظ --}}
      <div class="text-center">
        <button type="submit" class="btn btn-dark btn-sm rounded-pill px-4">تأكيد الاختيار</button>
      </div>
    </form>
@endif
</div>
<style>
input[type="radio"].form-check-input:checked {
  background-color: #c37044 !important;
  border-color: #c37044 !important;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e") !important;
}
input[type="radio"].form-check-input:focus {
  box-shadow: 0 0 0 0.25rem rgba(195, 112, 68, 0.25) !important;
}

  </style>
{{-- نهاية اختر معلمك --}}




        <div class="tab-content">
        <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
        <div class="row" style="flex-direction: row-reverse;">

       
            <!-- عمود إنجاز الأسبوع -->
<div class="col-md-4">
  <div class="card p-3 text-right" style="background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;">
    <h5 class="mb-3" style="text-align: right;">إنجاز الأسبوع</h5>

    <style>
      .custom-progress {
        height: 22px;
        background-color: #e9ecef;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        direction: rtl;
      }
      .custom-progress-bar {
        background: linear-gradient(to left, #28a745, #218838);
        color: #fff;
        font-weight: bold;
        text-align: center;
        line-height: 22px;
        white-space: nowrap;
        transition: width 0.6s ease;
      }
    </style>

    <!-- مثال: يوم السبت -->
    <div class="mb-3">
      <label class="mb-1">السبت</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 75%;">75%</div>
      </div>
    </div>

    <!-- الأحد -->
    <div class="mb-3">
      <label class="mb-1">الأحد</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 60%;">60%</div>
      </div>
    </div>

    <!-- الإثنين -->
    <div class="mb-3">
      <label class="mb-1">الإثنين</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 90%;">90%</div>
      </div>
    </div>

    <!-- الثلاثاء -->
    <div class="mb-3">
      <label class="mb-1">الثلاثاء</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 50%;">50%</div>
      </div>
    </div>

    <!-- الأربعاء -->
    <div class="mb-3">
      <label class="mb-1">الأربعاء</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 85%;">85%</div>
      </div>
    </div>

    <!-- الخميس -->
    <div class="mb-3">
      <label class="mb-1">الخميس</label>
      <div class="custom-progress">
        <div class="custom-progress-bar" style="width: 40%;">40%</div>
      </div>
    </div>

    <!-- الجمعة -->
    <div class="mb-2 text-muted text-center">الجمعة: عطلة</div>
    

  </div>
</div>



      <!-- عمود دوائر التقدم -->
         <div class="col-md-8">
        <div class="row" style="justify-content: flex-end;">
          <!-- الدائرة الأولى -->
          <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
              <span class="progress-left"><span class="progress-bar"></span></span>
              <span class="progress-right"><span class="progress-bar"></span></span>
              <div class="progress-value">90%</div>
            </div>
            <div class="progress-label text-center">المستوى الأول</div>
          </div>

          <!-- الدائرة الثانية -->
          <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
              <span class="progress-left"><span class="progress-bar"></span></span>
              <span class="progress-right"><span class="progress-bar"></span></span>
              <div class="progress-value">75%</div>
            </div>
            <div class="progress-label text-center">المستوى الثاني</div>
          </div>

          <!-- الدائرة الثالثة -->
          <div class="col-md-4 col-sm-4" style="padding-right: 15px; padding-left: 0;">
            <div class="progress blue">
              <span class="progress-left"><span class="progress-bar"></span></span>
              <span class="progress-right"><span class="progress-bar"></span></span>
              <div class="progress-value">60%</div>
            </div>
            <div class="progress-label text-center">المستوى الثالث</div>
          </div>

          <!-- كارد معلومات الطالب -->
          <!-- معلومات الطالب -->
          <div class="card mt-4 p-3 text-right" style="background-color: #fdfdfd; border: 1px solid #ddd; border-radius: 10px;">
  <h5 class="mb-4" style="text-align: right; color: #2c7a7b;">معلومات الطالب</h5>

  <div class="row" style="flex-direction: row-reverse;">
    <div class="col-md-6">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <div><strong>رقم الهاتف:</strong> {{ $student->phone ?? 'غير مدخل' }}</div>
        <i class="fas fa-edit text-primary" style="cursor: pointer;color: #c37044 !important;" data-bs-toggle="modal" data-bs-target="#editModal"></i>
      </div>
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <div><strong>كلمة المرور:</strong> ********</div>
        <i class="fas fa-edit text-primary" style="cursor: pointer; color: #c37044 !important;" data-bs-toggle="modal" data-bs-target="#editModal"></i>
      </div>
    </div>
    <!-- معلومات المعلم كما هي -->
    <div class="col-md-6">
      @if($selectedTeacher)
        <div class="d-flex align-items-center mb-3" style="gap: 10px;">
         <img src="{{ asset('storage/' . $selectedTeacher->image) }}" alt="صورة المعلم" style="width: 60px; height: 60px; border-radius: 50%; border: 2px solid #ccc;">

          <div>
            <div><strong>المعلم:</strong> {{ $selectedTeacher->first_name }} {{ $selectedTeacher->last_name }}</div>
            <div>
              <strong>الدورات:</strong>
              @if($courses->isNotEmpty())
                {{ $courses->pluck('title')->join(' - ') }}
              @else
                لا يوجد دورات
              @endif
            </div>
          </div>
        </div>
      @else
        <div class="mb-3 text-muted">لم يتم تعيين معلم بعد.</div>
      @endif

      <div class="form-group">
        <label for="student-feedback"><strong>رأيك / ملاحظاتك:</strong></label>
        <textarea id="student-feedback" class="form-control" rows="2"
                  placeholder="اكتب رأيك هنا..."
                  style="resize: none; border-radius: 8px; border-color: #ccc;"></textarea>
      </div>
    </div>
  </div>
          </div>


            <!-- مودال التعديل -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('student.updateInfo') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">تعديل المعلومات</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required pattern="^07\d{8}$" title="رقم الهاتف يجب أن يبدأ بـ 07 ويتكون من 10 أرقام.">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">كلمة المرور الجديدة</label>
            <input type="password" name="password" class="form-control" required
                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$"
                   title="كلمة المرور يجب أن تحتوي على حرف كبير، صغير، رقم، ورمز خاص، ويجب أن لا تقل عن 8 أحرف.">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" style="cursor: pointer; background-color: #c37044 !important;">حفظ التعديلات</button>
        </div>
      </div>
    </form>
  </div>
            </div>



           <!--  نهاية كارد معلومات الطالب   -->
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
             
              @include('student.tables')
            </div>
          </div>
        </div>    
        {{-- نهاية صفحة الرسائل --}}



        {{-- هون صفحة الاعدادات --}}
       <!-- وفي قسم المحتوى -->
<div class="tab-pane fade" id="tajweed" role="tabpanel" aria-labelledby="tajweed-tab">
  <div class="row justify-content-center">
    <div class="col-12"> <!-- تغيير من col-md-8 إلى col-12 لملء العرض -->
      <div class="py-3"> <!-- تقليل padding من py-5 إلى py-3 -->
        @include('student.disblay_video')
      </div>
    </div>
  </div>
</div>
        {{-- نهاية صفحة الاعدادت --}}



      </div>

  










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



<script>
document.addEventListener('DOMContentLoaded', function() {
  // تحسين تبديل التبويبات
  const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
  
  tabLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      // إخفاء جميع المحتويات أولاً
      document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('active', 'show');
      });
      
      // إظهار المحتوى المحدد بعد تأخير بسيط
      setTimeout(() => {
        const targetPane = document.querySelector(this.getAttribute('href'));
        if(targetPane) {
          targetPane.classList.add('active', 'show');
        }
      }, 50);
    });
  });
});
</script>
















</body>
</html> 