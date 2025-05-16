



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
    body {
        background-color: #f5f0e6;
        color: #000;
        font-family: 'Cairo', sans-serif;
    }

    #lessonsTable th, #lessonsTable td {
        white-space: nowrap;
        vertical-align: middle;
        text-align: center;
    }

    #lessonsTable thead {
        background-color: #000;
        color: #fff;
    }

    #lessonsTable tbody tr:hover {
        background-color: #f1e1d2;
    }

    .btn-primary {
        background-color: #c37044;
        border: none;
    }

    .btn-primary:hover {
        background-color: #a15830;
    }

    h2.text-primary {
        color: #c37044 !important;
        font-family: 'Marhey', sans-serif !important;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .btn-primary:focus,
.btn-primary:active,
.btn-primary:focus:active {
    background-color: #c37044 !important;
    border-color: #c37044 !important;
    box-shadow: none !important;
    color: white !important;
}
.btn-black {
    background-color: #000 !important;
    border: none !important;
    color: #fff !important;
}

.btn-black:hover {
    background-color: #333 !important;
    color: #fff !important;
}

.btn-black:focus,
.btn-black:active,
.btn-black:focus:active {
    background-color: #000 !important;
    border: none !important;
    box-shadow: none !important;
    color: #fff !important;
}


</style>

<div class="container py-4">
    @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'نجاح',
            text: "{{ session('success') }}",
            confirmButtonText: 'حسنًا'
        });
    });
</script>
@endif

 <h2 class="text-primary mb-4">
    دروسي المسجلة
    @if($courseTitle)
        - <span class="text-dark">{{ $courseTitle }}</span>
    @endif
</h2>


    <table id="lessonsTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان الدرس</th>
                <th>الوصف</th>
                <th>المستوى</th>
                <th>رابط الفيديو</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lessons as $lesson)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ Str::limit($lesson->description, 50) }}</td>
                    <td>{{ $lesson->level->title ?? 'غير محدد' }}</td>
<td>
   <button
    class="btn btn-sm btn-info watch-video-btn" style="background-color: #000"
    data-video-url="{{ Storage::url($lesson->video_url) }}"
    data-bs-toggle="modal"
    data-bs-target="#videoModal">
    مشاهدة
</button>

</td>



                    <td>
                        <button class="btn btn-sm btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editLessonModal"
                                data-id="{{ $lesson->id }}"
                                data-title="{{ $lesson->title }}"
                                data-description="{{ $lesson->description }}"
                                data-video="{{ $lesson->video_url }}"
                                data-level="{{ $lesson->level_id }}">
                            تعديل
                        </button>
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm "    >حذف</button>
</form>

                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="6">لا يوجد دروس حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editLessonModal" tabindex="-1" aria-labelledby="editLessonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('lessons.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="lesson_id" id="modalLessonId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل الدرس</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modalLessonTitle" class="form-label">عنوان الدرس</label>
                        <input type="text" class="form-control" id="modalLessonTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalLessonDescription" class="form-label">الوصف</label>
                        <textarea class="form-control" id="modalLessonDescription" name="description" rows="3" required></textarea>
                    </div>
                   <div class="mb-3">
    <label for="modalLessonVideo" class="form-label">ملف الفيديو</label>
    <input type="file" class="form-control" id="modalLessonVideo" name="video_file" accept="video/*">
</div>

                    <div class="mb-3">
                        <label for="modalLessonLevel" class="form-label">المستوى</label>
                      <select class="form-select" id="modalLessonLevel" name="level_id" required>
    @foreach ($levels as $level)
        <option value="{{ $level->id }}">{{ $level->title }}</option>
    @endforeach
</select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn "  style="background-color: #a15830 ; color: white;">حفظ التغييرات</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal تشغيل الفيديو -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">مشاهدة الفيديو</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
      </div>
      <div class="modal-body text-center">
        <video id="lessonVideo" width="100%" height="auto" controls>
            <source src="" type="video/mp4">
            متصفحك لا يدعم تشغيل الفيديو.
        </video>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editLessonModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        document.getElementById('modalLessonId').value = button.getAttribute('data-id');
        document.getElementById('modalLessonTitle').value = button.getAttribute('data-title');
        document.getElementById('modalLessonDescription').value = button.getAttribute('data-description');
        document.getElementById('modalLessonLevel').value = button.getAttribute('data-level');
    });
});
</script>
{{-- سيكربت تشغيل الفيديو  --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const videoModal = document.getElementById('videoModal');
    const lessonVideo = document.getElementById('lessonVideo');

    videoModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const videoUrl = button.getAttribute('data-video-url');
        
        lessonVideo.querySelector('source').src = videoUrl;
        lessonVideo.load(); // تحديث الفيديو
    });

    // إيقاف الفيديو عند إغلاق المودال
    videoModal.addEventListener('hidden.bs.modal', function () {
        lessonVideo.pause();
        lessonVideo.currentTime = 0;
    });
});
</script>


    
 
     
    
    
    
            
    
    
    {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
  </div>
</main>



{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}