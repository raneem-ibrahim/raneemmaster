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



{{-- <div class="container" dir="rtl">
    <h1 class="text-2xl font-bold mb-6">إنشاء برنامج حفظ ومراجعة للطالب: {{ $student->first_name }}</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('teacher.program.store', $student->id) }}" method="POST" class="space-y-6">
        @csrf

        <div class="mb-4">
            <label for="portion_type" class="block mb-2 font-bold">نوع الحفظ اليومي:</label>
            <select name="portion_type" id="portion_type" class="w-full border rounded p-2">
                <option value="half_page">نصف صفحة</option>
                <option value="one_page">صفحة كاملة</option>
                <option value="two_pages">صفحتين</option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
            @endphp

            @foreach ($days as $index => $day)
                <div class="border rounded p-4 @if($day == 'الجمعة') bg-gray-200 @endif">
                    <h2 class="text-lg font-semibold mb-4">{{ $day }}</h2>

                    @if ($day == 'الجمعة')
                        <p class="text-center text-red-600 font-bold">يوم عطلة</p>
                    @else
                        <div class="mb-2">
                            <label class="block mb-1">اسم السورة:</label>
                            <input type="text" name="daily[{{ $index }}][surah_name]" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1">من الآية:</label>
                            <input type="text" name="daily[{{ $index }}][from_verse]" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1">إلى الآية:</label>
                            <input type="text" name="daily[{{ $index }}][to_verse]" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1">ملاحظات:</label>
                            <textarea name="daily[{{ $index }}][notes]" rows="2" class="w-full border rounded p-2"></textarea>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-6 py-2 rounded">حفظ البرنامج</button>
    </form>
</div> 


<div class="container">
    <h1>إنشاء برنامج أسبوعي</h1>

    <form action="{{ route('weekly-program.store') }}" method="POST">
        @csrf

        @foreach($students as $student)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    {{ $student->first_name }} {{ $student->last_name }}
                </div>

                <div class="card-body">
                    <input type="hidden" name="students[]" value="{{ $student->id }}">

                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>اليوم</th>
                                    <th>النوع</th>
                                    <th>نوع الحفظ</th>
                                    <th>من آية</th>
                                    <th>إلى آية</th>
                                    <th>اسم السورة</th>
                                    <th>ملاحظات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
                                @endphp

                                @foreach($days as $day)
                                    <tr>
                                        <td>{{ $day }}</td>
                                        <td>
                                            <select name="programs[{{ $student->id }}][{{ $day }}][type]" class="form-select" required>
                                                <option value="حفظ">حفظ</option>
                                                <option value="مراجعة">مراجعة</option>
                                                @if($day == 'السبت')
                                                    <option value="سرد">سرد</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select name="programs[{{ $student->id }}][{{ $day }}][portion_type]" class="form-select">
                                                <option value="">-- اختر --</option>
                                                <option value="نصف صفحة">نصف صفحة</option>
                                                <option value="صفحة">صفحة</option>
                                                <option value="صفحتين">صفحتين</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" min="1" name="programs[{{ $student->id }}][{{ $day }}][from_verse]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" min="1" name="programs[{{ $student->id }}][{{ $day }}][to_verse]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="programs[{{ $student->id }}][{{ $day }}][surah_name]" class="form-control">
                                        </td>
                                        <td>
                                            <textarea name="programs[{{ $student->id }}][{{ $day }}][notes]" class="form-control" rows="1"></textarea>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit" class="btn btn-success">حفظ البرنامج</button>
        </div>
    </form>
</div> --}}
























