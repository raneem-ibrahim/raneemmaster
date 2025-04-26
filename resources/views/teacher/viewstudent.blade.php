

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
      #studentsTable th {
          white-space: nowrap;
      }
      .badge.bg-warning {
          color: #000;
      }
      .btn-sm {
          padding: 0.25rem 0.5rem;
          font-size: 0.875rem;
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
  </style>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="text-primary">قائمة الطلاب</h2>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <div style="max-width: 300px;">
                    <select id="programFilter" class="form-select">
                        <option value="">🔻اختر البرنامج</option>
                        <option value="نص صفحة">نص صفحة</option>
                        <option value="صفحة">صفحة</option>
                        <option value="صفحتين">صفحتين</option>
                        <option value="لم يحدد برنامج">لم يحدد برنامج</option>
                    </select>
                </div>
    
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text">🔎</span>
                    <input type="text" id="searchInput" class="form-control" placeholder="ابحث عن طالب...">


                

                </div>
            </div>
        </div>
    
        {{-- فورم إنشاء برنامج جماعي --}}
        <form method="POST" action="{{ route('weekly-program.selectStudents') }}">
            @csrf
    
            <table id="studentsTable" class="table table-hover table-striped align-middle text-center" dir="rtl" style="width:100%;">
                <thead class="table-dark text-end" dir="rtl">
                    <tr>
                        <th style="text-align: right;"><input type="checkbox" id="selectAll"></th>
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
                                    نص صفحة
                                @elseif($student->memorizationProgram->program == 'one_page')
                                    صفحة
                                @elseif($student->memorizationProgram->program == 'two_pages')
                                    صفحتين
                                @endif
                            @else
                                <span class="badge bg-warning">لم يحدد برنامج</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            {{-- <a href="#" class="btn btn-info btn-sm">عرض الطالب</a> --}}
                            <a href="{{ route('weekly-program.create.single', $student->id) }}" 
                              class="btn btn-success btn-sm">إنشاء برنامج حفظ</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{-- زر إنشاء برنامج --}}
            <div class="my-3">
                <button type="submit" class="btn btn-primary">إنشاء برنامج للطلاب المحددين</button>
            </div>
        </form>
    </div>
    
    {{-- سكريبت البحث والفلترة واختيار الكل --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const programFilter = document.getElementById('programFilter');
            const tableRows = document.querySelectorAll('#studentsTable tbody tr');
            const selectAll = document.getElementById('selectAll');
    
            function filterTable() {
                const searchValue = searchInput.value.toLowerCase();
                const programValue = programFilter.value;
    
                tableRows.forEach(row => {
                    const nameCell = row.querySelectorAll('td')[1].textContent.toLowerCase();
                    const programCell = row.querySelectorAll('td')[2].textContent.trim();
    
                    const matchesSearch = nameCell.includes(searchValue);
                    const matchesProgram = !programValue || programCell === programValue;
    
                    if (matchesSearch && matchesProgram) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
    
            searchInput.addEventListener('keyup', filterTable);
            programFilter.addEventListener('change', filterTable);
    
            selectAll.addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[name="students[]"]');
                checkboxes.forEach(checkbox => checkbox.checked = selectAll.checked);
            });
        });
    </script>
    
    {{-- سكريبت DataTable بدون تكرار بحث --}}
    <script>
      $(document).ready(function() {
          $('#studentsTable').DataTable({
              dom: '<"top"lf>rt<"bottom"ip>',
              language: {
                  lengthMenu: "عرض _MENU_ طالب",
                  info: "عرض _START_ إلى _END_ من أصل _TOTAL_ طالب",
                  paginate: {
                      next: "التالي",
                      previous: "السابق"
                  },
                  zeroRecords: "لا توجد سجلات متطابقة",
                  search: "_INPUT_",
                  searchPlaceholder: "ابحث عن طالب..."
              },
              searching: false,
              paging: true,
              info: true,
              responsive: true
          });
      });
      </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      // زر التحديد الكلي
      document.getElementById('selectAll').addEventListener('click', function() {
          const checkboxes = document.querySelectorAll('input[name="students[]"]');
          checkboxes.forEach(checkbox => checkbox.checked = this.checked);
      });
  
      // زر إنشاء البرنامج للطلاب المحددين
      document.getElementById('createProgramBtn').addEventListener('click', function(e) {
          const selectedStudents = document.querySelectorAll('input[name="students[]"]:checked');
          
          if (selectedStudents.length === 0) {
              e.preventDefault();
              alert('الرجاء تحديد طالب واحد على الأقل');
              return false;
          }
          
          // يمكنك هنا إضافة أي تحقق إضافي
          return true;
      });
  
      // فلترة الجدول
      const filterTable = function() {
          const searchValue = document.getElementById('searchInput').value.toLowerCase();
          const programValue = document.getElementById('programFilter').value;
          const rows = document.querySelectorAll('#studentsTable tbody tr');
  
          rows.forEach(row => {
              const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
              const program = row.querySelector('td:nth-child(3)').textContent.trim();
              
              const showRow = name.includes(searchValue) && 
                            (programValue === '' || program === programValue);
              
              row.style.display = showRow ? '' : 'none';
          });
      };
  
      document.getElementById('searchInput').addEventListener('keyup', filterTable);
      document.getElementById('programFilter').addEventListener('change', filterTable);
  });
  </script>



<script>
document.getElementById('programForm').addEventListener('submit', function(e) {
  const selected = document.querySelectorAll('input[name="students[]"]:checked:not(:disabled)');
  
  if (selected.length === 0) {
      e.preventDefault();
      Swal.fire({
          icon: 'error',
          title: 'خطأ',
          text: 'يجب اختيار طالب واحد على الأقل ممن حددوا برنامجهم',
          confirmButtonText: 'حسناً'
      });
      return false;
  }

  // تحقق من تناسق البرامج
  const programs = new Set();
  selected.forEach(checkbox => {
      const program = checkbox.closest('tr').querySelector('.student-program').textContent.trim();
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
              e.target.submit();
          }
      });
      return false;
  }
});
    
</script>  
    
    
            
    
    
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