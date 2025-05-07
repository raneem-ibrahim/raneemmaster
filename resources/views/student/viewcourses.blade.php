
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #c37044;">الدورات التعليمية</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($courses as $course)
        <div class="col">
            <div class="card h-100 shadow rounded-4 border-0" style="background-color: #fdf8f2;">
                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="صورة الدورة" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-dark">{{ $course->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                    <button class="btn btn-dark mt-2 show-levels-btn" data-course-id="{{ $course->id }}">عرض المستويات</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- هنا حيظهر المستويات -->
    <div id="levels-container" class="mt-5"></div>
</div>