<div class="container py-4">
    <div class="card shadow" style="border: 1px solid #c37044; background-color: #fdf6f0;">
        <div class="card-header text-white" style="background-color: #c37044;">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0" style="color: white; font-family: 'Marhey', sans-serif;">إنشاء برنامج أسبوعي جديد</h3>
                <a href="{{ route('viewstudent') }}" class="btn btn-light btn-sm" style="border: 1px solid #c37044;">
                    <i class="fas fa-arrow-left"></i> رجوع
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="selected-students mb-4 p-3 border rounded bg-light" style="background-color: #fff9f4;">
                <h5 class="text-center mb-3" style="color: #c37044;">الطلاب المختارين</h5>
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    @foreach($students as $student)
                    <div class="student-badge p-2 border rounded d-flex align-items-center" style="background-color: #f5e9dd; border-color: #c37044;">
                        <div class="me-2">
                            <i class="fas fa-user-circle fa-lg" style="color: #c37044;"></i>
                        </div>
                        <div>
                            <strong style="color: #000;">{{ $student->first_name }} {{ $student->last_name }}</strong>
                            <div class="text-muted small">
                                @if($student->memorizationProgram)
                                    @switch($student->memorizationProgram->program)
                                        @case('half_page') نص صفحة يومياً @break
                                        @case('one_page') صفحة يومياً @break
                                        @case('two_pages') صفحتين يومياً @break
                                    @endswitch
                                @else
                                    <span class="text-warning">لم يحدد برنامج</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
  
           <form method="POST" action="{{ route('weekly-program.store') }}">
                @csrf
                
                <div class="text-center mb-4">
                    <button type="button" id="applyToAllBtn" class="btn btn-outline-secondary" style="font-family: 'Marhey', sans-serif; border-color: #c37044; color: #c37044;">
                        <i class="fas fa-copy"></i> تعيين نفس البرنامج للجميع
                    </button>
                </div>
  
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="background-color: #fff9f4;">
                        <thead style="background-color: #f5e9dd; color: #000;">
                            <tr>
                                <th>اليوم</th>
                                <th>نوع الحفظ</th>
                                <th>نوع البرنامج</th>
                                <th>السورة</th>
                                <th>الآيات</th>
                                <th>ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
                            @endphp
  
                            @foreach($days as $day)
                            <tr>
                                <td class="align-middle" style="color: #000;">{{ $day }}</td>
                                <td>
                                    <select name="program[{{ $day }}][type]" class="form-select" required style="border-color: #c37044; background-color: #fff;">
                                        <option value="حفظ">حفظ جديد</option>
                                        <option value="مراجعة">مراجعة</option>
                                        @if($day == 'السبت')
                                            <option value="سرد">سرد</option>
                                        @endif
                                    </select>
                                </td>
                                <td>
                                  <select name="program[{{ $day }}][portion_type]" class="form-select" required style="border-color: #c37044; background-color: #fff;">
                                      @if($students->count() > 0)
                                          @php
                                              $programsCount = ['نص صفحة' => 0, 'صفحة' => 0, 'صفحتين' => 0];
                                              foreach($students as $student) {
                                                  if($student->memorizationProgram) {
                                                      $program = [
                                                          'half_page' => 'نص صفحة',
                                                          'one_page' => 'صفحة',
                                                          'two_pages' => 'صفحتين'
                                                      ][$student->memorizationProgram->program] ?? null;
                                                      if($program) {
                                                          $programsCount[$program]++;
                                                      }
                                                  }
                                              }
                                              $selectedProgram = array_search(max($programsCount), $programsCount);
                                          @endphp
                                          @foreach(['نص صفحة', 'صفحة', 'صفحتين'] as $program)
                                              <option value="{{ $program }}" {{ $selectedProgram == $program ? 'selected' : '' }}>
                                                  {{ $program }}
                                              </option>
                                          @endforeach
                                      @else
                                          <option value="نص صفحة">نص صفحة</option>
                                          <option value="صفحة">صفحة</option>
                                          <option value="صفحتين">صفحتين</option>
                                      @endif
                                  </select>
                                </td>
                                <td>
                                  <select name="program[{{ $day }}][surah]" class="form-control surah-select" required style="border-color: #c37044; background-color: #fff;">
                                      <option value="">اختر السورة</option>
                                      @foreach($surahs as $surah)
                                          <option value="{{ $surah->name }}" data-ayahs="{{ $surah->ayahs_count }}">{{ $surah->name }}</option>
                                      @endforeach
                                  </select>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span>من</span>
                                        <input type="number" name="program[{{ $day }}][from_verse]" class="form-control" min="1" required style="border-color: #c37044; background-color: #fff;">
                                        <span>إلى</span>
                                        <input type="number" name="program[{{ $day }}][to_verse]" class="form-control" min="1" required style="border-color: #c37044; background-color: #fff;">
                                    </div>
                                </td>
                                <td>
                                  <textarea name="program[{{ $day }}][notes]" class="form-control notes-field" rows="1" maxlength="200" style="border-color: #c37044; background-color: #fff;"></textarea>
                                  <small class="text-muted notes-counter">0/200 حرف</small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
  
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5" style="background-color: #c37044; border: none;">
                        <i class="fas fa-save"></i> حفظ البرنامج
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
  
  <style>
    .student-badge {
        min-width: 180px;
    }
    .table th {
        white-space: nowrap;
        font-weight: bold;
    }
    .verses-inputs {
        max-width: 150px;
    }
    select.form-select, input.form-control, textarea.form-control {
        border-radius: 10px;
    }
    .btn-outline-secondary:hover {
        background-color: #c37044;
        color: white;
        border-color: #c37044;
    }
  </style>
  
 {{-- <div class="container py-4">
  <div class="card shadow">
      <div class="card-header bg-primary text-white"  style="background-color: #c37044!important;">
          <div class="d-flex justify-content-between align-items-center">
              <h3 class="mb-0"style="color:white!important;font-family: 'Marhey', sans-serif !important" >إنشاء برنامج أسبوعي جديد</h3>
              <a href="{{ route('viewstudent') }}" class="btn btn-light btn-sm">
                  <i class="fas fa-arrow-left"></i> رجوع
              </a>
          </div>
      </div>
      <div class="card-body">
          <div class="selected-students mb-4 p-3 border rounded bg-light">
              <h5 class="text-center mb-3">الطلاب المختارين</h5>
              <div class="d-flex flex-wrap gap-2 justify-content-center">
                  @foreach($students as $student)
                  <div class="student-badge p-2 border rounded d-flex align-items-center">
                      <div class="me-2">
                          <i class="fas fa-user-circle fa-lg"></i>
                      </div>
                      <div>
                          <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
                          <div class="text-muted small">
                              @if($student->memorizationProgram)
                                  @switch($student->memorizationProgram->program)
                                      @case('half_page') نص صفحة يومياً @break
                                      @case('one_page') صفحة يومياً @break
                                      @case('two_pages') صفحتين يومياً @break
                                  @endswitch
                              @else
                                  <span class="text-warning">لم يحدد برنامج</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>

         <form method="POST" action="{{ route('weekly-program.store') }}">
              @csrf
              
             
              <div class="text-center mb-4" >
                  <button type="button" id="applyToAllBtn" class="btn btn-outline-secondary" style=" font-family: 'Marhey', sans-serif !important;">
                      <i class="fas fa-copy"></i> تعيين نفس البرنامج للجميع
                  </button>
              </div>

              <div class="table-responsive">
                  <table class="table table-bordered text-center">
                      <thead class="table-light">
                          <tr>
                              <th width="15%">اليوم</th>
                              <th width="15%">نوع الحفظ</th>
                              <th width="15%">نوع البرنامج</th>
                              <th width="15%">السورة</th>
                              <th width="20%">الآيات</th>
                              <th width="20%">ملاحظات</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php
                              $days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
                          @endphp

                          @foreach($days as $day)
                          <tr>
                              <td class="align-middle">{{ $day }}</td>
                              <td>
                                  <select name="program[{{ $day }}][type]" class="form-select" required>
                                      <option value="حفظ">حفظ جديد</option>
                                      <option value="مراجعة">مراجعة</option>
                                      @if($day == 'السبت')
                                          <option value="سرد">سرد</option>
                                      @endif
                                  </select>
                              </td>
                              <td>
                                <select name="program[{{ $day }}][portion_type]" class="form-select" required>
                                    @if($students->count() > 0)
                                        @php
                                            $programsCount = [
                                                'نص صفحة' => 0,
                                                'صفحة' => 0,
                                                'صفحتين' => 0
                                            ];
                                            
                                            foreach($students as $student) {
                                                if($student->memorizationProgram) {
                                                    $program = [
                                                        'half_page' => 'نص صفحة',
                                                        'one_page' => 'صفحة',
                                                        'two_pages' => 'صفحتين'
                                                    ][$student->memorizationProgram->program] ?? null;
                                                    
                                                    if($program) {
                                                        $programsCount[$program]++;
                                                    }
                                                }
                                            }
                                            
                                            $selectedProgram = array_search(max($programsCount), $programsCount);
                                        @endphp
                                        
                                        @foreach(['نص صفحة', 'صفحة', 'صفحتين'] as $program)
                                            <option value="{{ $program }}" {{ $selectedProgram == $program ? 'selected' : '' }}>
                                                {{ $program }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="نص صفحة">نص صفحة</option>
                                        <option value="صفحة">صفحة</option>
                                        <option value="صفحتين">صفحتين</option>
                                    @endif
                                </select>
                            </td>
                             
                              <td>
  <select name="program[{{ $day }}][surah]" class="form-control surah-select" required>
    <option value="">اختر السورة</option>
    @foreach($surahs as $surah)
      <option value="{{ $surah->name }}" data-ayahs="{{ $surah->ayahs_count }}">{{ $surah->name }}</option>
    @endforeach
  </select>
</td>
                              <td>
                                  <div class="d-flex align-items-center gap-2">
                                      <span>من</span>
                                      <input type="number" name="program[{{ $day }}][from_verse]" class="form-control" min="1" required>
                                      <span>إلى</span>
                                      <input type="number" name="program[{{ $day }}][to_verse]" class="form-control" min="1" required>
                                  </div>
                              </td>
                              <td>
                                <textarea name="program[{{ $day }}][notes]" class="form-control notes-field" rows="1" maxlength="200"></textarea>
                                <small class="text-muted notes-counter">0/200 حرف</small>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>

              <div class="text-center mt-4">
                  <button type="submit" class="btn btn-success btn-lg px-5">
                      <i class="fas fa-save"></i> حفظ البرنامج
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>

<style>
  .student-badge {
      background-color: #f8f9fa;
      min-width: 180px;
  }
  .table th {
      white-space: nowrap;
  }
  .verses-inputs {
      max-width: 150px;
  }
</style> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // تطبيق نفس البرنامج على كل الأيام
        document.getElementById('applyToAllBtn').addEventListener('click', function() {
            const firstRow = document.querySelector('tbody tr');
            const type = firstRow.querySelector('select[name*="[type]"]').value;
            const portionType = firstRow.querySelector('select[name*="[portion_type]"]').value;
            const surah = firstRow.querySelector('.surah-select').value;
            const fromVerse = firstRow.querySelector('input[name*="[from_verse]"]').value;
            const toVerse = firstRow.querySelector('input[name*="[to_verse]"]').value;
            const notes = firstRow.querySelector('textarea[name*="[notes]"]').value;
            
            document.querySelectorAll('tbody tr').forEach(row => {
                row.querySelector('select[name*="[type]"]').value = type;
                row.querySelector('select[name*="[portion_type]"]').value = portionType;
                
                const surahSelect = row.querySelector('.surah-select');
                surahSelect.value = surah;
                // Trigger change event to update max values
                surahSelect.dispatchEvent(new Event('change'));
                
                row.querySelector('input[name*="[from_verse]"]').value = fromVerse;
                row.querySelector('input[name*="[to_verse]"]').value = toVerse;
                row.querySelector('textarea[name*="[notes]"]').value = notes;
            });
            
            Swal.fire({
                icon: 'success',
                title: 'تم التطبيق',
                text: 'تم تعيين نفس البرنامج لجميع الأيام',
                timer: 1500
            });
        });
    
        // التحكم في اختيار السور والآيات
        document.querySelectorAll('tbody tr').forEach(row => {
            const surahSelect = row.querySelector('.surah-select');
            const fromVerse = row.querySelector('input[name*="[from_verse]"]');
            const toVerse = row.querySelector('input[name*="[to_verse]"]');
            
            surahSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const totalAyahs = selectedOption.getAttribute('data-ayahs');
                
                if (totalAyahs) {
                    fromVerse.max = toVerse.max = totalAyahs;
                    fromVerse.title = toVerse.title = `الحد الأقصى: ${totalAyahs}`;
                    
                    if (parseInt(fromVerse.value) > parseInt(totalAyahs)) {
                        fromVerse.value = 1;
                    }
                    if (parseInt(toVerse.value) > parseInt(totalAyahs)) {
                        toVerse.value = totalAyahs;
                    }
                }
            });
            
            fromVerse.addEventListener('change', function() {
                if (parseInt(this.value) > parseInt(toVerse.value)) {
                    toVerse.value = this.value;
                }
                validateVerseInput(this);
            });
            
            toVerse.addEventListener('change', function() {
                if (parseInt(this.value) < parseInt(fromVerse.value)) {
                    fromVerse.value = this.value;
                }
                validateVerseInput(this);
            });
            
            function validateVerseInput(input) {
                const surahSelect = input.closest('tr').querySelector('.surah-select');
                const selectedOption = surahSelect.options[surahSelect.selectedIndex];
                const totalAyahs = selectedOption?.getAttribute('data-ayahs');
                
                if (totalAyahs && parseInt(input.value) > parseInt(totalAyahs)) {
                    input.value = totalAyahs;
                    Swal.fire({
                        icon: 'warning',
                        title: 'تنبيه',
                        text: `عدد الآيات لا يمكن أن يتجاوز ${totalAyahs} لهذه السورة`,
                        timer: 2000
                    });
                }
            }
        });
    
        // التحقق من صحة النموذج قبل الإرسال
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;
            const errors = [];
    
            document.querySelectorAll('tbody tr').forEach(row => {
                const surah = row.querySelector('.surah-select').value;
                const fromVerse = row.querySelector('input[name*="[from_verse]"]');
                const toVerse = row.querySelector('input[name*="[to_verse]"]');
                const selectedOption = row.querySelector('.surah-select').options[row.querySelector('.surah-select').selectedIndex];
                const totalAyahs = selectedOption?.getAttribute('data-ayahs');
                
                if (!surah) {
                    isValid = false;
                    errors.push(`يجب اختيار سورة لليوم ${row.querySelector('td:first-child').textContent}`);
                }
                
                if (totalAyahs && parseInt(toVerse.value) > parseInt(totalAyahs)) {
                    isValid = false;
                    errors.push(`عدد الآيات يتجاوز الحد المسموح به لسورة ${surah}`);
                }
            });
    
            if (!isValid) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ في البيانات',
                    html: errors.join('<br>'),
                    confirmButtonText: 'حسناً'
                });
            }
        });
    });
    // التحكم في عدد أحرف الملاحظات
