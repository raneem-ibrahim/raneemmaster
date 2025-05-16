@include('dashboard.include.top')
@include('dashboard.include.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    @include('dashboard.include.nav')

    <div class="container py-4">
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
        <h2 class="text-primary mb-4">طلابي المسجلين</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">إضافة طالب</button>

        <table id="lessonsTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم الكامل</th>
                    <th>العمر</th>
                    <th>رقم الهاتف</th>
                    <th>البريد الإلكتروني</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editStudentModal"
                                    data-id="{{ $student->id }}"
                                    data-first_name="{{ $student->first_name }}"
                                    data-last_name="{{ $student->last_name }}"
                                    data-email="{{ $student->email }}"
                                    data-phone="{{ $student->phone }}"
                                    data-age="{{ $student->age }}">
                                تعديل
                            </button>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:  #c37044 ; color: white;">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">لا يوجد طلاب بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

{{-- مودال الإضافة --}}
<div class="modal fade" id="addStudentModal" tabindex="-1">
  <div class="modal-dialog">
    <form action="{{ route('students.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">إضافة طالب</h5>
        </div>
        <div class="modal-body">
          <input name="first_name" class="form-control mb-2" placeholder="الاسم الأول" required>
          
          <input name="last_name" class="form-control mb-2" placeholder="الاسم الأخير" required>
          
          <input name="age" type="number" class="form-control mb-2" placeholder="العمر" min="1" max="100" required>
          
          <input name="phone" class="form-control mb-2" placeholder="رقم الهاتف"
                 pattern="^07[0-9]{8}$" title="يجب أن يبدأ برقم 07 ويتكون من 10 أرقام">
          
          <input name="email" type="email" class="form-control mb-2" placeholder="البريد الإلكتروني"
                 pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="أدخل بريد إلكتروني صحيح" required>
          
          <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">حفظ</button>
        </div>
      </div>
    </form>
  </div>
</div>


{{-- مودال التعديل --}}
<div class="modal fade" id="editStudentModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="editStudentForm" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تعديل طالب</h5>
        </div>
        <div class="modal-body">
          <input name="first_name" id="editFirstName" class="form-control mb-2"
                 placeholder="الاسم الأول" required>

          <input name="last_name" id="editLastName" class="form-control mb-2"
                 placeholder="الاسم الأخير" required>

          <input name="age" type="number" id="editAge" class="form-control mb-2"
                 placeholder="العمر" min="1" max="100" required>

          <input name="phone" id="editPhone" class="form-control mb-2"
                 placeholder="رقم الهاتف" pattern="^07[0-9]{8}$"
                 title="يجب أن يبدأ برقم 07 ويتكون من 10 أرقام">

          <input name="email" id="editEmail" type="email" class="form-control"
                 placeholder="البريد الإلكتروني"
                 pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                 title="أدخل بريد إلكتروني صحيح" required>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">تحديث</button>
        </div>
      </div>
    </form>
  </div>
</div>


{{-- سكربت التعديل + sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editStudentModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        document.getElementById('editStudentForm').action = '/teacher/students/' + id;
        document.getElementById('editFirstName').value = button.getAttribute('data-first_name');
        document.getElementById('editLastName').value = button.getAttribute('data-last_name');
        document.getElementById('editAge').value = button.getAttribute('data-age');
        document.getElementById('editPhone').value = button.getAttribute('data-phone');
        document.getElementById('editEmail').value = button.getAttribute('data-email');
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لا يمكنك التراجع بعد الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#c37044',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        });
    });
});
</script>

@include('dashboard.include.end')
