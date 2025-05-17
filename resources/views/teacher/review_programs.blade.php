

@include('dashboard.include.top')
@include('dashboard.include.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    @include('dashboard.include.nav')

    @foreach ($programs as $program)
    <div class="mb-5">
        <style>
            /* نفس التنسيق كما في ملف الحفظ */
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
            h4.text-primary {
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

        <h4 class="text-primary">جدول الأسبوع ابتداءً من: {{ \Carbon\Carbon::parse($program->week_start)->format('Y-m-d') }}</h4>

        <table id="lessonsTable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>اليوم</th>
                    <th>التاريخ</th>
                    <th>النوع</th>
                    <th>نوع الجزء</th>
                    <th>السورة</th>
                    <th>من الآية</th>
                    <th>إلى الآية</th>
                    <th>ملاحظات</th>
                    <th>تعديل</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program->days as $day)
                    <tr>
                        <td>{{ $day->day }}</td>
                        <td>{{ $day->date }}</td>
                        <td>{{ $day->type }}</td>
                        <td>{{ $day->portion_type }}</td>
                        <td>{{ $day->surah }}</td>
                        <td>{{ $day->from_verse }}</td>
                        <td>{{ $day->to_verse }}</td>
                        <td>{{ $day->notes }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editDayModal{{ $day->id }}">تعديل</button>

                            <!-- Modal -->
                            <div class="modal fade" id="editDayModal{{ $day->id }}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content border border-dark-subtle">
                                  <form action="{{ route('teacher.day.update', $day->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header bg-light border-bottom">
                                      <h5 class="modal-title"> تعديل اليوم - <strong>{{ $day->day }}</strong></h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row g-3">

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold"> التاريخ</label>
                                          <input type="date" name="date" class="form-control border border-secondary" value="{{ $day->date }}">
                                        </div>

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold"> النوع</label>
                                          <select name="type" class="form-select border border-secondary">
                                            <option value="حفظ" {{ $day->type == 'حفظ' ? 'selected' : '' }}>حفظ</option>
                                            <option value="مراجعة" {{ $day->type == 'مراجعة' ? 'selected' : '' }}>مراجعة</option>
                                            <option value="سرد" {{ $day->type == 'سرد' ? 'selected' : '' }}>سرد</option>
                                          </select>
                                        </div>

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold"> نوع الجزء</label>
                                          <input type="text" name="portion_type" class="form-control border border-secondary" value="{{ $day->portion_type }}" placeholder="صفحة / نصف صفحة / صفحتين">
                                        </div>

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold"> السورة</label>
                                          <input type="text" name="surah" class="form-control border border-secondary" value="{{ $day->surah }}" placeholder="مثال: البقرة">
                                        </div>

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold">من الآية</label>
                                          <input type="number" name="from_verse" class="form-control border border-secondary" value="{{ $day->from_verse }}">
                                        </div>

                                        <div class="col-md-6">
                                          <label class="form-label fw-bold">إلى الآية</label>
                                          <input type="number" name="to_verse" class="form-control border border-secondary" value="{{ $day->to_verse }}">
                                        </div>

                                        <div class="col-md-12">
                                          <label class="form-label fw-bold"> ملاحظات</label>
                                          <textarea name="notes" rows="3" class="form-control border border-secondary" placeholder="أي ملاحظات إضافية...">{{ $day->notes }}</textarea>
                                        </div>

                                      </div>
                                    </div>

                                    <div class="modal-footer border-top">
                                      <button type="submit" class="btn" style="background-color:  #c37044 ; color: white;"> حفظ
                              </form>
                            </div>
                          </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $programs->links('vendor.pagination.custom') }}
</div>
</div>
@endforeach
</main>
@include('dashboard.include.end')