document.querySelectorAll('.notes-field').forEach(textarea => {
    const counter = textarea.nextElementSibling;
    
    textarea.addEventListener('input', function() {
        const remaining = 200 - this.value.length;
        counter.textContent = `${this.value.length}/200 حرف`;
        
        if (remaining < 30) {
            counter.classList.add('text-warning');
            counter.classList.remove('text-success');
        } else {
            counter.classList.add('text-success');
            counter.classList.remove('text-warning');
        }
        
        if (remaining <= 0) {
            this.value = this.value.substring(0, 200);
        }
    });
});
</script>
















{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
  // تطبيق نفس البرنامج على كل الأيام
  document.getElementById('applyToAllBtn').addEventListener('click', function() {
      const days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
      
      // الحصول على قيم اليوم الأول
      const firstDay = days[0];
      const type = document.querySelector(`select[name="program[${firstDay}][type]"]`).value;
      const portionType = document.querySelector(`select[name="program[${firstDay}][portion_type]"]`).value;
      const surah = document.querySelector(`input[name="program[${firstDay}][surah]"]`).value;
      const fromVerse = document.querySelector(`input[name="program[${firstDay}][from_verse]"]`).value;
      const toVerse = document.querySelector(`input[name="program[${firstDay}][to_verse]"]`).value;
      const notes = document.querySelector(`textarea[name="program[${firstDay}][notes]"]`).value;
      
      // تطبيق القيم على كل الأيام
      days.forEach(day => {
          document.querySelector(`select[name="program[${day}][type]"]`).value = type;
          document.querySelector(`select[name="program[${day}][portion_type]"]`).value = portionType;
          document.querySelector(`input[name="program[${day}][surah]"]`).value = surah;
          document.querySelector(`input[name="program[${day}][from_verse]"]`).value = fromVerse;
          document.querySelector(`input[name="program[${day}][to_verse]"]`).value = toVerse;
          document.querySelector(`textarea[name="program[${day}][notes]"]`).value = notes;
      });
      
      alert('تم تطبيق نفس البرنامج على كل أيام الأسبوع');
  });
});
</script>  --}}

