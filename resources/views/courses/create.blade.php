@extends('dashboard.dash')


@section('content')
<style>
    body {
        background-color: #fdf6ee; /* بيج فاتح */
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
        <h2 style=" font-family: 'Marhey', sans-serif;">إضافة كورس جديد</h2>

        {{-- رسائل النجاح --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
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
        <form action="{{ route('teacher.courses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">عنوان الكورس</label>
                <input type="text" name="title" id="title" class="form-control" required placeholder=" اسم الكورس">

            <div class="mb-3">
                <label for="description" class="form-label">وصف الكورس (اختياري)</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="وصف مختصر لمحتوى الكورس"></textarea>
            </div>

            <button type="submit" class="btn btn-custom">حفظ الكورس</button>
        </form>
    </div>
</div>
@endsection
