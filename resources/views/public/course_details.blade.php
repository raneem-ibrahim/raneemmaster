<!DOCTYPE html>
<html lang="en">
 {{-- dir="rtl"> --}}
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقعنا</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <!-- Amiri Quranic Font -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
   
<!-- Bootstrap RTL CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    {{-- start slider --}}
   <!-- استدعاء الخط من Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">

<!-- استدعاء ملفات Owl Carousel من المجلد الجديد -->
<link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.min.css') }}">

<!-- استدعاء مكتبة الأيقونات Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

<!-- استدعاء ملف الـ Style.css من المجلد الجديد -->
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    {{-- end slider --}}
  </head>
  <body class="page-other">
    <header>
      <nav class="navbar">
        <div> 
          <img src="{{asset('image/Brown_Retro_Book_Store_Logo-removebg-preview.png')}}" width="100px" height="100px">
        </div>
        <ul class="menu-links">
          <span id="close-menu-btn" class="material-symbols-outlined">close</span>
       
          <li><a href="{{url('/')}}"> الرئيسية</a></li>
          <li><a href="{{url('aboutus')}}">من نحن </a></li>
          <li><a href="{{url('contact')}}">اتصل بنا </a></li>
          <li><a href="{{url('bloge')}}"> الدورات </a></li>
          <li>
                 <div class="settings-container">
    @guest
        {{-- زر تسجيل الدخول للزوار --}}
        <a href="{{ url('login') }}" class="setting-item">
            <i class="fa-solid fa-arrow-right-to-bracket text-white"></i>
            <span class="setting-text">تسجيل الدخول</span>
        </a>
    @endguest
    
    @auth
        {{-- زر الملف الشخصي للمستخدمين --}}
        <a href="{{ url('student') }}" class="setting-item">
            <i class="fa-regular fa-user text-white"></i>
            <span class="setting-text">الملف الشخصي</span>
        </a>
        
        {{-- زر تسجيل الخروج --}}
        <form method="POST" action="{{ route('logout') }}" class="d-inline setting-item-form">
            @csrf
            <button type="submit" class="setting-item">
                <i class="fa-solid fa-right-from-bracket text-white"></i>
                <span class="setting-text">تسجيل خروج</span>
            </button>
        </form>
    @endauth
</div>
<style>
    .settings-container {
        display: flex;
        gap: 20px;
        align-items: center;
        direction: rtl;
    }
    
    .setting-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
       
        /* text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease; */
        /* padding: 5px 10px;
        border-radius: 4px; */
    }
    
   
    
    .setting-text {
         font-family: "Marhey", sans-serif !important;
    }
    
    .setting-item-form {
        margin: 0;
        padding: 0;
    }
    
    .setting-item-form button {
        background: none;
        border: none;
        cursor: pointer;
    }