{{-- للسورة  --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // لكل صف في الجدول
        document.querySelectorAll('tbody tr').forEach(row => {
            const surahSelect = row.querySelector('.surah-select');
            const fromVerseInput = row.querySelector('input[name*="[from_verse]"]');
            const toVerseInput = row.querySelector('input[name*="[to_verse]"]');
            
            // عند تغيير اختيار السورة
            surahSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const totalAyahs = selectedOption.getAttribute('data-ayahs');
                
                if (totalAyahs) {
                    // تحديث الحد الأقصى و title للإظهار
                    fromVerseInput.max = totalAyahs;
                    fromVerseInput.title = `الحد الأقصى: ${totalAyahs}`;
                    toVerseInput.max = totalAyahs;
                    toVerseInput.title = `الحد الأقصى: ${totalAyahs}`;
                    
                    // إعادة تعيين القيم إذا كانت غير صالحة
                    if (parseInt(fromVerseInput.value) > parseInt(totalAyahs)) {
                        fromVerseInput.value = 1;
                    }
                    if (parseInt(toVerseInput.value) > parseInt(totalAyahs)) {
                        toVerseInput.value = totalAyahs;
                    }
                }
            });
            
            // التحقق من أن "من" أصغر من أو يساوي "إلى"
            fromVerseInput.addEventListener('change', function() {
                if (parseInt(this.value) > parseInt(toVerseInput.value)) {
                    toVerseInput.value = this.value;
                }
            });
            
            toVerseInput.addEventListener('change', function() {
                if (parseInt(this.value) < parseInt(fromVerseInput.value)) {
                    fromVerseInput.value = this.value;
                }
            });
        });
        
        // زر تطبيق على الكل
        document.getElementById('applyToAllBtn').addEventListener('click', function() {
            const firstRow = document.querySelector('tbody tr');
            const surahSelects = document.querySelectorAll('.surah-select');
            const fromInputs = document.querySelectorAll('input[name*="[from_verse]"]');
            const toInputs = document.querySelectorAll('input[name*="[to_verse]"]');
            
            const selectedSurah = firstRow.querySelector('.surah-select').value;
            const fromValue = firstRow.querySelector('input[name*="[from_verse]"]').value;
            const toValue = firstRow.querySelector('input[name*="[to_verse]"]').value;
            
            surahSelects.forEach(select => {
                select.value = selectedSurah;
                // Trigger change event to update max values
                const event = new Event('change');
                select.dispatchEvent(event);
            });
            
            fromInputs.forEach(input => {
                input.value = fromValue;
            });
            
            toInputs.forEach(input => {
                input.value = toValue;
            });
        });
    });
    </script> --}}






















