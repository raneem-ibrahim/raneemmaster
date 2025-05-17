

 {{-- إذا كان الطالب لم يختر بعد --}}
  @if (!$selectedTeacher && $teachers)
    <h6 class="mb-3 fw-bold text-dark">اختر معلمك</h6>
    <form action="{{ route('select.teacher') }}" method="POST">
      @csrf

      {{-- قائمة المعلمين --}}
      <div class="list-group mb-3">
        @foreach ($teachers as $teacher)
          <label class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
              <input class="form-check-input me-2" type="radio" name="teacher_id" value="{{ $teacher->id }}">
              <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('image/صورة شخصية.jpg') }}"
                   alt="صورة المعلم"
                   class="rounded-circle"
                   style="width: 40px; height: 40px; object-fit: cover;">
              <span class="fw-semibold">{{ $teacher->first_name }} {{ $teacher->last_name }}</span>
            </div>
            <small class="text-muted">{{ $teacher->students->count() }} طلاب</small>
          </label>
        @endforeach
      </div>

      {{-- زر الحفظ --}}
      <div class="text-center">
        <button type="submit" class="btn btn-dark btn-sm rounded-pill px-4">تأكيد الاختيار</button>
      </div>
    </form>
@endif
</div>
<style>
input[type="radio"].form-check-input:checked {
  background-color: #c37044 !important;
  border-color: #c37044 !important;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e") !important;
}
input[type="radio"].form-check-input:focus {
  box-shadow: 0 0 0 0.25rem rgba(195, 112, 68, 0.25) !important;
}

  </style>
{{-- نهاية اختر معلمك --}}


   {{-- هون اختيار جدول للحفظ  --}}
@if ($needsMemorizationProgram)
    <form action="{{ route('setMemorizationProgram') }}" method="POST"
        class="p-4 bg-white shadow rounded-4 border border-2"
        style="max-width: 550px; margin: 40px auto; font-family: 'Cairo', sans-serif; border-color: #c37044;">
        @csrf
        <h4 class="text-center mb-4 fw-bold"
            style="color: #c37044; border-bottom: 2px solid #c37044; padding-bottom: 10px;">
            اختيار برنامج الحفظ اليومي
        </h4>

        <div class="mb-4">
            <label for="memorization_program" class="form-label text-dark fw-semibold">اختر المستوى:</label>
            <select name="memorization_program" id="memorization_program"
                class="form-select border-dark rounded-3 shadow-sm"
                style="background-color: #fdf8f5; color: #000;">
                <option value="half_page">نصف صفحة</option>
                <option value="one_page">صفحة</option>
                <option value="two_pages">صفحتين</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit"
                class="btn px-5 py-2 rounded-pill shadow text-white"
                style="background-color: #c37044;">
                <i class="bi bi-bookmark-check-fill me-1"></i> حفظ الاختيار
            </button>
        </div>
    </form>
@endif



{{-- نهياة اختيار جدول الحفظ  --}}


   @foreach($student->studentWeeklyPrograms as $studentProgram)
   @if ($loop->index >= $loop->count - 2)
      <div class="card my-4">
     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
       <div class="shadow" style="background-color: #020202; border-radius: .5rem .5rem 0 0;">
         @php
         $programType = $studentProgram->weeklyProgram->dailyPrograms->first()?->type;
         $typeLabel = $programType === 'حفظ' ? 'جدول حفظ' : 'جدول مراجعة';
         @endphp
         
         <h6 class="text-white text-capitalize ps-3 py-3">
           {{ $typeLabel }} يبدأ من {{ \Carbon\Carbon::parse($studentProgram->weeklyProgram->week_start)->format('Y-m-d') }}
         </h6>
         
       </div>
     </div>
     <div class="card-body px-0 pb-2">
       <div class="table-responsive p-0">
         
         <form method="POST" action="{{ route('profile.saveAchievements') }}">
 
           @csrf
           <input type="hidden" name="weekly_program_id" value="{{ $studentProgram->weeklyProgram->id }}">
           <table class="table align-items-center mb-0 text-center" dir="rtl">
             <thead style="background-color: #f5e9dd;">
               <tr>
                 <th>اليوم</th>
                 <th>النوع</th>
                 <th>الكمية</th>
                 <th>السورة</th>
                 <th>من آية</th>
                 <th>إلى آية</th>
                 <th>ملاحظات</th>
                 @php
                   $isHifz = $studentProgram->weeklyProgram->dailyPrograms->first()?->type === 'حفظ';
                   $isReview = $studentProgram->weeklyProgram->dailyPrograms->first()?->type === 'مراجعة';
                 @endphp
                 @if($isHifz)
                   <th>إنجاز الحفظ</th>
                 @elseif($isReview)
                   <th>إنجاز المراجعة</th>
                 @endif
               </tr>
             </thead>
             <tbody>
              @foreach($studentProgram->weeklyProgram->dailyPrograms as $day)
                @php
                  $today = \Carbon\Carbon::today();
                  $dayDate = \Carbon\Carbon::parse($day->date); // تأكد من أن لديك عمود "date" في جدول daily_programs
                  $isPast = $dayDate->lt($today);
                  $isTodayOrFuture = $dayDate->gte($today);
                @endphp
            
                <tr>
                  <td>{{ $day->day }}</td>
                  <td>{{ $day->type }}</td>
                  <td>{{ $day->portion_type }}</td>
                  <td>{{ $day->surah }}</td>
                  <td>{{ $day->from_verse }}</td>
                  <td>{{ $day->to_verse }}</td>
                  <td>{{ $day->notes ?? '-' }}</td>
            
                  @if($isHifz || $isReview)  <!-- تعديل هنا لعرض الـ checkbox في الحالتين -->
                    <td>
                      @if($day->achievement?->status)
                        <span class="text-success fw-bold">منجز</span>
                      @elseif($isPast)
                        <span class="text-danger fw-bold">غير منجز</span>
                      @else
                        <input type="checkbox" name="achievements[{{ $day->id }}][status]" value="1">
                        <input type="hidden" name="achievements[{{ $day->id }}][type]" value="{{ $day->type }}">
                      @endif
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
            
             
           </table>
           <div class="text-end px-4 py-2">
             <button type="submit" class="btn text-white" style="background-color: #c37044;">
               حفظ الإنجاز
             </button>
           </div>
         </form>
       </div>
     </div>
   </div>
   @else
   
   @endif
 @endforeach
 



