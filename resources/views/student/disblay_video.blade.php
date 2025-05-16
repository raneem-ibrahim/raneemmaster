
{{-- 
@foreach ($lessonsByLevel as $group)
    <div class="mb-5">
        <h4 class="mb-3 ">{{ $group['course_title'] }} - {{ $group['level_title'] }}</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($group['lessons'] as $lesson)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                      <video controls poster="{{ asset('storage/open-book-wood-stand-red-carpet-600x330.jpg') }}" class="card-img-top" style="max-height: 200px; object-fit: cover;">
    <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
    المتصفح لا يدعم تشغيل الفيديو.
</video>

                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->title }}</h5>
                            <p class="card-text">{{ $lesson->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach --}}


@foreach($lessonsByLevel as $index => $group)
    <div class="mb-5 p-4 border rounded bg-white shadow-sm">

        <h4 class="mb-4 text-primary" style="color: #c37044 !important ">📘 {{ $group['level_title'] }}</h4>

        <ul class="list-group list-group-flush">
            @foreach($group['lessons'] as $lesson)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-3">
                        <h5 class="mb-1">{{ $lesson->title }}</h5>
                        <p class="mb-1 text-muted">{{ $lesson->description }}</p>
                    </div>
                    <div>
         <!-- استبدال زر المشاهدة بهذا -->
<button class="btn btn-outline-custom btn-sm watch-video 
    {{ $lesson->isViewedBy(auth()->user()) ? 'completed' : '' }}"
    data-video="{{ asset('storage/' . $lesson->video_url) }}"
    data-lesson-id="{{ $lesson->id }}">
    @if($lesson->isViewedBy(auth()->user()))
        ✓ تم المشاهدة
    @else
        ▶️ مشاهدة الفيديو
    @endif
</button>

<style>
    .btn-outline-custom {
        color: #c37044;
        border-color: #c37044;
    }
    .btn-outline-custom:hover {
        color: #fff;
        background-color: #c37044;
        border-color: #c37044;
    }
</style>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach


<!-- Modal لعرض الفيديو -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">مشاهدة الفيديو</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>
      <div class="modal-body">
        <video id="modalVideo" class="w-100 rounded" controls style="max-height: 500px;">
          <source src="" type="video/mp4">
          متصفحك لا يدعم تشغيل الفيديو.
        </video>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.watch-video');
    const modal = new bootstrap.Modal(document.getElementById('videoModal'));
    const video = document.getElementById('modalVideo');
    
    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            const src = this.dataset.video;
            const lessonId = this.dataset.lessonId;
            
            // 1. عرض الفيديو أولاً
            video.querySelector('source').src = src;
            video.load();
            modal.show();
            
            // 2. تسجيل المشاهدة
            fetch('/track-lesson-view', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({lesson_id: lessonId})
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    btn.classList.add('btn-completed');
                    btn.innerHTML = '✓ تم المشاهدة';
                    // يمكنك إضافة تحديث تلقائي للإحصائيات هنا إذا لزم الأمر
                }
            });
        });
    });
    
    // إعادة تعيين الفيديو عند إغلاق المودال
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        video.pause();
        video.currentTime = 0;
    });
});
</script>


