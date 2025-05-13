
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
    
   
    
    <style>
        .form-label {
            font-weight: 500;
            color: #333;
        }
    
        .form-control, .form-select {
            border-radius: 0.5rem;
            border: 1px solid #ccc;
        }
    
        .card-custom {
            background-color: #fdfaf5; /* بيج فاتح */
            border: 1px solid #e4dccc;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-radius: 1rem;
        }
    
        .btn-custom {
            background-color: #c37044;
            color: white;
            border-radius: 0.5rem;
        }
    
        .btn-custom:hover {
            background-color: #a95f3b;
        }
    </style>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-custom p-4">
                    <h4 class="text-center mb-4" style="color: #c37044;">إضافة معلم جديد</h4>
                    {{-- enctype="multipart/form-data" هاد الي بسمح نرفع صورة بدونو ما بتم رفع الصور --}}
                    <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data" dir="rtl">
                        @csrf
    
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">الاسم الأول</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">الاسم الأخير</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" required
       pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
       title="الرجاء إدخال بريد إلكتروني صحيح">

                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" required
       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
       title="كلمة المرور يجب أن تحتوي على 8 خانات على الأقل، وحرف كبير وصغير ورقم ورمز">

                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">العمر</label>
                                <input type="number" name="age" class="form-control" min="18" max="80" required>
                            </div>
                            <div class="col-md-6">
    <label class="form-label">رقم الهاتف</label>
    <input type="text" name="phone" class="form-control" required
        pattern="^07\d{8}$"
        title="رقم الهاتف يجب أن يبدأ بـ 07 ويحتوي على 10 أرقام">
</div>

    
                            <div class="col-md-6">
                                <label class="form-label">الجنس</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">اختر</option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="أنثى">أنثى</option>
                                </select>
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">من عمر</label>
                                <input type="number" name="teaching_from_age" class="form-control" min="3" max="80" required>
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">إلى عمر</label>
                                <input type="number" name="teaching_to_age" class="form-control" min="3" max="80" required>
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">الصورة الشخصية</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label">الدور</label>
                                <input type="text" name="role" class="form-control" value="معلم" readonly>
                            </div>
                        </div>
    
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-custom px-4">حفظ المعلم</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
      document.querySelector('form').addEventListener('submit', function (e) {
          const email = document.querySelector('input[name="email"]').value;
          const password = document.querySelector('input[name="password"]').value;
          const phone = document.querySelector('input[name="phone"]').value;

          const phoneRegex = /^07\d{8}$/;
          const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
  
          if (!emailRegex.test(email)) {
              alert('يرجى إدخال بريد إلكتروني صحيح');
              e.preventDefault();
          } else if (!passwordRegex.test(password)) {
              alert('كلمة المرور يجب أن تحتوي على 8 خانات على الأقل، تشمل حرف كبير، حرف صغير، رقم، ورمز خاص');
              e.preventDefault();
          } else if (!phoneRegex.test(phone)) {
    alert('رقم الهاتف يجب أن يبدأ بـ 07 ويحتوي على 10 أرقام');
    e.preventDefault();
}
      });
  </script>
  {{-- هاد للسويت اليرت --}}
  @if(session('success'))
  <script>
      Swal.fire({
          title: 'نجاح!',
          text: '{{ session('success') }}',
          icon: 'success',
          confirmButtonText: 'حسناً',
          confirmButtonColor: '#c37044',
          background: '#fefcf9',
          color: '#000',
          customClass: {
              popup: 'rounded',
              confirmButton: 'btn btn-primary'
          }
      });
  </script>
  @endif
  
  
 {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
    </div>
  </main>
 
  
  
  {{-- start end  --}}
  
  @include('dashboard.include.end')
  {{-- end end  --}}