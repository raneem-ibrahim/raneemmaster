
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
  <style>
    /* تخصيصات إضافية للغة العربية */
    body {
      font-family: 'Tajawal', sans-serif;
    }
    .nav-wrapper .nav-link span {
      margin-right: 8px;
      margin-left: 0;
    }
    .form-check-label {
      padding-right: 1.5em;
      padding-left: 0;
    }
    .form-check-input {
      float: right;
      margin-right: -1.5em;
      margin-left: 0;
    }
    .list-group-item {
      text-align: right;
    }
    .tooltip-inner {
      font-family: 'Tajawal', sans-serif;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="card card-body mx-2 mx-md-2 mt-n6">
      <div class="row gx-4 mb-2">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../assets/img/bruce-mars.jpg" alt="صورة الملف الشخصي" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
            
            </h5>
           
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto me-sm-auto ms-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative start-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" id="app-tab" data-bs-toggle="tab" href="#app" role="tab" aria-selected="true">
                  <i class="material-symbols-rounded text-lg position-relative">home</i>
                  <span class="me-1">التطبيق</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" id="messages-tab" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false">
                  <i class="material-symbols-rounded text-lg position-relative">email</i>
                  <span class="me-1">الرسائل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false">
                  <i class="material-symbols-rounded text-lg position-relative">settings</i>
                  <span class="me-1">الإعدادات</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="tab-content">
        <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">إعدادات المنصة</h6>
                </div>
                <div class="card-body p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder">الحساب</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">أرسل لي بريدًا عند متابعة أحد لي</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault1">
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">أرسل لي بريدًا عند الرد على منشوري</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">أرسل لي بريدًا عند ذكر اسمي</label>
                      </div>
                    </li>
                  </ul>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">التطبيق</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault3">
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">الإطلاقات والمشاريع الجديدة</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">تحديثات المنتج الشهرية</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input me-auto" type="checkbox" id="flexSwitchCheckDefault5">
                        <label class="form-check-label text-body me-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">الاشتراك في النشرة البريدية</label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">معلومات الملف الشخصي</h6>
                    </div>
                    <div class="col-md-4 text-start">
                      <a href="javascript:;" id="edit-profile">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل الملف"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    مرحبًا، أنا أليك تومسون، القرارات: إذا لم تستطع اتخاذ قرار، فالجواب هو لا. إذا كان هناك مساران متساويان في الصعوبة، اختر الأكثر ألمًا على المدى القصير (تجنب الألم يخلق وهم المساواة).
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 pe-0 pt-0 text-sm"><strong class="text-dark">الاسم الكامل:</strong> &nbsp; أليك م. تومسون</li>
                    <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark">الجوال:</strong> &nbsp; (44) 123 1234 123</li>
                    <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark">البريد الإلكتروني:</strong> &nbsp; alecthompson@mail.com</li>
                    <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark">الموقع:</strong> &nbsp; الولايات المتحدة</li>
                    <li class="list-group-item border-0 pe-0 pb-0">
                      <strong class="text-dark text-sm">التواصل الاجتماعي:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 pe-1 ps-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 pe-1 ps-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 pe-1 ps-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">المحادثات</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="صوفي" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">صوفي ب.</h6>
                        <p class="mb-0 text-xs">مرحبًا! أحتاج إلى مزيد من المعلومات..</p>
                      </div>
                      <a class="btn btn-link ps-3 pe-0 mb-0 me-auto w-25 w-md-auto" href="javascript:;">رد</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/marie.jpg" alt="آن ماري" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">آن ماري</h6>
                        <p class="mb-0 text-xs">عمل رائع، هل يمكنك..</p>
                      </div>
                      <a class="btn btn-link ps-3 pe-0 mb-0 me-auto w-25 w-md-auto" href="javascript:;">رد</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/ivana-square.jpg" alt="إيفانا" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">إيفانا</h6>
                        <p class="mb-0 text-xs">بخصوص الملفات يمكنني..</p>
                      </div>
                      <a class="btn btn-link ps-3 pe-0 mb-0 me-auto w-25 w-md-auto" href="javascript:;">رد</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-4.jpg" alt="بيترسون" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">بيترسون</h6>
                        <p class="mb-0 text-xs">أتمنى لك ظهيرة سعيدة..</p>
                      </div>
                      <a class="btn btn-link ps-3 pe-0 mb-0 me-auto w-25 w-md-auto" href="javascript:;">رد</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-3.jpg" alt="نيك دانيال" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">نيك دانيال</h6>
                        <p class="mb-0 text-xs">مرحبًا! أحتاج إلى مزيد من المعلومات..</p>
                      </div>
                      <a class="btn btn-link ps-3 pe-0 mb-0 me-auto w-25 w-md-auto" href="javascript:;">رد</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
              <i class="material-symbols-rounded text-6xl text-secondary">email</i>
              <h4 class="mt-3">قسم الرسائل</h4>
              <p class="text-muted">هنا يمكنك عرض وإدارة جميع رسائلك</p>
            </div>
          </div>
        </div>
        
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
              <i class="material-symbols-rounded text-6xl text-secondary">settings</i>
              <h4 class="mt-3">الإعدادات المتقدمة</h4>
              <p class="text-muted">هنا يمكنك تعديل إعدادات حسابك وتفضيلاتك</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-12">
          <div class="mb-5 pe-3">
            <h6 class="mb-1">المشاريع</h6>
            <p class="text-sm">المهندسون المعماريون يصممون المنازل</p>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-header p-0 m-2">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../assets/img/home-decor-1.jpg" alt="صورة المشروع" class="img-fluid shadow border-radius-lg">
                  </a>
                </div>
                <div class="card-body p-3">
                  <p class="mb-0 text-sm">المشروع #2</p>
                  <a href="javascript:;">
                    <h5>
                      مودرن
                    </h5>
                  </a>
                  <p class="mb-4 text-sm">
                    بينما تعمل أوبر على كمية كبيرة من الاضطرابات الإدارية الداخلية.
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">عرض المشروع</button>
                    <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="إيلينا موريسون">
                        <img alt="صورة" src="../assets/img/team-1.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ريان ميلي">
                        <img alt="صورة" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نيك دانيال">
                        <img alt="صورة" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="بيترسون">
                        <img alt="صورة" src="../assets/img/team-4.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-header p-0 m-2">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../assets/img/home-decor-2.jpg" alt="صورة المشروع" class="img-fluid shadow border-radius-lg">
                  </a>
                </div>
                <div class="card-body p-3">
                  <p class="mb-0 text-sm">المشروع #1</p>
                  <a href="javascript:;">
                    <h5>
                      إسكندنافي
                    </h5>
                  </a>
                  <p class="mb-4 text-sm">
                    الموسيقى شيء لكل شخص رأيه الخاص المحدد عنها.
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">عرض المشروع</button>
                    <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نيك دانيال">
                        <img alt="صورة" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="بيترسون">
                        <img alt="صورة" src="../assets/img/team-4.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="إيلينا موريسون">
                        <img alt="صورة" src="../assets/img/team-1.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ريان ميلي">
                        <img alt="صورة" src="../assets/img/team-2.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-header p-0 m-2">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="../assets/img/home-decor-3.jpg" alt="صورة المشروع" class="img-fluid shadow border-radius-lg">
                  </a>
                </div>
                <div class="card-body p-3">
                  <p class="mb-0 text-sm">المشروع #3</p>
                  <a href="javascript:;">
                    <h5>
                      مينيماليست
                    </h5>
                  </a>
                  <p class="mb-4 text-sm">
                    لدى الأشخاص المختلفين أذواق مختلفة، وأنواع مختلفة من الموسيقى. الموسيقى هي الحياة.
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">عرض المشروع</button>
                    <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="بيترسون">
                        <img alt="صورة" src="../assets/img/team-4.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نيك دانيال">
                        <img alt="صورة" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ريان ميلي">
                        <img alt="صورة" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="إيلينا موريسون">
                        <img alt="صورة" src="../assets/img/team-1.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="card-header p-0 m-2">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="صورة المشروع" class="img-fluid shadow border-radius-lg">
                  </a>
                </div>
                <div class="card-body p-3">
                  <p class="mb-0 text-sm">المشروع #4</p>
                  <a href="javascript:;">
                    <h5>
                      قوطي
                    </h5>
                  </a>
                  <p class="mb-4 text-sm">
                    لماذا يختار أي شخص اللون الأزرق على الوردي؟ الوردي بوضوح لون أفضل.
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">عرض المشروع</button>
                    <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="بيترسون">
                        <img alt="صورة" src="../assets/img/team-4.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نيك دانيال">
                        <img alt="صورة" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ريان ميلي">
                        <img alt="صورة" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="إيلينا موريسون">
                        <img alt="صورة" src="../assets/img/team-1.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
</body>
</html> 