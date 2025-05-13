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
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #fdf8f3;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: relative;
        }
        .profile-header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0e6db;
            padding-bottom: 20px;
        }
        .avatar-upload {
    position: relative;
    width: 130px;
    height: 130px;
    margin-left: 25px;
}

.avatar-preview {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 3px solid #c37044;
    background-size: cover;
    background-position: center;
}

.avatar-edit {
    position: absolute;
    right: 0;
    bottom: 0;
}

.avatar-edit input {
    display: none;
}

.avatar-edit label {
    width: 32px;
    height: 32px;
    background: #fff;
    border: 2px solid #c37044;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    position: absolute;
    right: -5px;
    bottom: -5px;
    color: #c37044;
    font-size: 14px;
    transition: all 0.3s ease;
}

/* .avatar-edit label:hover {
    background: #c37044;
    color: #fff;
    transform: scale(1.1);
} */
        .teacher-info {
            flex: 1;
            min-width: 200px;
        }
        .teacher-info h2 {
            margin: 0;
            font-size: 26px;
            color: #333;
        }
        .teacher-info p {
            margin: 5px 0 0;
            color: #7b6e5e;
            font-weight: 500;
            font-size: 18px;
        }
        .info-section {
            margin-top: 30px;
        }
        .info-section h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
            position: relative;
        }
        .info-section h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: 0;
            width: 50px;
            height: 3px;
            background: #c37044;
        }
        .info-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            color: #555;
        }
        .info-item i {
            width: 28px;
            font-size: 18px;
            color: #c37044;
            margin-left: 10px;
        }
        .info-content {
            flex: 1;
        }
        .info-content strong {
            display: block;
            font-weight: bold;
            margin-bottom: 3px;
            color: #333;
        }
        .edit-icon {
            cursor: pointer;
            color: #c37044;
            margin-right: 10px;
        }
        /* Modal Styles */
        #editModal {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 999;
            align-items: center;
            justify-content: center;
        }
        #editModal .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
        }
        #editModal input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        #editModal button {
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
        }
        #editModal .btn-save {
            background: #c37044;
            color: white;
            border: none;
        }
        #editModal .btn-cancel {
            background: #ddd;
            border: none;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- صورة المعلم -->
        <form id="avatarForm" action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-header">
               <div class="avatar-upload">
    <div class="avatar-preview" id="imagePreview" 
        style="background-image: url('{{ auth()->user()->image ? asset('storage/'.auth()->user()->image) : '/image/default-teacher.png' }}');">
    </div>
    <div class="avatar-edit">
        <input type="file" id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
        <label for="imageUpload">
            {{-- <i class="fas fa-pen"></i> --}}
        </label>
    </div>
</div>
                <div class="teacher-info">
                    <h2>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                    <p><i class="fas fa-user-tie"></i> معلم قرآن كريم</p>
                </div>
            </div>
        </form>

        <!-- معلومات المعلم -->
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
                <i class="fas fa-pen edit-icon" onclick="openModal('phone')"></i>
            </div>

            <div class="info-item">
                <i class="fas fa-key"></i>
                <div class="info-content">
                    <strong>كلمة المرور</strong>
                    <span>*******</span>
                </div>
                <i class="fas fa-pen edit-icon" onclick="openModal('password')"></i>
            </div>
        </div>
    </div>

    <!-- Modal للتعديل -->
    <div id="editModal">
        <div class="modal-content">
            <h3 id="modalTitle"></h3>
            <form id="modalForm" method="POST" action="{{ route('teacher.profile.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="field" id="fieldType">
                <div id="inputContainer"></div>
                <div style="text-align: left;">
                    <button type="button" class="btn-cancel" onclick="closeModal()">إلغاء</button>
                    <button type="submit" class="btn-save">حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(field) {
            const modal = document.getElementById('editModal');
            const title = document.getElementById('modalTitle');
            const inputContainer = document.getElementById('inputContainer');
            const fieldType = document.getElementById('fieldType');

            fieldType.value = field;

            if (field === 'phone') {
                title.innerText = 'تعديل رقم الهاتف';
                inputContainer.innerHTML = `
                    <label>رقم الهاتف الجديد:</label>
                    <input type="text" name="phone" required value="{{ auth()->user()->phone }}">
                `;
            } else if (field === 'password') {
                title.innerText = 'تعديل كلمة المرور';
                inputContainer.innerHTML = `
                    <label>كلمة المرور الجديدة:</label>
                    <input type="password" name="password" required>
                `;
            }

            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // صورة البروفايل
        document.getElementById('imageUpload').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        const formData = new FormData(document.getElementById('avatarForm'));
        const reader = new FileReader();

        // عرض الصورة فورًا قبل التحديث (تحسين الأداء)
        reader.onload = function(e) {
            document.getElementById('imagePreview').style.backgroundImage = `url('${e.target.result}')`;
        };
        reader.readAsDataURL(this.files[0]);

        // إرسال البيانات إلى السيرفر
        fetch('{{ route("teacher.profile.update") }}', {
            method: 'POST',
            headers: {
                'X-HTTP-Method-Override': 'PUT',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.image_url) {
                // يتم تحديث الصورة من السيرفر (خلفيًا)
                document.getElementById('imagePreview').style.backgroundImage = `url('${data.image_url}')`;
            }
        })
        .catch(error => console.error('Error:', error)); // تسجيل الأخطاء فقط
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



{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}