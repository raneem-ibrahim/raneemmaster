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
                                                $programsCount = ['نصف صفحة' => 0, 'صفحة' => 0, 'صفحتين' => 0];
                                                foreach($students as $student) {
                                                    if($student->memorizationProgram) {
                                                        $program = [
                                                            'half_page' => 'نصف صفحة',
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
                                            @foreach(['نصف صفحة', 'صفحة', 'صفحتين'] as $program)
                                                <option value="{{ $program }}" {{ $selectedProgram == $program ? 'selected' : '' }}>
                                                    {{ $program }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="نصف صفحة">نصف صفحة</option>
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
                    <div class="mb-4 text-center">
                        <label for="week_start" class="form-label" style="color: #c37044;">تاريخ بداية الأسبوع</label>
                        <input type="date" name="week_start" class="form-control w-25 mx-auto" required style="border-color: #c37044; background-color: #fff;">
                    </div>
                    
                    <div class="text-center mt-4">
                        @foreach($students as $student)
        <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
    @endforeach
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




{{-- من هون الخيار التاني  --}}




            
    
    
    {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
  </div>
</main>


{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}