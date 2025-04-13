 <div class="container py-5">
    <div class="card shadow-lg rounded-4 p-4">
        <h2 class="mb-4 text-center text-primary">تفاصيل الرسالة</h2>
        <div class="mb-3">
            <strong>الاسم:</strong> {{ $contact->full_name }}
        </div>
        <div class="mb-3">
            <strong>البريد الإلكتروني:</strong> {{ $contact->email }}
        </div>
        <div class="mb-3">
            <strong>الموضوع:</strong> {{ $contact->phone }}
        </div>
        <div class="mb-3">
            <strong>الرسالة:</strong>
            <p class="border rounded p-3 bg-light">{{ $contact->message }}</p>
        </div>
        <a href="{{ url('dash') }}" class="btn btn-outline-primary mt-3">العودة للوحة التحكم</a>
        
        <!-- إضافة خيار الرد -->
        <div class="mt-4">
            <h4 class="text-primary">الرد على الرسالة</h4>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="response" class="form-label">ردك على الرسالة</label>
                    <textarea id="response" name="response" class="form-control" rows="4" placeholder="اكتب ردك هنا"></textarea>
                </div>
                <button type="submit" class="btn btn-success">إرسال الرد</button>
            </form>
        </div>
    </div>
</div> 


