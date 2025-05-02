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
                    text: "{{ session('success') }}", // رسالة من الجلسة
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
                      <!-- التحقق من صلاحية الأدمن -->
                            <th>العمليات</th>  <!-- إضافة عمود العمليات -->
                       
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
                            <td>{{ $teacher->students_count }}</td> <!-- عرض عدد الطلاب -->
                            <td>
                                من {{ $teacher->min_age ?? '-' }} إلى {{ $teacher->max_age ?? '-' }} سنة
                            </td>
        
                           <!-- التحقق من صلاحية الأدمن -->
                                <td>
                                    <!-- أيقونة التعديل -->
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-secondary btn-sm me-2">
                                        <i class="material-symbols-rounded">edit</i> تعديل
                                    </a>
        
                                    <!-- أيقونة الحذف -->
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
                            <td colspan="7" class="text-center">لا يوجد معلمون حالياً</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <style>
            table tbody tr:hover {
                background-color: #f9f5f0 !important; /* بيج فاتح جداً */
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
                        // إرسال النموذج بعد التأكيد
                        document.getElementById('delete-form-' + teacherId).submit();
                    }
                });
            }
        </script>
        
{{-- Sweet alert --}}
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'تم بنجاح!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'حسنًا',
            confirmButtonColor: '#c37044'
        });
    });
</script>
@endif




         {{-- start footer  --}}
    @include('dashboard.include.footer')
    {{-- end footer  --}}
   </div>
 </main>

 
 
 {{-- start end  --}}
 
 @include('dashboard.include.end')
 {{-- end end  --}}