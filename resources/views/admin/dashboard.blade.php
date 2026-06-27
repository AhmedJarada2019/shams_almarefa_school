@extends('admin.layout.master')

@section('page_title', 'لوحة التحكم')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-custom bg-warning"><div class="card-body"><h6>الدورات</h6><h3>{{ $coursesCount }}</h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom bg-success"><div class="card-body"><h6>المقالات</h6><h3>{{ $postsCount }}</h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom  bg-info"><div class="card-body"><h6>الوسائط</h6><h3>{{ $mediaCount }}</h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom  bg-danger"><div class="card-body"><h6>رسائل غير مقروءة</h6><h3>{{ $unreadMessages }}</h3></div></div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h5 class="mb-0">إحصائيات الموقع</h5>
            </div>
            <div class="card-body">
                <canvas id="dashboardChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('dashboardChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'الدورات',
            'المقالات',
            'الوسائط',
            'الرسائل غير المقروءة'
        ],
        datasets: [{
            label: 'الإحصائيات',
            data: [
                {{ $coursesCount }},
                {{ $postsCount }},
                {{ $mediaCount }},
                {{ $unreadMessages }}
            ],
           backgroundColor: [
                '#ffa800', // warning
                '#1bc5bd', // success
                '#8950fc', // info
                '#dc3545'  // danger
            ],
            borderColor: [
                '#ffc107',
                '#198754',
                '#0dcaf0',
                '#dc3545'
            ],
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
