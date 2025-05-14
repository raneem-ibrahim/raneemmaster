

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
            background-color: #f5f0e6; /* بيج خفيف */
            color: #000; /* أسود للنصوص */
            font-family: 'Cairo', sans-serif; /* خط عربي جميل */
        }
    
        #studentsTable th, #studentsTable td {
            white-space: nowrap;
            vertical-align: middle;
            text-align: center;
        }
    
        #studentsTable thead {
            background-color: #000000; /* ذهبي */
            color: #fff;
        }
    
        #studentsTable tbody tr {
            transition: background 0.3s ease;
        }
    
        #studentsTable tbody tr:hover {
            background-color: #f1e1d2; /* بيج أفتح عند المرور */
        }
    
        .badge.text-warning {
            color: #c37044 !important;
            background-color: transparent;
            font-weight: bold;
        }
    
        .btn-sm {
            padding: 0.3rem 0.6rem;
            font-size: 0.85rem;
        }
    
        .btn-success {
            background-color: #c37044 !important;
            border: none;
        }
    
        .btn-success:hover {
            background-color: #a15830 !important;
        }
    
        .btn-primary {
            background-color: #c37044 !important;
            border: none;
        }
    
        .btn-primary:hover {
            background-color: #a15830 !important;
        }
    
        select.form-select, input.form-control {
            background-color: #fff;
            border: 1px solid #c37044;
            color: #000;
        }
    
        .input-group-text {
            background-color: #c37044;
            color: #fff;
            border: 1px solid #c37044;
        }
    
        input[type="checkbox"]:disabled + label {
            opacity: 0.5;
            cursor: not-allowed;
        }
    
        [title] {
            position: relative;
        }
    
        [title]:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #333;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 100;
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
    
    </style>


@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'نجاح',
                text: '{{ session('success') }}',
                confirmButtonText: 'حسناً'
            });
        });
    </script>
