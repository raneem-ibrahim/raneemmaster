{{-- @if($courses->count())
    <div class="mt-5">
        <h4 class="text-c37044 mb-4">الدورات التعليمية</h4>

        @foreach($courses as $course)
            <div class="mb-5 p-4 border rounded shadow-sm bg-white">
                <h5 class="mb-3 text-c37044">📘 الدورة: {{ $course->title }}</h5>

                @foreach($course->levels as $level)
                    <div class="mb-4">
                        <h6 class="text-secondary">المستوى: {{ $level->title }}</h6>

                        @forelse($level->lessons as $lesson)
                            <div class="mb-3 p-3 bg-light rounded">
                                <strong>{{ $lesson->title }}</strong>
                                
                                @if($lesson->video_url)
                                    @if(Str::contains($lesson->video_url, 'youtube.com') || Str::contains($lesson->video_url, 'youtu.be'))
                                        YouTube فيديو من
                                        <div class="ratio ratio-16x9 mt-2">
                                            <iframe src="{{ $lesson->video_url }}" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    @else
                                        فيديو مرفوع على السيرفر
                                        <video controls class="w-100 mt-2 rounded">
                                            <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                                            متصفحك لا يدعم تشغيل الفيديو.
                                        </video>
                                    @endif
                                @else
                                    <p class="text-danger">لا يوجد فيديو لهذا الدرس.</p>
                                @endif

                                @if($lesson->description)
                                    <p class="mt-2">{{ $lesson->description }}</p>
                                @endif
                            </div>
                        @empty
                            <p>لا توجد دروس في هذا المستوى.</p>
                        @endforelse
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@else
    <p class="text-muted">لا توجد دورات متاحة لك حاليًا.</p>
@endif --}}



{{-- 
@if($videoLessons->count())
    <div class="mt-5">
        <h4 class="text-c37044 mb-4">📹 دروس الفيديو الخاصة بك</h4>

        @foreach($videoLessons as $lesson)
            <div class="mb-4 p-3 border rounded bg-white shadow-sm">
                <h6>{{ $lesson->title }}</h6>

                @if(Str::contains($lesson->video_url, 'youtube.com') || Str::contains($lesson->video_url, 'youtu.be'))
                    <div class="ratio ratio-16x9 mt-2">
                        <iframe src="{{ $lesson->video_url }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                @else
                    <video controls class="w-100 mt-2 rounded">
                        <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                        متصفحك لا يدعم تشغيل الفيديو.
                    </video>
                @endif

                @if($lesson->description)
                    <p class="mt-2">{{ $lesson->description }}</p>
                @endif

                <p class="text-muted">من الدورة: {{ $lesson->level->course->title }} | المستوى: {{ $lesson->level->title }}</p>
            </div>
        @endforeach
    </div>
@else
    <p class="text-muted">لا توجد دروس فيديو متاحة لك حاليًا.</p>
@endif --}}

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
@endforeach

