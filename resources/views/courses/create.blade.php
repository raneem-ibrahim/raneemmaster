@extends('dashboard.dash')

@section('content')
<style>
    body {
        background-color: #fdf6ee;
    }

    .course-form-container {
        background-color: #fffdf8;
        border: 1px solid #e0d6c7;
        border-radius: 15px;
        padding: 30px;
        max-width: 700px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        color: #000;
    }

    .course-form-container h2 {
        color: #c37044;
        border-bottom: 2px solid #c37044;
        padding-bottom: 10px;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: bold;
        color: #000;
    }

    .btn-custom {
        background-color: #c37044;
        color: #fff;
        font-weight: bold;
        font-family: 'Marhey', sans-serif;
    }

    .btn-custom:hover {
        background-color: #a4552f;
    }

    .alert {
        direction: rtl;
    }
</style>

<div class="container py-5">
    <div class="course-form-container">
        <h2 style=" font-family: 'Marhey', sans-serif;">إضافة دورة جديد</h2>

        {{-- رسائل النجاح --}}
       @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'تم الحفظ بنجاح',
                text: '{{ session('success') }}',
                confirmButtonColor: '#c37044',
                confirmButtonText: 'حسناً'
            });
        });
    </script>
@endif


        {{-- عرض الأخطاء --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- النموذج --}}
        <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">عنوان الدورة</label>
                <input type="text" name="title" id="title" class="form-control" required placeholder=" اسم الدورة">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">وصف الدورة (اختياري)</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="وصف مختصر لمحتوى الدورة"></textarea>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">الشرح الكامل</label>
                <textarea name="details" id="details" rows="6" class="form-control" placeholder="أدخل الشرح الكامل للدورة" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة الدورة (اختياري)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
   <div class="form-group mb-3">
    <label for="teachers" class="form-label">اختر المعلمين:</label>
    <div class="border rounded p-3 bg-white" style="max-height: 300px; overflow-y: auto; direction: rtl;">
        @foreach($teachers as $teacher)
            <div class="form-check mb-2" style="padding-right: 1.5rem;">
                <input class="form-check-input" type="checkbox" name="teachers[]" value="{{ $teacher->id }}" id="teacher{{ $teacher->id }}">
                <label class="form-check-label" for="teacher{{ $teacher->id }}">
                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                </label>
            </div>
        @endforeach
    </div>
</div>





            <button type="submit" class="btn btn-custom">حفظ الدورة</button>
        </form>
    </div>
</div>
@endsection
<style>
/* .form-check-input:checked {
    background-color: #28a745 !important; 
    border-color: #28a745 !important;
}

.form-check-input:focus {
    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25) !important;
} */
/* تغيير لون خلفية التشيك بوكس عند التحديد */
.form-check-input:checked {
    background-color: #c37044 !important; /* اللون البرتقالي المطلوب */
    border-color: #c37044 !important;
}

/* تغيير لون مربع التشيك بوكس عند التركيز (focus) */
.form-check-input:focus {
    box-shadow: 0 0 0 0.25rem rgba(195, 112, 68, 0.25) !important; /* ظل بنفس اللون */
}

</style>
