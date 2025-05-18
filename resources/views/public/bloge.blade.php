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



     
      <div class="custom-courses-wrapper" dir="rtl">
        <h2 class="custom-section-title"  style=" font-family: 'Marhey', sans-serif;">الدورات التعليمية</h2>
    
        <div class="custom-courses-grid">
            @foreach ($courses as $course)
                <div class="custom-card">
                    <div class="custom-card-image-wrapper">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="صورة الدورة" class="custom-card-img">
                        <div class="custom-video-icon">
                            <i class="fas fa-play-circle"></i>
                        </div>
                    </div>
    
                    <div class="custom-card-body">
                        <h5 class="custom-card-title" style=" font-family: 'Marhey', sans-serif;">{{ $course->title }}</h5>
                        <p class="custom-card-description">{{ Str::limit($course->description, 60) }}</p>
                        <p class="custom-card-levels">عدد المستويات: {{ $course->levels->count() }}</p>
    
                        <div class="custom-card-footer">
                            <div class="custom-stars"> <span style="color:black;">(4.5)</span>★★★★</div>
                            <a href="{{ route('public.course.details', $course->id) }}" class="custom-read-more-btn">اقرأ المزيد</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
    
<style>
.custom-courses-wrapper {
    padding: 60px 20px;
    background-color: #fdfdfd;
}

.custom-section-title {
    color: #c37044;
    font-weight: bold;
    text-align: center;
    margin-bottom: 40px;
    font-size: 2rem;
}

.custom-courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 15px; /* قللنا المسافة بين الكاردات */
    justify-content: center;
}
.custom-courses-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* قلل المسافة بين الكاردات */
    padding: 0 40px; /* قلل الهوامش الجانبية */
}


.custom-card {
    background-color: white;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 330px;
    display: flex;
    flex-direction: column;
    border-radius: 1rem;
}

.custom-card-image-wrapper {
    position: relative;
}

.custom-card-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-top-right-radius: 1rem;
    border-top-left-radius: 1rem;
}

.custom-video-icon {
    position: absolute;
    bottom: -37px;
    left: 10px;
    color: #c37044;
    font-size: 3rem;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
}

.custom-card-body {
    padding: 20px;
    text-align: right;
    direction: rtl;
}

.custom-card-title {
    font-weight: bold;
    margin-bottom: 10px;
    font-size: 1.1rem;
    color: #333;
}

.custom-card-description {
    font-size: 0.95rem;
    margin-bottom: 10px;
    color: #555;
}

.custom-card-levels {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 20px;
}

.custom-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.custom-stars {
    color: gold;
    font-size: 1.2rem;
}

.custom-read-more-btn {
    background-color: #c37044;
    color: white;
    padding: 6px 16px;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.3s;
    font-weight: bold;
}

.custom-read-more-btn:hover {
  color: #050302;
}



</style>  
      
      <!-- تصميم الزر -->
      {{-- <style>
          .btn-custom {
              background-color: #c37044;
              color: white;
              font-weight: bold;
              font-family: 'Cairo', sans-serif;
              border-radius: 1rem;
              transition: 0.3s;
          }
          .btn-custom1:hover {
              background-color: #a4552f;
              color: #fff;
          }
      </style> --}}
    
      






      <footer>
        <div class="footer-divider">
            <span class="footer-logo"><img src="{{asset('image/لوجو.png')}}" alt="الشعار" height="40"></span>
        </div>
        
        <div class="footer-content">
            <div class="footer-title-icons">
                <h2 class="footer-title"> <img src="{{asset('image/namelogo.png')}}" width="120px" height="100px"></h2>
                <div class="footer-icons">
                    <a href="#"><i class="fa-brands fa-facebook" style="color: #38678b;"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp" style="color: #2a5d84;"></i></a>
                </div>
            </div>
            <div>
                <h3 style="font-size: 16px; font-weight: bold; ">الخدمات</h3>
                <ul class="footer-links">
                    <li>المسجد الكبير</li>
                    <li>الحج والعمرة</li>
                    <li>الزكاة والصدقة</li>
                    <li>رمضان</li>
                    <li>تفسير القرآن</li>
                </ul>
            </div>
            <div>
                <h3 style="font-size: 16px; font-weight: bold;">البرامج</h3>
                <ul class="footer-links">
                    <li>التجمعات</li>
                    <li>العبادة</li>
                    <li>المجتمع</li>
                    <li>المعرفة</li>
                    <li>المركز الإعلامي</li>
                    <li>الوظائف</li>
                </ul>
            </div>
            <div>
                <h3 style="font-size: 16px; font-weight: bold;">روابط</h3>
                <ul class="footer-links">
                    <li>شركاؤنا</li>
                    <li>اتصل بنا</li>
                    <li>مركز المساعدة</li>
                    <li>المدونة الإسلامية</li>
                    <li>الرؤى</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p style="font-size: 14px;">مدعوم من SocioLib.</p>
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