{{-- من هون الخيار التاني  --}}


{{-- 
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">إنشاء برنامج أسبوعي جديد</h3>
                <a href="{{ route('viewstudent') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> رجوع
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <div class="selected-students mb-4 p-3 border rounded bg-light">
                <h5 class="text-center mb-3">الطلاب المختارين</h5>
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    @foreach($students as $student)
                    <div class="student-badge p-2 border rounded d-flex align-items-center">
                        <div class="me-2">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </div>
                        <div>
                            <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
                            <div class="text-muted small">
                                @if($student->memorizationProgram)
                                    @switch($student->memorizationProgram->program)
                                        @case('half_page') نص صفحة يومياً @break
                                        @case('one_page') صفحة يومياً @break
                                        @case('two_pages') صفحتين يومياً @break
                                    @endswitch
                                @else
                                    <span class="text-warning">لم يحدد برنامج</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <form method="POST" action="{{ route('weekly-program.store') }}" id="programForm">
                @csrf
                
                @foreach($students as $index => $student)
                    <input type="hidden" name="students[]" value="{{ $student->id }}">
                    
                    <div class="student-program mb-5 p-3 border rounded">
                        <h5 class="text-center mb-3">
                            <i class="fas fa-user"></i> برنامج الطالب: {{ $student->first_name }} {{ $student->last_name }}
                        </h5>
                        
                        @if($index > 0)
                        <div class="text-end mb-3">
                            <button type="button" class="btn btn-sm btn-outline-secondary copy-program-btn" 
                                    data-source="{{ $students[0]->id }}" data-target="{{ $student->id }}">
                                <i class="fas fa-copy"></i> نسخ برنامج الطالب الأول
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th width="15%">اليوم</th>
                                        <th width="15%">نوع الحفظ</th>
                                        <th width="15%">نوع الجزء</th>
                                        <th width="15%">السورة</th>
                                        <th width="20%">الآيات</th>
                                        <th width="20%">ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
                                    @endphp

                                    @foreach($days as $day)
                                    <tr>
                                        <td class="align-middle">{{ $day }}</td>
                                        <td>
                                            <select name="program[{{ $student->id }}][{{ $day }}][type]" class="form-select" required>
                                                <option value="حفظ">حفظ جديد</option>
                                                <option value="مراجعة">مراجعة</option>
                                                @if($day == 'السبت')
                                                    <option value="سرد">سرد</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select name="program[{{ $student->id }}][{{ $day }}][portion_type]" class="form-select" required>
                                                @if($student->memorizationProgram)
                                                    @php
                                                        $program = $student->memorizationProgram->program;
                                                        $selected = [
                                                            'half_page' => 'نص صفحة',
                                                            'one_page' => 'صفحة',
                                                            'two_pages' => 'صفحتين'
                                                        ][$program];
                                                    @endphp
                                                    <option value="{{ $selected }}" selected>{{ $selected }}</option>
                                                @else
                                                    <option value="نص صفحة">نص صفحة</option>
                                                    <option value="صفحة">صفحة</option>
                                                    <option value="صفحتين">صفحتين</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="program[{{ $student->id }}][{{ $day }}][surah]" class="form-control" required>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span>من</span>
                                                <input type="number" name="program[{{ $student->id }}][{{ $day }}][from_verse]" class="form-control" min="1" required>
                                                <span>إلى</span>
                                                <input type="number" name="program[{{ $student->id }}][{{ $day }}][to_verse]" class="form-control" min="1" required>
                                            </div>
                                        </td>
                                        <td>
                                            <textarea name="program[{{ $student->id }}][{{ $day }}][notes]" class="form-control" rows="1"></textarea>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5">
                        <i class="fas fa-save"></i> حفظ البرنامج للطلاب المحددين
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .student-badge {
        background-color: #f8f9fa;
        min-width: 180px;
    }
    .student-program {
        background-color: #f8f9fa;
        margin-bottom: 2rem;
    }
    .table th {
        white-space: nowrap;
    }
    .copy-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // زر نسخ البرنامج من طالب لآخر
    document.querySelectorAll('.copy-program-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const sourceStudentId = this.dataset.source;
            const targetStudentId = this.dataset.target;
            const days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'السبت'];
            
            // جمع بيانات الطالب المصدر
            const programData = {};
            days.forEach(day => {
                programData[day] = {
                    type: document.querySelector(`[name="program[${sourceStudentId}][${day}][type]"]`).value,
                    portion_type: document.querySelector(`[name="program[${sourceStudentId}][${day}][portion_type]"]`).value,
                    surah: document.querySelector(`[name="program[${sourceStudentId}][${day}][surah]"]`).value,
                    from_verse: document.querySelector(`[name="program[${sourceStudentId}][${day}][from_verse]"]`).value,
                    to_verse: document.querySelector(`[name="program[${sourceStudentId}][${day}][to_verse]"]`).value,
                    notes: document.querySelector(`[name="program[${sourceStudentId}][${day}][notes]"]`).value
                };
            });
            
            // تطبيق على الطالب الهدف
            days.forEach(day => {
                document.querySelector(`[name="program[${targetStudentId}][${day}][type]"]`).value = programData[day].type;
                document.querySelector(`[name="program[${targetStudentId}][${day}][portion_type]"]`).value = programData[day].portion_type;
                document.querySelector(`[name="program[${targetStudentId}][${day}][surah]"]`).value = programData[day].surah;
                document.querySelector(`[name="program[${targetStudentId}][${day}][from_verse]"]`).value = programData[day].from_verse;
                document.querySelector(`[name="program[${targetStudentId}][${day}][to_verse]"]`).value = programData[day].to_verse;
                document.querySelector(`[name="program[${targetStudentId}][${day}][notes]"]`).value = programData[day].notes;
            });
            
            // إظهار إشعار
            const notification = document.createElement('div');
            notification.className = 'alert alert-success copy-notification';
            notification.innerHTML = 'تم نسخ البرنامج بنجاح';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => notification.remove(), 500);
            }, 2000);
        });
    });
});
</script> --}}

            
    
    
    {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
  </div>
</main>
{{-- start هاي تبعت السيتنج اذا بدي اياها  --}}

{{-- <div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="material-symbols-rounded py-2">settings</i>
  </a>
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3">
      <div class="float-end">
        <h5 class="mt-3 mb-0">Material UI Configurator</h5>
        <p>See our dashboard options.</p>
      </div>
      <div class="float-start mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
          <i class="material-symbols-rounded">clear</i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-end">
          <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-dark active" data-color="dark" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between different sidenav types.</p>
      </div>
      <div class="d-flex">
        <button class="btn bg-gradient-dark px-3 mb-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
        <button class="btn bg-gradient-dark px-3 mb-2  active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
      </div>
      <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="mt-3 d-flex">
        <h6 class="mb-0">Navbar Fixed</h6>
        <div class="form-check form-switch me-auto my-auto">
          <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
      </div>
      <hr class="horizontal dark my-3">
      <div class="mt-2 d-flex">
        <h6 class="mb-0">Light / Dark</h6>
        <div class="form-check form-switch me-auto my-auto">
          <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
      </div>
      <hr class="horizontal dark my-sm-4">
      <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
      <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
      <div class="w-100 text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a>
      </div>
    </div>
  </div>
</div> --}}

{{-- end  --}}


{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}