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
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
<!-- Swiper CSS -->
   <link rel="stylesheet" href="css/swiper-bundle.min.css" />
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
  <body>
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
            {{-- <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle droplist" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                الاعدادات
              </a>
            
              <ul class="dropdown-menu text-end" aria-labelledby="dropdownMenuLink" style="text-align: right; direction: rtl;">
          
                @guest
                  يظهر فقط إذا لم يكن المستخدم مسجلاً الدخول
                  <li>
                    <a class="dropdown-item d-flex flex-row-reverse justify-content-between align-items-center" href="{{ url('login') }}">
                      <i class="fa-solid fa-arrow-right-to-bracket" style="color: #8d8c8c;"></i>
                      <span>تسجيل الدخول</span>
                    </a>
                  </li>
                @endguest
              
                @auth
                  يظهر فقط إذا كان المستخدم مسجلاً الدخول
                  <li>
                    <a class="dropdown-item d-flex flex-row-reverse justify-content-between align-items-center" href="{{ url('student') }}">
                      <span style="color: black">الملف الشخصي</span>
                      <i class="fa-regular fa-user" style="color: #838282;"></i>
                      
                    </a>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item d-flex flex-row-reverse justify-content-between align-items-center w-100" style="background: none; border: none; padding: 0.25rem 1.5rem; color: inherit;">
                        <span>تسجيل خروج</span>
                        <i class="fa-solid fa-right-from-bracket" style="color: #838282;"></i>
                      </button>
                    </form>
                  </li>
                @endauth
              
              </ul>
            </div> --}}
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
          <p class="verse-text">"وَرَتِّلِ الْقُرْآنَ تَرْتِيلًا"</p>
          <p class="verse-reference">سورة المزمل، الآية 4</p>
        </div>
      </section>


       {{-- start section_about  --}}
       <div class="bodyabout">
        <section class="about-section">
            <div class="about-text">
                <h2>من نحن</h2>
                <p>
                  نحن مجتمع يسعى لنشر القيم والتقاليد الإسلامية من خلال التعليم والتفاعل الثقافي. 
                  نحن مجتمع يسعى لنشر القيم والتقاليد الإسلامية من خلال التعليم والتفاعل الثقافي. 
                  هدفنا هو بناء بيئة داعمة تجمع بين الأفراد المهتمين بالمعرفة والروحانية.
                    هدفنا هو بناء بيئة داعمة تجمع بين الأفراد المهتمين بالمعرفة والروحانية.
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


      <section class="ftco-section">
        <div class="container1">
          <div class="row">
            <div class="col-md-12 text-center">
              {{-- <h2 class="heading-section mb-5">صدقة جارية</h2> --}}
            </div>
            <div class="col-md-12">
              <div class="featured-carousel owl-carousel">
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url({{('/asset/images/خطة.jpg')}});">
                      <div class="text w-100">
                        <!-- <span class="cat">Web Design</span> -->
                        <h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url({{('/asset/images/احكام.jpg')}});">
                      <div class="text w-100">
                        <!-- <span class="cat">Web Design</span> -->
                        <h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url({{('/asset/images/طفل.jpg')}});">
                      <div class="text w-100">
                        <!-- <span class="cat">Web Design</span> -->
                        <h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url({{('/asset/images/قرأن.jpg')}});">
                      <div class="text w-100">
                        <!-- <span class="cat">Web Design</span> -->
                        <h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="work">
                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url({{('/asset/images/مكتبة.jpg')}});">
                      <div class="text w-100">
                        <!-- <span class="cat">Web Design</span> -->
                        <h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<style>
  .ftco-section {
    margin-right: 60px !important;
    margin-left: 60px !important;
  }
</style>




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
<section class="container">
  <div class="testimonial mySwiper">
    <div class="testi-content swiper-wrapper">
      @foreach($feedbacks as $feedback)
        <div class="slide swiper-slide">
          <img src="{{ asset('storage/' . $feedback->user->image) }}" alt="" class="image" onerror="this.src='{{ asset('images/default-user.png') }}'" />
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
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: false, // غيرت من true إلى false
    grabCursor: true,
    centeredSlides: false, // غيرت من true إلى false
    autoplay: {
      delay: 5000,
      disableOnInteraction: true, // غيرت من false إلى true
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    observer: true,
    observeParents: true,
    observeSlideChildren: true,
    // أضف هذه الإعدادات الجديدة
    preloadImages: false,
    lazy: true,
    watchSlidesProgress: true,
    watchSlidesVisibility: true
  });

  console.log('Swiper initialized without infinite loading');
});
</script>
 {{-- <style>
  .testimonial {
  max-width: 100%;
  overflow: hidden;
}

.swiper-wrapper {
  padding-bottom: 30px;
}

.swiper-slide {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
}

.swiper-button-next, .swiper-button-prev {
  color: #333;
  opacity: 0.7;
  transition: all 0.3s ease;
}

.swiper-button-next:hover, .swiper-button-prev:hover {
  opacity: 1;
}

.swiper-pagination-bullet-active {
  background: #333;
} --}}
  {{-- </style> --}}
<br><br><br>

      {{-- end feedback_slider --}}

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




             <!-- JavaScript -->
        <script src="{{ asset('js/script.js') }}"></script>  
         <!-- Swiper JS -->
        {{-- <script src="{{ asset('js/swiper-bundle.min.js') }}"></script> --}}
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
      
  </body>
</html>