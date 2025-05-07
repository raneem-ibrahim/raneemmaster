@extends('dashboard.dash')

@section('content')
<div class="container">
    <h2 class="mb-4" style="font-family: 'Marhey', sans-serif;">قائمة الكورسات</h2>

    @if($courses->isEmpty())
        <div class="alert alert-warning">لا يوجد كورسات حالياً.</div>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-6 mb-4">
                    <div class="card border-1 shadow-sm">

                        {{-- ✅ صورة الكورس --}}
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="صورة الكورس" style="max-height: 250px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ $course->description }}</p>

                            <!-- زر فتح المودال -->
                            <a href="#" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#createLevelModal{{ $course->id }}">
                                إنشاء مستوى جديد
                            </a>

                            <!-- مودال إنشاء مستوى -->
                            <div class="modal fade" id="createLevelModal{{ $course->id }}" tabindex="-1" aria-labelledby="createLevelModalLabel{{ $course->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('levels.store', $course->id) }}" method="POST">
                                      @csrf
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="createLevelModalLabel{{ $course->id }}">
                                          إضافة مستوى جديد - {{ $course->title }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- حقل عنوان المستوى مع خط تحت النص -->
                                        <div class="mb-4">
                                          <label class="form-label text-muted small mb-1">عنوان المستوى</label>
                                          <div class="input-group border-bottom">
                                            <input 
                                              type="text" 
                                              class="form-control border-0 px-0 bg-transparent" 
                                              name="title" 
                                              placeholder="أدخل عنوان المستوى هنا"
                                              required
                                            >
                                          </div>
                                        </div>
                                        
                                        <!-- حقل رقم المستوى مع خط تحت النص -->
                                        <div class="mb-4">
                                          <label class="form-label text-muted small mb-1">رقم المستوى</label>
                                          <div class="input-group border-bottom">
                                            <input 
                                              type="number" 
                                              class="form-control border-0 px-0 bg-transparent" 
                                              name="level_number" 
                                              placeholder="أدخل الرقم التسلسلي"
                                              required
                                            >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit"class="btn btn-custom">حفظ المستوى</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            <!-- نهاية المودال -->

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- تنسيقات -->
<style>
    .btn-custom {
        background-color: #c37044;
        color: #fff;
        font-weight: bold;
        font-family: 'Marhey', sans-serif;
    }

    .btn-custom:hover {
        background-color: #a4552f;
        color: black;
    }
</style>

<!-- سكربت Bootstrap JS (مطلوب لتشغيل المودال) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
