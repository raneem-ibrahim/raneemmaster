@extends('dashboard.dash')

@section('content')
<div class="container py-4">
    <h2 style="font-family: 'Marhey', sans-serif;">إضافة درس جديد</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="course_id" class="form-label">اختر الكورس</label>
            <select name="course_id" id="course_id" class="form-select" required onchange="updateLevels()">
                <option value="">-- اختر --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level_id" class="form-label">اختر المستوى</label>
            <select name="level_id" id="level_id" class="form-select" required>
                <option value="">-- اختر المستوى --</option>
                {{-- سيتم تحديثه باستخدام JS --}}
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الدرس</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف الدرس (اختياري)</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="video_file" class="form-label">رفع فيديو الدرس</label>
            <input type="file" name="video_file" id="video_file" class="form-control" accept="video/*" required>
        </div>
        

        <button type="submit" class="btn btn-custom">إضافة الدرس</button>
    </form>
</div>

<script>
    const courses = @json($courses);

    function updateLevels() {
        const courseId = document.getElementById('course_id').value;
        const levelSelect = document.getElementById('level_id');
        levelSelect.innerHTML = '<option value="">-- اختر المستوى --</option>';

        const selectedCourse = courses.find(c => c.id == courseId);
        if (selectedCourse && selectedCourse.levels) {
            selectedCourse.levels.forEach(level => {
                const option = document.createElement('option');
                option.value = level.id;
                option.textContent = level.title;
                levelSelect.appendChild(option);
            });
        }
    }
</script>

<style>
    .btn-custom {
        background-color: #c37044;
        color: #fff;
        font-family: 'Marhey', sans-serif;
    }

    .btn-custom:hover {
        background-color: #a4552f;
    }
</style>
@endsection
