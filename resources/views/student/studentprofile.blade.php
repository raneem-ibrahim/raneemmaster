
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
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/image/شفيع.jpg');">
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
                            <i class="material-symbols-rounded text-lg position-relative">email</i>
                            <span class="me-1">جداول الحفظ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-2 py-1" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">
                            <i class="material-symbols-rounded text-lg position-relative">settings</i>
                            <span class="me-1">احكام التجويد</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- نهاية تنقل الصفحات  --}}
    </div>



      
      <div class="tab-content">
        <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
          <div class="row">

            <div class="row">
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-xl-6 mb-xl-0 mb-4">
                    <div class="card bg-transparent shadow-xl">
                      <div class="overflow-hidden position-relative border-radius-xl">
                        <img src="../assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                        <span class="mask bg-gradient-dark opacity-10"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                          <i class="material-symbols-rounded text-white p-2">wifi</i>
                          <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                          <div class="d-flex">
                            <div class="d-flex">
                              <div class="me-4">
                                <p class="text-white text-sm opacity-8 mb-0">حامل البطاقة</p>
                                <h6 class="text-white mb-0">جاك بيترسون</h6>
                              </div>
                              <div>
                                <p class="text-white text-sm opacity-8 mb-0">تاريخ الانتهاء</p>
                                <h6 class="text-white mb-0">11/22</h6>
                              </div>
                            </div>
                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                              <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="card">
                          <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                              <i class="material-symbols-rounded opacity-10">account_balance</i>
                            </div>
                          </div>


                          <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">الراتب</h6>
                            <span class="text-xs">
                              @if($selectedTeacher)
                                المعلم: {{ $selectedTeacher->first_name }} {{ $selectedTeacher->last_name }}
                              @else
                                بيلونغ إنترأكتيف
                              @endif
                            </span>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">+$2000</h5>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-md-6 col-6">
                        <div class="card">
                          <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                              <i class="material-symbols-rounded opacity-10">account_balance_wallet</i>
                            </div>
                          </div>
                          <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">بايبال</h6>
                            <span class="text-xs">دفع العمل الحر</span>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">$455.00</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                      <div class="card-header pb-0 p-3">
                        <div class="row">
                          <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">طرق الدفع</h6>
                          </div>
                          <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm">add</i>&nbsp;&nbsp;إضافة بطاقة جديدة</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                              <img class="w-10 me-3 mb-0" src="../assets/img/logos/mastercard.png" alt="logo">
                              <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                              <i class="material-symbols-rounded ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="تحرير البطاقة">edit</i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                              <img class="w-10 me-3 mb-0" src="../assets/img/logos/visa.png" alt="logo">
                              <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                              <i class="material-symbols-rounded ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="تحرير البطاقة">edit</i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">الفواتير</h6>
                      </div>
                      <div class="col-6 text-end">
                        <button class="btn btn-outline-primary btn-sm mb-0">عرض الكل</button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark font-weight-bold text-sm">مارس، 01، 2020</h6>
                          <span class="text-xs">#MS-415646</span>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                          $180
                          <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="text-dark mb-1 font-weight-bold text-sm">فبراير، 10، 2021</h6>
                          <span class="text-xs">#RV-126749</span>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                          $250
                          <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="text-dark mb-1 font-weight-bold text-sm">أبريل، 05، 2020</h6>
                          <span class="text-xs">#FB-212562</span>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                          $560
                          <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="text-dark mb-1 font-weight-bold text-sm">يونيو، 25، 2019</h6>
                          <span class="text-xs">#QW-103578</span>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                          $120
                          <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                        </div>
                      </li>
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="text-dark mb-1 font-weight-bold text-sm">مارس، 01، 2019</h6>
                          <span class="text-xs">#AR-803481</span>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                          $300
                          <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        


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
              <i class="material-symbols-rounded text-6xl text-secondary">settings</i>
              <h4 class="mt-3">الإعدادات المتقدمة</h4>
              <p class="text-muted">هنا يمكنك تعديل إعدادات حسابك وتفضيلاتك</p>
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
        {{-- عرض المعلم الذي تم اختياره --}}
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
              <p class="mb-4 text-sm">
                {{ $selectedTeacher->bio ?? 'لا توجد معلومات إضافية.' }}
              </p>
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
        {{-- عرض كل المعلمين إذا الطالب لم يختر بعد --}}
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
                <p class="mb-4 text-sm">
                  {{ $teacher->bio ?? 'لا توجد معلومات إضافية.' }}
                </p>
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