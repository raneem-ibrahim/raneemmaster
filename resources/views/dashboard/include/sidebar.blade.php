<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-end me-2 rotate-caret bg-white my-2 back_side" id="sidenav-main ">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      {{-- <img src=".{{asset('image/logo-removebg-preview.png')}}" class="navbar-brand-img" width="50" height="50" alt="main_logo"> --}}
      <span class="me-1 text-sm text-dark" style="color:#c37044 !important; font-size:xx-large !important;">ترتيل</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse px-0 w-auto back_side2 " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        @auth
      @if (auth()->user()->role === 'teacher')
          <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('dashboard.dash')}}">
          <i class="material-symbols-rounded opacity-10">dashboard</i>
          <span class="nav-link-text me-1">لوحة القيادة</span>
        </a>
      </li>
       @endif
@endauth
     @auth
      @if (auth()->user()->role === 'admin')
        <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('admin.dashboard')}}">
          <i class="material-symbols-rounded opacity-10">dashboard</i>
          <span class="nav-link-text me-1">لوحة القيادة</span>
        </a>
      </li>
        @endif
@endauth
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('viewstudent') }}">
            <i class="material-symbols-rounded opacity-10">group</i>
            <span class="nav-link-text me-1">إنشاء جداول للطلاب</span>
        </a>
    </li>
     @auth
      @if (auth()->user()->role === 'teacher')
    <li class="nav-item">
    <a class="nav-link text-dark" href="{{route('students.index')}}">
        <i class="material-symbols-rounded opacity-10">add</i>
        <span class="nav-link-text me-1">إضافة طالب</span>
    </a>
</li>
   @endif
@endauth
 <li class="nav-item">
    <a class="nav-link text-dark" href="{{route('teacher.programs.hifz')}}">
        <i class="material-symbols-rounded opacity-10">event_note</i>
        <span class="nav-link-text me-1">جداول الحفظ</span>
    </a>
</li>
 <li class="nav-item">
    <a class="nav-link text-dark" href="{{route('teacher.review.programs')}}">
      <i class="material-symbols-rounded opacity-10">history_edu</i>
        <span class="nav-link-text me-1">جداول المراجعة </span>
    </a>
</li>
    </li>
    @auth
    @if(auth()->user()->role === 'admin')
    <li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" href="#" id="teachersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-symbols-rounded opacity-10">groups</i>
            <span class="nav-link-text me-1">معلمين</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="teachersDropdown">
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
        </ul>
    </li>
    @endif
@endauth
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-dark" href="javascript:;" id="coursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="material-symbols-rounded opacity-10">library_add</i>
        <span class="nav-link-text me-1">إدارة الدورات</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="coursesDropdown">
      <li>
    @auth
        @if(auth()->user()->role === 'admin') <!-- أو أي شرط آخر -->
            <a class="dropdown-item" href="{{ url('createcourse') }}">
                <i class="material-symbols-rounded opacity-10">add</i>
                <span class="me-2">إنشاء دورة</span>
            </a>
        @endif
    @endauth
</li>
        <li>
            <a class="dropdown-item" href="{{route('courses.index')}}">
                <i class="material-symbols-rounded opacity-10">video_library</i>
                <span class="me-2">  الدورات</span>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
       
    </ul>
</li>
     
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-dark" href="javascript:;" id="lessonsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="material-symbols-rounded opacity-10">menu_book</i>
      <span class="nav-link-text me-1">إدارة الدروس</span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="lessonsDropdown">
      <!-- إضافة درس جديد -->
      <li>
          <a class="dropdown-item" href="{{route('lessons.create')}}">
              <i class="material-symbols-rounded opacity-10 me-2">add_circle</i>
              <span>إضافة درس جديد</span>
          </a>
      </li>
      
      <!-- عرض جميع الدروس -->
      <li>
          <a class="dropdown-item" href="{{route('teacher.lessons')}}">
              <i class="material-symbols-rounded opacity-10 me-2">list_alt</i>
              <span>عرض جميع الدروس</span>
          </a>
      </li>
      
   
      
     
  </ul>
</li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('profile')}}">
          <i class="material-symbols-rounded opacity-10">person</i>
          <span class="nav-link-text me-1"> الملف الشخصي</span>
        </a>
      </li>
    
    </ul>
  </div>
 <div class="sidenav-footer position-absolute w-100 bottom-0">
    <div class="mx-3">
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-dark mt-4 w-100" type="button">
                <i class="material-symbols-rounded opacity-10">logout</i>
                تسجيل الخروج
            </button>
        </form>
        @else
        <a class="btn btn-outline-dark mt-4 w-100" href="{{ route('login') }}" type="button">
            <i class="material-symbols-rounded opacity-10">login</i>
            تسجيل الدخول
        </a>
        @endauth
        
        {{-- <a class="btn bg-gradient-dark w-100" href="../pages/sign-up.html" type="button">
            <i class="material-symbols-rounded opacity-10">share</i>
            شارك
        </a> --}}
    </div>
</div>
</aside>



