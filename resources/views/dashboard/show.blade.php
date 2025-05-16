

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
 

{{-- هاي لسيكشن الي يظهر فيه الرسالة  --}}

    <div class="container mt-4">
        <h3 class="mb-4">تفاصيل الرسالة</h3>
        <div class="card p-4">
            <p><strong>الاسم:</strong> {{ $message->full_name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $message->email }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $message->phone }}</p>
            <p><strong>الرسالة:</strong></p>
            <div class="border p-3 rounded bg-light">
                {{ $message->message }}
            </div>
            <hr>
<h4 class="mt-4">الرد على الرسالة</h4>
<form action="" method="POST">
    @csrf
    <input type="hidden" name="email" value="{{ $message->email }}">
    <input type="hidden" name="name" value="{{ $message->full_name }}">

    <div class="mb-3">
        <label for="reply" class="form-label">نص الرد</label>
        <textarea name="reply" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-success" style="background-color: #c3825e">إرسال الرد</button>
</form>

            <a href="{{ url('dash') }}" class="btn btn-primary mt-3" style="background-color: #000000">الرجوع للوحة التحكم</a>
        </div>
    </div>









   
  </div>
</main>



{{-- end  --}}


{{-- start end  --}}

@include('dashboard.include.end')
{{-- end end  --}}