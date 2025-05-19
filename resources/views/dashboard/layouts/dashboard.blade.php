@extends('dashboard.dash')

@section('content')




<div class="row">
    @auth
        @if(auth()->user()->role === 'admin')
            {{-- هاي بداية الكاردات اول السطر --}}
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                        <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">groups</i>
                        </div>
                        <div class="text-start pt-1">
                            <p class="text-sm mb-0 text-capitalize">عدد الطلاب</p>
                            <h4 class="mb-0">{{ $studentsCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 card1">
                        <p class="mb-0 text-start">إجمالي الطلاب المسجلين في النظام</p>
                    </div>
                </div>
            </div>

            {{-- كرت عدد المعلمين --}}
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                        <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">school</i>
                        </div>
                        <div class="text-start pt-1">
                            <p class="text-sm mb-0 text-capitalize">عدد المعلمين</p>
                            <h4 class="mb-0">{{ $teachersCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 card1">
                        <p class="mb-0 text-start">إجمالي المعلمين المسجلين</p>
                    </div>
                </div>
            </div>

            {{-- كرت عدد الدورات --}}
            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                        <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">menu_book</i>
                        </div>
                        <div class="text-start pt-1">
                            <p class="text-sm mb-0 text-capitalize">عدد الدورات</p>
                            <h4 class="mb-0">{{ $coursesCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 card1">
                        <p class="mb-0 text-start">الدورات التعليمية المضافة</p>
                    </div>
                </div>
            </div>

            {{-- كرت عدد البرامج الأسبوعية --}}
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                        <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">calendar_month</i>
                        </div>
                        <div class="text-start pt-1">
                            <p class="text-sm mb-0 text-capitalize">البرامج الأسبوعية</p>
                            <h4 class="mb-0">{{ $weeklyProgramsCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 card1">
                        <p class="mb-0 text-start">عدد برامج الحفظ والمراجعة</p>
                    </div>
                </div>
            </div>
            @elseif (auth()->user()->role === 'teacher')
      <div class="row">
    <!-- كرت عدد الدورات -->
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                    <i class="material-symbols-rounded opacity-10">book</i>
                </div>
                <div class="text-start pt-1">
                    <p class="text-sm mb-0 text-capitalize">عدد الدورات</p>
                    <h4 class="mb-0">{{ $courseCount }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 card1">
                <p class="mb-0 text-start">الدورات التي تدرسها حالياً</p>
            </div>
        </div>
    </div>

    <!-- كرت عدد الطلاب -->
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                    <i class="material-symbols-rounded opacity-10">group</i>
                </div>
                <div class="text-start pt-1">
                    <p class="text-sm mb-0 text-capitalize">عدد الطلاب</p>
                    <h4 class="mb-0">{{ $studentCount }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 card1">
                <p class="mb-0 text-start">الطلاب المسجلين معك</p>
            </div>
        </div>
    </div>

    <!-- كرت عدد البرامج الأسبوعية -->
    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                    <i class="material-symbols-rounded opacity-10">calendar_month</i>
                </div>
                <div class="text-start pt-1">
                    <p class="text-sm mb-0 text-capitalize">البرامج الأسبوعية</p>
                    <h4 class="mb-0">{{ $weeklyProgramCount }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 card1">
                <p class="mb-0 text-start">البرامج التي أنشأتها</p>
            </div>
        </div>
    </div>

    <!-- كرت عدد الدروس -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between p-3 pt-2 card1">
                <div class="icon icon-md icon-shape custom-bg shadow-dark text-center border-radius-lg">
                    <i class="material-symbols-rounded opacity-10">video_library</i>
                </div>
                <div class="text-start pt-1">
                    <p class="text-sm mb-0 text-capitalize">عدد الدروس</p>
                    <h4 class="mb-0">{{ $lessonCount }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 card1">
                <p class="mb-0 text-start">الدروس التي أنشأتها</p>
            </div>
        </div>
    </div>
</div>
        @endif
    @endauth
</div>

    
     


{{-- نهاية الكاردات --}}

    </div>

    {{-- الشارت الي موجود بالداش بورد  --}}
    <div class="row mt-4">
         @auth
        @if(auth()->user()->role === 'admin')
            <div class="col-lg-4 col-md-6 mt-4 mb-4 ">
                <div class="card card1">
                    <div class="card-body">
                        <h6 class="mb-0 ">عمليات تسجيل الدخول</h6>
              
                        <div class="pe-2">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-symbols-rounded text-sm my-auto ms-1">schedule</i>
                            <p class="mb-0 text-sm">   تسجيل الدخول </p>
                        </div>
                    </div>
                </div>
            </div>
             @endif
             @endauth
        {{-- <div class="col-lg-8 col-md-6 mb-md-0 mb-4 ">
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
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4"
                                    aria-labelledby="dropdownTable">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المشروع
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        أعضاء</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ميزانية</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        إكمال</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-xd.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD الإصدار</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-atlassian.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-10" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-slack.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-jira.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
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
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-40" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
          @auth
        @if(auth()->user()->role === 'admin')
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 card1">
            <div class="row mb-3">
                <div class="col-6">
                    <h6>المعلمين</h6>
                    <p class="text-sm">
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                        {{-- <span class="font-weight-bold ms-1">30 درس</span> هذا الشهر --}}
                    </p>
                </div>
                <div class="col-6 my-auto text-start">
                    <div class="dropdown float-start ps-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- <i class="fa fa-ellipsis-v text-secondary"></i> --}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4" aria-labelledby="dropdownTable">
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">تصدير البيانات</a></li>
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">إرسال إشعار</a></li>
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">عرض الكل</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0 pb-2 card1">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المعلم</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                الطلاب</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                الدورات</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                الإنجاز</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                      <img src="{{ asset('storage/' . $teacher->image) }}" 
     class="avatar avatar-sm ms-3" 
     onerror="this.src='{{ asset('assets/img/default-avatar.png') }}'">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $teacher->first_name }} {{ $teacher->last_name }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $teacher->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group mt-2">
                                    @foreach($teacher->students->take(4) as $student)
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom" 
                                       title="{{ $student->first_name }}">
                                 <img src="{{ $student->image ? Storage::url($student->image) : asset('assets/img/default-avatar.png') }}">                                    </a>
                                    @endforeach
                                    @if($teacher->students->count() > 4)
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle bg-secondary"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom" 
                                       title="+{{ $teacher->students->count() - 4 }} طلاب">
                                        <span class="text-white text-xs">+{{ $teacher->students->count() - 4 }}</span>
                                    </a>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold">{{ $teacher->lessons->count() }} دورة</span>
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">{{ $teacher->completion_rate }}%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        @php
                                            $progressClass = $teacher->completion_rate >= 80 ? 'bg-gradient-success' : 
                                                           ($teacher->completion_rate >= 50 ? 'bg-gradient-info' : 'bg-gradient-warning');
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }} w-{{ $teacher->completion_rate }}" 
                                             role="progressbar" aria-valuenow="{{ $teacher->completion_rate }}" 
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
           @endif
             @endauth

 @auth
        @if(auth()->user()->role === 'teacher')
             <div class="col-lg-4 col-md-6 mt-4 mb-4">
    <div class="card card1">
        <div class="card-body">
            <h6 class="mb-0">نشاط الطلاب</h6>
            <p class="text-sm">آخر أداء للطلاب</p>
            <div class="pe-2">
                <div class="chart">
                    <canvas id="student-activity-chart" class="chart-canvas" height="170"></canvas>
                </div>
            </div>
            <hr class="dark horizontal">
            <div class="d-flex">
                <i class="material-symbols-rounded text-sm my-auto ms-1">schedule</i>
                <p class="mb-0 text-sm"> نشاط الطلاب خلال الأسبوع</p>
            </div>
        </div>
    </div>
             </div>

             <script>
document.addEventListener('DOMContentLoaded', function() {
    // الحصول على عنصر الشارت
    var ctx = document.getElementById('student-activity-chart').getContext('2d');
    
    // استخدام البيانات المرسلة من الكنترولر
    var chartData = @json($studentActivityData);
    
    // إنشاء الشارت مرة واحدة فقط
    var studentActivityChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'مشاهدات الدروس',
                data: chartData.lesson_views,
                backgroundColor: '#c37044',
                borderRadius: 4,
                borderSkipped: false,
            }, {
                label: 'إنجاز الحفظ',
                data: chartData.memorization_achievements,
                backgroundColor: 'black',
                borderRadius: 4,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                    },
                    ticks: {
                        callback: function(value) {
                            return value;
                        }
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        display: true,
                    },
                },
            },
        }
    });
});
            </script>


         {{-- <div class="col-lg-8 col-md-6 mb-md-0 mb-4 ">
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
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4"
                                    aria-labelledby="dropdownTable">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المشروع
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        أعضاء</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ميزانية</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        إكمال</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-xd.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD الإصدار</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-atlassian.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-10" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-slack.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-jira.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
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
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-40" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  --}}
<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 card1">
            <div class="row mb-3">
                <div class="col-6">
                    <h6>الطلاب المتأخرين</h6>
                    <p class="text-sm">
                        <i class="fa fa-exclamation-triangle text-warning" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">طلاب بحاجة لمتابعة</span>
                    </p>
                </div>
                <div class="col-6 my-auto text-start">
                    <div class="dropdown float-start ps-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- <i class="fa fa-ellipsis-v text-secondary"></i> --}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4" aria-labelledby="dropdownTable">
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">إرسال تنبيه</a></li>
                            <li><a class="dropdown-item border-radius-md" href="javascript:;">عرض الكل</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0 pb-2 card1">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الطالب</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                الحفظ</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                مشاهدة الدروس</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                الإنجاز</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($incompleteStudents as $student)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ $student->image ? asset('storage/' . $student->image) : asset('assets/img/default-avatar.png') }}" 
                                             class="avatar avatar-sm ms-3"
                                             onerror="this.src='{{ asset('assets/img/default-avatar.png') }}'">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $student->first_name }} {{ $student->last_name }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group mt-2">
                                    @if($student->memorization_incomplete)
                                    <span class="badge badge-sm bg-gradient-danger">غير مكتمل</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-success">مكتمل</span>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if($student->lessons_incomplete)
                                <span class="badge badge-sm bg-gradient-danger">غير مكتمل</span>
                                @else
                                <span class="badge badge-sm bg-gradient-success">مكتمل</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            @php
                                                $completionRate = 0;
                                                if(!$student->memorization_incomplete) $completionRate += 50;
                                                if(!$student->lessons_incomplete) $completionRate += 50;
                                            @endphp
                                            <span class="text-xs font-weight-bold">{{ $completionRate }}%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        @php
                                            $progressClass = $completionRate >= 80 ? 'bg-gradient-success' : 
                                                           ($completionRate >= 50 ? 'bg-gradient-info' : 'bg-gradient-warning');
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }}" 
                                             style="width: {{ $completionRate }}%"
                                             role="progressbar" aria-valuenow="{{ $completionRate }}" 
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">لا يوجد طلاب متأخرين</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  <br><br><br><br>
           @endif
             @endauth
    </div>
   
    {{-- نهاية الشارت  --}}



    {{-- بداية  اخر سطر  --}}

    {{-- <div class="row my-4">


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
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-n4"
                                    aria-labelledby="dropdownTable">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المشروع
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        أعضاء</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ميزانية</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        إكمال</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-xd.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD الإصدار</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-atlassian.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-10" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-slack.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-jira.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
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
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg"
                                                    class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
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
                                                <div class="progress-bar bg-gradient-info w-40" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
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
                                <h6 class="text-dark text-sm font-weight-bold mb-0">تمت إضافة بطاقة جديدة للطلب #4395133
                                </h6>
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
    {{-- نهاية اخر سطر --}}

    {{-- end content main --}}
{{-- هاي سيكربت لحساب عدد عمليات تسجيل الدخول موجود بالداش بورد للأدمن بداية --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if(isset($data))
<script>
    const ctx = document.getElementById('chart-bars').getContext('2d');

    // بيانات من السيرفر
    const loginData = @json($data);

    const labels = loginData.map(item => item.date);
    const counts = loginData.map(item => item.count);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد تسجيلات الدخول اليومية',
                data: counts,
                backgroundColor: '#c37044',
                borderRadius: 5,
                maxBarThickness: 40,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    });
</script>
@endif
   {{-- هاي سيكربت لحساب عدد عمليات تسجيل الدخول موجود بالداش بورد للأدمن نهاية --}}
@endsection
