<div class="card mb-3">
    <div class="card-header">
        <h6>أسبوع: {{ $program->week_start_date->format('Y-m-d') }}</h6>
        <small>المعلم: {{ $program->teacher->name }}</small>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tr>
                <td>{{ $daily->day_name }}</td>
                <td>{{ $daily->surah->name }}</td>
                <td>{{ $daily->from_verse }} - {{ $daily->to_verse }}</td>
                <td>{{ $daily->portion_type }}</td>
                <td>{{ $daily->date->format('Y-m-d') }}</td>
            </tr>
        </table>
    </div>
</div>