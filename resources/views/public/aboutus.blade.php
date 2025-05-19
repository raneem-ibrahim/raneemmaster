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
   <!-- Swiper CSS -->
   <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
<!-- Swiper CSS  feedback-->
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}" />


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
          <p class="verse-text" style="font-family: 'Marhey', sans-serif;">من نحن</p>
        </div>
      </section>




















      




      {{-- start section_about  --}}
      <div class="bodyabout">
        <section class="about-section">
            <div class="about-text">
                <h2>من نحن</h2>
               <p>
موقع <strong>ترتيل</strong> هو منصة إلكترونية تعليمية تهدف إلى تيسير حفظ القرآن الكريم وتعلُّم أحكام التجويد بأسلوب منهجي مبسط وتفاعلي. نؤمن بأن القرآن رسالة حياة، ونسعى جاهدين إلى ربط القلوب بكلام الله من خلال برامج تعليمية أسبوعية، دروس فيديو منظمة، ومتابعة دائمة من المعلمين المؤهلين. في ترتيل، نرافقك خطوة بخطوة في رحلتك الإيمانية، حيث نزرع الحفظ، ونجني التلاوة الصحيحة، ونرتقي بالفهم والتدبر.
</p>

            </div>
        
            <div class="image-container">
                <div class="image large">
                    <img class="img-about" src="{{asset('asset/images/قرأن-من نحن.jpg')}}" alt="صورة المسجد">
                </div>
                <div class="image small">
                    <img  class="img-about" src="{{asset('asset/images/بنت.jpg')}}" alt="رجل يقرأ">
                </div>
            </div>
        
        </section>
        </div>

      {{-- end section_about  --}}

      <br><br>


























      {{-- start feedback_slider --}}
      {{-- <section class="container">
        <div class="testimonial mySwiper">
          <div class="testi-content swiper-wrapper">
            <div class="slide swiper-slide">
              <img src="{{asset('image/الحمد الله.jpg')}}" alt="" class="image" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                saepe provident dolorem a quaerat quo error facere nihil deleniti
                eligendi ipsum adipisci, fugit, architecto amet asperiores
                doloremque deserunt eum nemo.
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Marnie Lotter</span>
                <span class="job">Web Developer</span>
              </div>
            </div>
            <div class="slide swiper-slide">
              <img src="{{asset('image/صورة شخصية.jpg')}}" alt="" class="image" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                saepe provident dolorem a quaerat quo error facere nihil deleniti
                eligendi ipsum adipisci, fugit, architecto amet asperiores
                doloremque deserunt eum nemo.
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Marnie Lotter</span>
                <span class="job">Web Developer</span>
              </div>
            </div>
            <div class="slide swiper-slide">
              <img src="{{asset('image/ورد.jpg')}}" alt="" class="image" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                saepe provident dolorem a quaerat quo error facere nihil deleniti
                eligendi ipsum adipisci, fugit, architecto amet asperiores
                doloremque deserunt eum nemo.
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Marnie Lotter</span>
                <span class="job">Web Developer</span>
              </div>
            </div>
            <div class="slide swiper-slide">
              <img src="{{asset('image/صورة شخصية2.jpg')}}" alt="" class="image" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                saepe provident dolorem a quaerat quo error facere nihil deleniti
                eligendi ipsum adipisci, fugit, architecto amet asperiores
                doloremque deserunt eum nemo.
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Marnie Lotter</span>
                <span class="job">Web Developer</span>
              </div>
            </div>
          </div>
          <div class="swiper-button-next nav-btn"></div>
          <div class="swiper-button-prev nav-btn"></div>
          <div class="swiper-pagination"></div>
        </div>
      </section> --}}
      {{-- <section class="container">
  <div class="testimonial mySwiper">
    <div class="testi-content swiper-wrapper">
      
      @foreach($feedbacks as $feedback)
        <div class="slide swiper-slide">
          <img src="{{ asset('storage/' . $feedback->user->image) }}" alt="" class="image" />
          <p>{{ $feedback->content }}</p>
          <i class="bx bxs-quote-alt-left quote-icon"></i>
          <div class="details">
            <span class="name">{{ $feedback->user->first_name }} {{ $feedback->user->last_name }}</span>
            <span class="job">طالب</span>
          </div>
        </div>
      @endforeach

    </div>
    <div class="swiper-button-next nav-btn"></div>
    <div class="swiper-button-prev nav-btn"></div>
    <div class="swiper-pagination"></div>
  </div>
</section> --}}



      {{-- end feedback_slider --}}

     <br><br>

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
            <h3 style="font-size: 16px; font-weight: bold; font-family: 'Marhey', sans-serif">خدماتنا</h3>
            <ul class="footer-links">
                <li>تحفيظ القرآن الكريم</li>
                <li>مراجعة الحفظ الأسبوعي</li>
                <li>تعليم أحكام التجويد</li>
                <li>متابعة أداء الطلاب</li>
                <li>إشراف معلمين متخصصين</li>
            </ul>
        </div>

        <div>
            <h3 style="font-size: 16px; font-weight: bold; font-family: 'Marhey', sans-serif">البرامج التعليمية</h3>
            <ul class="footer-links">
                <li>برنامج الحفظ الأسبوعي</li>
                <li>برنامج المراجعة</li>
                <li>دورات التجويد</li>
                <li>المستويات التعليمية</li>
                <li>مكتبة الفيديو</li>
            </ul>
        </div>

        <div>
            <h3 style="font-size: 16px; font-weight: bold; font-family: 'Marhey', sans-serif">روابط مهمة</h3>
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
        <script src="asset/js/jquery.min.js"></script>
        <script src="asset/js/popper.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/owl.carousel.min.js"></script>
        <script src="asset/js/main.js"></script>


             <!-- JavaScript -->
        <script src="{{ asset('js/script.js') }}"></script>  
         <!-- Swiper JS -->
        {{-- <script src="{{ asset('js/swiper-bundle.min.js') }}"></script> --}}
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
  </body>
</html>