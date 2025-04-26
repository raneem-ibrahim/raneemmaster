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

    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>الملف الشخصي للمعلم</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
                background-color: #f5f5f5;
                color: #333;
                padding: 20px;
            }
            .profile-container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
                padding: 30px;
            }
            .profile-header {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
                border-bottom: 1px solid #e0e0e0;
                padding-bottom: 20px;
            }
            .avatar-upload {
                position: relative;
                width: 120px;
                height: 120px;
                margin-left: 20px;
            }
            .avatar-preview {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                border: 3px solid #e0e0e0;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            .avatar-edit {
                position: absolute;
                left: 50%;
                top: 0;
                transform: translateX(-50%) translateY(-50%);
            }
            .avatar-edit input {
                display: none;
            }
            .avatar-edit label {
                display: inline-block;
                width: 34px;
                height: 34px;
                background: #d4b483;
                border-radius: 50%;
                cursor: pointer;
                text-align: center;
                line-height: 34px;
                color: white;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }
            .teacher-info h2 {
                margin: 0;
                color: #5a4a42;
                font-size: 24px;
            }
            .teacher-info p {
                margin: 5px 0 0;
                color: #7a6e65;
            }
            .info-section {
                margin-bottom: 25px;
            }
            .info-section h3 {
                color: #5a4a42;
                border-bottom: 1px solid #e0e0e0;
                padding-bottom: 8px;
                margin-bottom: 15px;
            }
            .info-item {
                display: flex;
                margin-bottom: 12px;
            }
            .info-item i {
                width: 25px;
                color: #d4b483;
                margin-left: 10px;
            }
            .info-content {
                flex: 1;
            }
            .info-content strong {
                display: block;
                color: #5a4a42;
                margin-bottom: 3px;
            }
            .stats {
                display: flex;
                justify-content: space-around;
                text-align: center;
                margin-top: 30px;
                background-color: #f9f5f0;
                padding: 15px;
                border-radius: 8px;
            }
            .stat-item h4 {
                margin: 0;
                color: #5a4a42;
                font-size: 20px;
            }
            .stat-item p {
                margin: 5px 0 0;
                color: #7a6e65;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="profile-container">
          <form id="avatarForm" action="{{ route('profile.update-image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="profile-header">
                    <div class="avatar-upload">
                        <div class="avatar-preview" id="imagePreview" 
                             style="background-image: url('{{ auth()->user()->image ? asset('storage/'.auth()->user()->image) : '/image/default-teacher.png' }}');">
                        </div>
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><i class="fas fa-pen"></i></label>
                        </div>
                    </div>
                    <div class="teacher-info">
                        <h2>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                        <p><i class="fas fa-user-tie"></i> معلم قرآن كريم</p>
                    </div>
                </div>
            </form>
    
            <div class="info-section">
                <h3><i class="fas fa-info-circle"></i> المعلومات الشخصية</h3>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div class="info-content">
                        <strong>البريد الإلكتروني</strong>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div class="info-content">
                        <strong>رقم الهاتف</strong>
                        <span>{{ auth()->user()->phone ?? 'غير محدد' }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="info-content">
                        <strong>تاريخ الانضمام</strong>
                        <span>{{ auth()->user()->created_at->format('Y/m/d') }}</span>
                    </div>
                </div>
            </div>
    
            <div class="stats">
                <div class="stat-item">
                    <h4>24</h4>
                    <p>الطلاب النشطين</p>
                </div>
                <div class="stat-item">
                    <h4>156</h4>
                    <p>الصفحات المحفوظة</p>
                </div>
                <div class="stat-item">
                    <h4>98%</h4>
                    <p>معدل الحضور</p>
                </div>
            </div>
        </div>
    
        <script>
         document.getElementById('imageUpload').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        const formData = new FormData(document.getElementById('avatarForm'));
        
        fetch(this.form.action, {
            method: 'POST',
            headers: {
                'X-HTTP-Method-Override': 'PUT', // لحل مشكلة MethodOverride
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire('تم!', 'تم تحديث الصورة بنجاح', 'success');
                document.getElementById('imagePreview').style.backgroundImage = `url('${data.image_url}')`;
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
        </script>
    </body>
    </html>
    

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