</style>
          </li>
        </ul>
        <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
      </nav>
    </header>
    <section class="hero-section">
        <div class="quran-verse">
          <p class="verse-text">الدورات </p>
        </div>
      </section>


      <div class="course-details-container" dir="rtl">
        <div class="course-details-content">
            <div class="course-image">
                <img  src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
            </div>
            <div class="course-info">
                <h2>{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <p>عدد المستويات: {{ $course->levels->count() }}</p>
                <a href="{{ route('register') }}" class="btn btn-custom mt-3">سجل الآن</a>
            </div>
        </div>
    </div>
    
    <style>
    .course-details-container {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .course-details-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        align-items: flex-start;
        direction: rtl;
    }
    
    .course-image img {
        max-width: 400px;
        width: 100%;
        width: 300px;
        height: 300px;
        border-radius: 12px;
        object-fit: cover;
    }
    
    .course-info {
        flex: 1;
        text-align: right;
    }
    
    .course-info h2 {
        font-size: 2rem;
        color: #c37044;
        margin-bottom: 20px;
    }
    
    .course-info p {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 15px;
    }
    
    .btn-custom {
        background-color: #c37044;
        color: white;
        font-weight: bold;
        border-radius: 1rem;
        padding: 10px 20px;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
    }
    
    .btn-custom:hover {
        background-color: #a4552f;
    }
    </style>
<div class="course-tabs-container mt-5" dir="rtl">

  <!-- أزرار التبويب -->
  <div class="mb-3 border-bottom">
    <div class="d-flex">
      <ul class="nav nav-pills" id="courseTab" role="tablist">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="syllabus-tab" data-bs-toggle="pill" data-bs-target="#syllabus" type="button" role="tab">
                  المنهاج
              </button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="teachers-tab" data-bs-toggle="pill" data-bs-target="#teachers" type="button" role="tab">
                  الهيئة التدريسية
              </button>
          </li>
      </ul>
    </div>
  </div>

  <!-- محتوى التبويبات -->
  <div class="tab-content bg-white p-4 rounded shadow-sm" id="courseTabContent" style="text-align: right;">
    
    <!-- تبويب المنهاج -->
    <div class="tab-pane fade show active" id="syllabus" role="tabpanel">
        <div class="mb-4">
            <h5 class="text-c37044" style="font-family: 'Marhey', sans-serif;">تفاصيل الدورة</h5>
            <p>{!! nl2br(e($course->details)) !!}</p>
        </div>

        @forelse($course->levels as $level)
            <div class="mb-4">
                <h5 class="text-c37044">المستوى{{$level->level_number}}: {{ $level->title }}</h5>
                <ul>
                    @forelse($level->lessons as $lesson)
                        <li>{{ $lesson->title }}</li>
                    @empty
                        <li>لا توجد دروس حالياً في هذا المستوى.</li>
                    @endforelse
                </ul>
            </div>
        @empty
            <p>لا توجد مستويات حالياً.</p>
        @endforelse
    </div>

    <!-- تبويب المعلمين -->
    <div class="tab-pane fade" id="teachers" role="tabpanel">
        <div class="row text-center">
            @forelse($course->teachers as $teacher)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                  <img src="{{ asset('storage/' . $teacher->image) }}" class="rounded-circle mb-2" style="width: 140px; height: 140px; object-fit: cover;">
                  <h6>{{ $teacher->first_name }} {{ $teacher->last_name }}</h6>
                </div>
            @empty
                <p>لم يتم إضافة معلمين بعد.</p>
            @endforelse
        </div>
    </div>

  </div>
</div>



<style>
  .nav-pills {
    direction: rtl;
    justify-content: flex-start !important;
}

  .nav-pills .nav-link {
    border-radius: 0;
    border-bottom: 3px solid transparent;
    color: #000;
    font-weight: bold;
}

.nav-pills .nav-link.active {
    border-color: #c37044;
    background-color: transparent;
    color: #c37044;
}

.course-tabs-container .nav-link {
    background-color: #f2f2f2;
    color: #333;
    margin: 0 5px;
    border-radius: 0.5rem;
}

.course-tabs-container .nav-link.active {
    background-color: #c37044;
    color: white;
    font-weight: bold;
}

.text-c37044 {
    color: #c37044;
}
</style>
<br><br><br><br><br>
    



<footer>
    <div class="footer-divider">
        <span class="footer-logo"><img src="{{asset('image/لوجو.png')}}" alt="شعار ترتيل" height="40"></span>
    </div>
    
    <div class="footer-content">
        <div class="footer-title-icons">
            <h2 class="footer-title">
                <img src="{{asset('image/namelogo.png')}}" width="120px" height="100px" alt="شعار اسم ترتيل">
            </h2>
            <div class="footer-icons">
                <a href="#"><i class="fa-brands fa-facebook" style="color: #38678b;"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp" style="color: #2a5d84;"></i></a>
                <a href="#"><i class="fa-brands fa-instagram" style="color: #38678b;"></i></a>
                {{-- <a href="#"><i class="fa-brands fa-youtube" style="color: #c4302b;"></i></a> --}}
            </div>
        </div>

        <div>
            <h3 style="font-size: 16px; font-weight: bold;font-family: 'Marhey', sans-serif">خدماتنا</h3>
            <ul class="footer-links">
                <li>تحفيظ القرآن الكريم</li>
                <li>مراجعة الحفظ الأسبوعي</li>
                <li>تعليم أحكام التجويد</li>
                <li>متابعة أداء الطلاب</li>
                <li>إشراف معلمين متخصصين</li>
            </ul>
        </div>

        <div>
            <h3 style="font-size: 16px; font-weight: bold;font-family: 'Marhey', sans-serif">البرامج التعليمية</h3>
            <ul class="footer-links">
                <li>برنامج الحفظ الأسبوعي</li>
                <li>برنامج المراجعة</li>
                <li>دورات التجويد</li>
                <li>المستويات التعليمية</li>
                <li>مكتبة الفيديو</li>
            </ul>
        </div>

        <div>
            <h3 style="font-size: 16px; font-weight: bold;font-family: 'Marhey', sans-serif">روابط مهمة</h3>
            <ul class="footer-links">
                <li>من نحن</li>
                <li>اتصل بنا</li>
                <li>سياسة الخصوصية</li>
                <li>الشروط والأحكام</li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p style="font-size: 14px;">جميع الحقوق محفوظة © 2025 لموقع ترتيل لتحفيظ القرآن الكريم.</p>
        <div>
            <a href="#" style="text-decoration: none; color: black;">سياسة الخصوصية</a> |
            <a href="#" style="text-decoration: none; color: black;">الشروط والأحكام</a>
        </div>
    </div>
</footer>
 


<script>
  const header = document.querySelector("header");
  const hamburgerBtn = document.querySelector("#hamburger-btn");
  const closeMenuBtn = document.querySelector("#close-menu-btn");
  // Toggle mobile menu on hamburger button click
  hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));
  // Close mobile menu on close button click
  closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
    <script src="/asset/js/jquery.min.js"></script>
    <script src="/asset/js/popper.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
    <script src="/asset/js/owl.carousel.min.js"></script>
    <script src="/asset/js/main.js"></script>
</body>
</html>