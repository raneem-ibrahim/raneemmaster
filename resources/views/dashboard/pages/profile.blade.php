{{-- start top --}}
@include('dashboard.include.top')
{{-- end top  --}}


{{-- start sidebar --}}
@include('dashboard.include.sidebar')
{{-- end sidbare --}}
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
  <!-- start Navbar -->
  @include('dashboard.include.nav')

  <!-- End Navbar -->
  <div class="container-fluid py-2  cards">



{{-- 
    <div class="row">
      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4 ">
        <div class="card ">
          <div class="card-header d-flex justify-content-between p-3 pt-2 card1 ">
            <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg "  >
              <i class="material-symbols-rounded opacity-10 ">weekend</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">أموال اليوم</p>
              <h4 class="mb-0">$53k</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0 ">
          <div class="card-footer p-3 card1">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+55% </span>من الأسبوع الماضي</p>
          </div>
        </div>

      </div>


      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4 ">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
            <div class="icon icon-md icon-shape custom-bg  shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">leaderboard</i>
            </div>
            <div class="text-start pt-1 ">
              <p class="text-sm mb-0 text-capitalize">مستخدمو اليوم</p>
              <h4 class="mb-0">2,300</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 card1">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+33% </span>من الأسبوع الماضي</p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">

        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
            <div class="icon icon-md icon-shape custom-bg  shadow-dark text-center border-radius-lg ">
              <i class="material-symbols-rounded opacity-10">store</i>
            </div>
            <div class="text-start pt-1 ">
              <p class="text-sm mb-0 text-capitalize">عملاء جدد</p>
              <h4 class="mb-0">
                <span class="text-danger text-sm font-weight-bolder ms-1 ">-2%</span>
                +3,462
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 card1">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+5% </span>من الشهر الماضي</p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
            <div class="icon icon-md icon-shape custom-bg  shadow-dark text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">weekend</i>
            </div>
            <div class="text-start pt-1">
              <p class="text-sm mb-0 text-capitalize">مبيعات</p>
              <h4 class="mb-0">$103,430</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 card1">
            <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+7% </span>مقارنة بيوم أمس</p>
          </div>
        </div>
      </div>


    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-6 mt-4 mb-4 ">
        <div class="card card1">
          <div class="card-body">
            <h6 class="mb-0 ">مشاهدات الموقع</h6>
            <p class="text-sm ">آخر أداء للحملة</p>
            <div class="pe-2">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-symbols-rounded text-sm my-auto ms-1">schedule</i>
              <p class="mb-0 text-sm">لحملة أرسلت قبل يومين </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card card1">
          <div class="card-body">
            <h6 class="mb-0 ">المبيعات اليومية</h6>
            <p class="text-sm ">(<span class="font-weight-bolder text-success">+15%</span>) زيادة في مبيعات اليوم</p>
            <div class="pe-2">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-symbols-rounded text-sm my-auto ms-1">schedule</i>
              <p class="mb-0 text-sm">لحملة أرسلت قبل يومين </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mb-3">
        <div class="card card1">
          <div class="card-body">
            <h6 class="mb-0 ">المهام المكتملة</h6>
            <p class="text-sm ">آخر أداء للحملة</p>
            <div class="pe-2">
              <div class="chart">
                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-symbols-rounded text-sm my-auto ms-1">schedule</i>
              <p class="mb-0 text-sm">تم تحديثه للتو</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row my-4">


      <div class="col-lg-8 col-md-6 mb-md-0 mb-4 ">
        <div class="card ">
          <div class="card-header pb-0 card1">
            <div class="row mb-3">
              <div class="col-6">
                <h6>المشاريع</h6>
                <p class="text-sm">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">30 انتهى</span> هذا الشهر
                </p>
              </div>
              <div class="col-6 my-auto text-start">
                <div class="dropdown float-start ps-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">عمل</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">عمل آخر</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">شيء آخر هنا</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-0 pb-2 card1 ">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المشروع</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">أعضاء</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ميزانية</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إكمال</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">Material XD الإصدار</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> $14,000 </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">60%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> $3,000 </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">10%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> غير مضبوط </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">100%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> $20,500 </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">100%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> $500 </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">25%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm ms-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> $2,000 </span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">40%</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card h-100">

          <div class="card-header pb-0 card1">
            <h6>نظرة عامة على الطلبات</h6>
            <p class="text-sm">
              <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
              <span class="font-weight-bold">24%</span> هذا الشهر
            </p>
          </div>


          <div class="card-body p-3 card1">
            <div class="timeline timeline-one-side ">
              <div class="timeline-block mb-3 ">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-success text-gradient">notifications</i>
                </span>
                <div class="timeline-content ">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, تغييرات في التصميم</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                </div>
              </div>

              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-danger text-gradient">code</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">طلب جديد #1832412</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                </div>
              </div>

              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-info text-gradient">shopping_cart</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">مدفوعات الخادم لشهر أبريل</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                </div>
              </div>
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-warning text-gradient">credit_card</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">تمت إضافة بطاقة جديدة للطلب #4395133</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                </div>
              </div>
              <div class="timeline-block mb-3">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-primary text-gradient">key</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">فتح الحزم من أجل التطوير</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                </div>
              </div>
              <div class="timeline-block">
                <span class="timeline-step">
                  <i class="material-symbols-rounded text-dark text-gradient">payments</i>
                </span>
                <div class="timeline-content">
                  <h6 class="text-dark text-sm font-weight-bold mb-0">طلب جديد #9583120</h6>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <body class="g-sidenav-show bg-gray-100">
        <div class="container-fluid px-2 px-md-4">
            {{-- هاي صور  الخلفية --}}
          <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image:  url('/image/Is-Memorizing-the-Quran-Mandatory-4.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
          </div>
          {{-- صورة الخلفية --}}
          <div class="card card-body mx-2 mx-md-2 mt-n6">
            {{-- هاي للصورة الشخصية مع كبسات تنقل الصفحات  --}}
            <div class="row gx-4 mb-2">



            {{-- هاي لصورة البروفايل  --}}

            {{-- <div class="avatar avatar-xl position-relative">
                  <img src="../assets/img/bruce-mars.jpg" alt="صورة الملف الشخصي" class="w-100 border-radius-lg shadow-sm">
                </div> --}}
              <div class="col-auto">
              
                <div class="Image-profile-container">
              
                  <div class="avatar-upload">
                      <div class="avatar-edit">
                          <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                          <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                          <div id="imagePreview" style="background-image: url('/image/profile.jpg');">
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              {{-- نهاية لصورة البروفايل  --}}

              
       
          
            








            
              <div class="col-auto my-auto">
                <div class="h-100">
                  <h5 class="mb-1">
                    {{ $user->first_name }} {{ $user->last_name }}
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
            {{-- للصورة الشخصية  --}}


            {{-- هون الي فيها اعدادات المنصة ومعلومات الملف الشخصي  والمحادثات --}}
            
            <div class="tab-content">
              <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
                <div class="row">
                  {{-- <div class="col-12 col-xl-4">
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
                  </div> --}}
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
                          <li class="list-group-item border-0 pe-0 pt-0 text-sm"><strong class="text-dark">الاسم الكامل:</strong> &nbsp;  {{ $user->first_name }} {{ $user->last_name }}</li>
                          <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark">البريد الاكتروني:</strong> &nbsp;  {{ $user->email }}</li>
                          <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark"> الكلمة السرية:</strong> &nbsp;{{ $user->password }} </li>
                          <li class="list-group-item border-0 pe-0 text-sm"><strong class="text-dark">المسار التدريسي:</strong> &nbsp;{{ $user->desired_study }} </li>
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
            {{-- لهون الاعمدة تبعت اعدادات المنصة  --}}



            {{-- هون قسم المشاريع  --}}
            
            {{-- <div class="row mt-4">
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
            </div> --}}
            {{-- لهون المشاريع  --}}
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


          //profile image read
          function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});





        </script>
     
        
            
      </body>


    {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
  </div>
</main>
{{-- start هاي تبعت السيتنج اذا بدي اياها  --}}

{{-- <div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="material-symbols-rounded py-2">settings</i>
  </a>
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3">
      <div class="float-end">
        <h5 class="mt-3 mb-0">Material UI Configurator</h5>
        <p>See our dashboard options.</p>
      </div>
      <div class="float-start mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
          <i class="material-symbols-rounded">clear</i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-end">
          <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-dark active" data-color="dark" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between different sidenav types.</p>
      </div>
      <div class="d-flex">
        <button class="btn bg-gradient-dark px-3 mb-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
        <button class="btn bg-gradient-dark px-3 mb-2  active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
      </div>
      <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="mt-3 d-flex">
        <h6 class="mb-0">Navbar Fixed</h6>
        <div class="form-check form-switch me-auto my-auto">
          <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
      </div>
      <hr class="horizontal dark my-3">
      <div class="mt-2 d-flex">
        <h6 class="mb-0">Light / Dark</h6>
        <div class="form-check form-switch me-auto my-auto">
          <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
      </div>
      <hr class="horizontal dark my-sm-4">
      <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
      <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
      <div class="w-100 text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a>
      </div>
    </div>
  </div>
</div> --}}

{{-- end  --}}


{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}