@endif
    
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="text-primary">قائمة الطلاب</h2>
    
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <div style="max-width: 300px;">
                    <select id="programFilter" class="form-select">
                        <option value="">اختر البرنامج</option>
                        <option value="نصف صفحة">نصف صفحة</option>
                        <option value="صفحة">صفحة</option>
                        <option value="صفحتين">صفحتين</option>
                        <option value="لم يحدد برنامج">لم يحدد برنامج</option>
                    </select>
                </div>
    
                 <div class="input-group" style="max-width: 300px;">
                    {{-- <span class="input-group-text">🔎</span> --}}
                    <input type="text" id="searchInput" class="form-control" placeholder="ابحث عن طالب...">
                 </div>
             </div>
         </div>
    
        <form method="POST" action="{{ route('weekly-program.selectStudents') }}" id="studentsForm">
            @csrf
    
            <table id="studentsTable" class="table table-hover table-striped align-middle text-center" dir="rtl" style="width:100%;">
                <thead dir="rtl">
                    <tr>
                        <th style="text-align: right;">
                            <input type="checkbox" id="selectAll" title="تحديد جميع الطلاب المرئيين">
                        </th>
                        <th style="text-align: right;">اسم الطالب</th>
                        <th style="text-align: right;">البرنامج المختار</th>
                        <th style="text-align: right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <input type="checkbox" name="students[]" value="{{ $student->id }}"
                            @if(!$student->memorizationProgram) disabled title="هذا الطالب لم يحدد برنامج حفظ" @endif>
                        </td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>
                            @if($student->memorizationProgram)
                                @if($student->memorizationProgram->program == 'half_page')
                                    نصف صفحة
                                @elseif($student->memorizationProgram->program == 'one_page')
                                    صفحة
                                @elseif($student->memorizationProgram->program == 'two_pages')
                                    صفحتين
                                @endif
                            @else
                                <span class="badge text-warning">لم يحدد برنامج</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ route('weekly-program.selectStudents') }}" class="btn btn-sm btn-success" title="إنشاء برنامج حفظ">
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div class="my-3 text-center">
                <button type="submit" class="btn btn-primary">
                    إنشاء برنامج للطلاب المحددين
                </button>
            </div>
        </form>
    </div>
    
    {{-- <script>
      document.addEventListener('DOMContentLoaded', function() {
          const searchInput = document.getElementById('searchInput');
          const programFilter = document.getElementById('programFilter');
          const table = document.getElementById('studentsTable');
          const selectAll = document.getElementById('selectAll');
          const form = document.querySelector('form');
          
          function filterTable() {
              const searchValue = searchInput.value.toLowerCase();
              const programValue = programFilter.value;
              let anyVisible = false;
      
              document.querySelectorAll('#studentsTable tbody tr').forEach(row => {
                  const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                  const program = row.querySelector('td:nth-child(3)').textContent.trim();
                  
                  const matchesSearch = name.includes(searchValue);
                  const matchesProgram = !programValue || 
                                       (programValue === 'لم يحدد برنامج' ? program === 'لم يحدد برنامج' : program === programValue);
                  
                  if (matchesSearch && matchesProgram) {
                      row.style.display = '';
                      anyVisible = true;
                  } else {
                      row.style.display = 'none';
                      row.querySelector('input[type="checkbox"]').checked = false;
                  }
              });
              
              updateSelectAllCheckbox();
              
              if (!anyVisible) {
                  const noResults = document.getElementById('noResults');
                  if (!noResults) {
                      const tr = document.createElement('tr');
                      tr.id = 'noResults';
                      tr.innerHTML = `<td colspan="4" class="text-center py-4">لا توجد نتائج مطابقة</td>`;
                      table.querySelector('tbody').appendChild(tr);
                  }
              } else {
                  const noResults = document.getElementById('noResults');
                  if (noResults) noResults.remove();
              }
          }
      
          function updateSelectAllCheckbox() {
              const visibleCheckboxes = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:not(:disabled)'
              );
              const checkedVisible = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:checked:not(:disabled)'
              );
              
              if (visibleCheckboxes.length === 0) {
                  selectAll.checked = false;
                  selectAll.indeterminate = false;
                  selectAll.disabled = true;
              } else {
                  selectAll.disabled = false;
                  if (checkedVisible.length === visibleCheckboxes.length) {
                      selectAll.checked = true;
                      selectAll.indeterminate = false;
                  } else if (checkedVisible.length > 0) {
                      selectAll.checked = false;
                      selectAll.indeterminate = true;
                  } else {
                      selectAll.checked = false;
                      selectAll.indeterminate = false;
                  }
              }
          }
      
          searchInput.addEventListener('input', filterTable);
          programFilter.addEventListener('change', filterTable);
          
          selectAll.addEventListener('click', function() {
              const isChecked = this.checked;
              document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:not(:disabled)'
              ).forEach(checkbox => {
                  checkbox.checked = isChecked;
              });
          });
          
          table.addEventListener('change', function(e) {
              if (e.target.matches('input[name="students[]"]')) {
                  updateSelectAllCheckbox();
              }
          });
      
          form.addEventListener('submit', function(e) {
              const selectedStudents = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:checked:not(:disabled)'
              );
              
              if (selectedStudents.length === 0 && e.target.closest('#submitStudentsForm')) {
    e.preventDefault();
    Swal.fire({
        icon: 'error',
        title: 'خطأ',
        text: 'الرجاء تحديد طالب واحد على الأقل من القائمة المرئية',
        confirmButtonText: 'حسناً'
    });
    return false;
}
              
              const programs = new Set();
              selectedStudents.forEach(checkbox => {
                  const program = checkbox.closest('tr').querySelector('td:nth-child(3)').textContent.trim();
                  programs.add(program);
              });
      
              if (programs.size > 1) {
                  e.preventDefault();
                  Swal.fire({
                      icon: 'warning',
                      title: 'تنبيه',
                      html: 'الطلاب المحددون لديهم برامج مختلفة.<br>هل تريد المتابعة؟',
                      showCancelButton: true,
                      confirmButtonText: 'نعم، المتابعة',
                      cancelButtonText: 'إلغاء'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          form.submit();
                      }
                  });
                  return false;
              }
          });
      
          filterTable();
      });
      
      if (typeof $.fn.DataTable === 'function') {
          $('#studentsTable').DataTable().destroy();
      }
      </script> --}}
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
      document.addEventListener('DOMContentLoaded', function() {
          const searchInput = document.getElementById('searchInput');
          const programFilter = document.getElementById('programFilter');
          const table = document.getElementById('studentsTable');
          const selectAll = document.getElementById('selectAll');
          const form = document.getElementById('studentsForm');
          
          function filterTable() {
              const searchValue = searchInput.value.toLowerCase();
              const programValue = programFilter.value;
              let anyVisible = false;
      
              document.querySelectorAll('#studentsTable tbody tr').forEach(row => {
                  const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                  const program = row.querySelector('td:nth-child(3)').textContent.trim();
                  
                  const matchesSearch = name.includes(searchValue);
                  const matchesProgram = !programValue || 
                                       (programValue === 'لم يحدد برنامج' ? program === 'لم يحدد برنامج' : program === programValue);
                  
                  if (matchesSearch && matchesProgram) {
                      row.style.display = '';
                      anyVisible = true;
                  } else {
                      row.style.display = 'none';
                      row.querySelector('input[type="checkbox"]').checked = false;
                  }
              });
              
              updateSelectAllCheckbox();
              
              if (!anyVisible) {
                  const noResults = document.getElementById('noResults');
                  if (!noResults) {
                      const tr = document.createElement('tr');
                      tr.id = 'noResults';
                      tr.innerHTML = `<td colspan="4" class="text-center py-4">لا توجد نتائج مطابقة</td>`;
                      table.querySelector('tbody').appendChild(tr);
                  }
              } else {
                  const noResults = document.getElementById('noResults');
                  if (noResults) noResults.remove();
              }
          }
      
          function updateSelectAllCheckbox() {
              const visibleCheckboxes = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:not(:disabled)'
              );
              const checkedVisible = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:checked:not(:disabled)'
              );
              
              if (visibleCheckboxes.length === 0) {
                  selectAll.checked = false;
                  selectAll.indeterminate = false;
                  selectAll.disabled = true;
              } else {
                  selectAll.disabled = false;
                  if (checkedVisible.length === visibleCheckboxes.length) {
                      selectAll.checked = true;
                      selectAll.indeterminate = false;
                  } else if (checkedVisible.length > 0) {
                      selectAll.checked = false;
                      selectAll.indeterminate = true;
                  } else {
                      selectAll.checked = false;
                      selectAll.indeterminate = false;
                  }
              }
          }
      
          searchInput.addEventListener('input', filterTable);
          programFilter.addEventListener('change', filterTable);
          
          selectAll.addEventListener('click', function() {
              const isChecked = this.checked;
              document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:not(:disabled)'
              ).forEach(checkbox => {
                  checkbox.checked = isChecked;
              });
          });
          
          table.addEventListener('change', function(e) {
              if (e.target.matches('input[name="students[]"]')) {
                  updateSelectAllCheckbox();
              }
          });
      
          form.addEventListener('submit', function(e) {
              const selectedStudents = document.querySelectorAll(
                  '#studentsTable tbody tr:not([style*="display: none"]) input[name="students[]"]:checked:not(:disabled)'
              );
              
              // التحقق من وجود طلاب محددين
              if (selectedStudents.length === 0) {
                  e.preventDefault();
                  Swal.fire({
                      icon: 'error',
                      title: 'خطأ',
                      text: 'الرجاء تحديد طالب واحد على الأقل من القائمة المرئية',
                      confirmButtonText: 'حسناً'
                  });
                  return false;
              }
              
              // التحقق من اختلاف البرامج
              const programs = new Set();
              selectedStudents.forEach(checkbox => {
                  const program = checkbox.closest('tr').querySelector('td:nth-child(3)').textContent.trim();
                  programs.add(program);
              });
      
              if (programs.size > 1) {
                  e.preventDefault();
                  Swal.fire({
                      icon: 'warning',
                      title: 'تنبيه',
                      html: 'الطلاب المحددون لديهم برامج مختلفة.<br>هل تريد المتابعة؟',
                      showCancelButton: true,
                      confirmButtonText: 'نعم، المتابعة',
                      cancelButtonText: 'إلغاء'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          form.submit();
                      }
                  });
                  return false;
              }
          });
      
          filterTable();
      });
      
      if (typeof $.fn.DataTable === 'function') {
          $('#studentsTable').DataTable().destroy();
      }
      </script>
    
    
    
            
    
    
    {{-- start footer  --}}
    {{-- @include('dashboard.include.footer') --}}
     {{-- end footer  --}}
  </div>
</main>



{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}