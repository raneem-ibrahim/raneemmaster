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
      @if (session('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: 'نجاح!',
          text: "{{ session('success') }}",
          confirmButtonColor: '#c37044',
        });
      </script>
      @endif

      <h2 class="mb-4" style="color: #c37044;">قائمة المعلمين</h2>

      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>الصورة</th>
            <th>الاسم الكامل</th>
            <th>البريد الإلكتروني</th>
            <th>العمر</th>
            <th>الجندر</th>
            <th>عدد الطلاب</th>
            <th>الفئة العمرية التي يدرّسها</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          @forelse($teachers as $teacher)
          <tr>
            <td>
              @if($teacher->image)
              <img src="{{ asset('storage/' . $teacher->image) }}" alt="صورة المعلم" width="60" height="60" class="rounded-circle">
              @else
              <span class="text-muted">لا توجد صورة</span>
              @endif
            </td>
            <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->age }}</td>
            <td>{{ $teacher->gender === 'male' ? 'ذكر' : 'أنثى' }}</td>
            <td>{{ $teacher->students_count }}</td>
            <td>
              من {{ $teacher->min_age ?? '-' }} إلى {{ $teacher->max_age ?? '-' }} سنة
            </td>
            <td>
              <button class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editTeacherModal"
                onclick="fillEditForm({{ $teacher->id }}, '{{ $teacher->first_name }}', '{{ $teacher->last_name }}', '{{ $teacher->email }}', '{{ $teacher->age }}', '{{ $teacher->gender }}', '{{ $teacher->min_age }}', '{{ $teacher->max_age }}', '{{ asset('storage/' . $teacher->image) }}')">
                <i class="material-symbols-rounded">edit</i> تعديل
              </button>

              <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $teacher->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $teacher->id }})">
                  <i class="material-symbols-rounded">delete</i> حذف
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center">لا يوجد معلمون حالياً</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <style>
      table tbody tr:hover {
        background-color: #f9f5f0 !important;
        cursor: pointer;
      }
    </style>

    <script>
      function confirmDelete(teacherId) {
        Swal.fire({
          title: 'هل أنت متأكد؟',
          text: "لا يمكنك التراجع عن هذا التغيير!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#c37044',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم،!',
          cancelButtonText: 'إلغاء'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('delete-form-' + teacherId).submit();
          }
        });
      }

      function fillEditForm(id, first_name, last_name, email, age, gender, min_age, max_age, image_url) {
        document.getElementById('editForm').action = '/teachers/' + id;
        document.getElementById('edit_first_name').value = first_name;
        document.getElementById('edit_last_name').value = last_name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_age').value = age;
        document.getElementById('edit_gender').value = gender;
        document.getElementById('edit_min_age').value = min_age;
        document.getElementById('edit_max_age').value = max_age;
        document.getElementById('edit_current_image').src = image_url;
      }
    </script>

    {{-- المودال لتعديل المعلم --}}
    <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editTeacherModalLabel">تعديل بيانات المعلم</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
          </div>
          <div class="modal-body">
            <form method="POST" id="editForm" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <div class="col">
                  <label for="edit_first_name" class="form-label">الاسم الأول</label>
                  <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                </div>
                <div class="col">
                  <label for="edit_last_name" class="form-label">الاسم الأخير</label>
                  <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="edit_email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="edit_email" name="email" required>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label for="edit_age" class="form-label">العمر</label>
                  <input type="number" class="form-control" id="edit_age" name="age" min="18" required>
                </div>
                <div class="col">
                  <label for="edit_gender" class="form-label">الجنس</label>
                  <select class="form-select" id="edit_gender" name="gender" required>
                    <option value="male">ذكر</option>
                    <option value="female">أنثى</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label for="edit_min_age" class="form-label">الحد الأدنى للعمر</label>
                  <input type="number" class="form-control" id="edit_min_age" name="min_age" min="1">
                </div>
                <div class="col">
                  <label for="edit_max_age" class="form-label">الحد الأقصى للعمر</label>
                  <input type="number" class="form-control" id="edit_max_age" name="max_age" min="1">
                </div>
              </div>

              <div class="mb-3">
                <label for="edit_image" class="form-label">الصورة الشخصية</label>
                <input type="file" class="form-control" id="edit_image" name="image">
                <div class="mt-2">
                  <img id="edit_current_image" src="" alt="صورة المعلم الحالية" width="80" class="rounded">
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary" style="background-color: #c37044; border-color: #c37044;">حفظ التغييرات</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- start footer --}}
    @include('dashboard.include.footer')
    {{-- end footer --}}
  </div>
</main>

{{-- start end --}}
@include('dashboard.include.end')
{{-- end end --}}
