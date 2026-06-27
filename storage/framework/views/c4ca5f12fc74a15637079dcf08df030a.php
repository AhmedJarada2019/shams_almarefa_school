<?php $__env->startSection('page_title', 'لوحة التحكم'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-custom bg-warning"><div class="card-body"><h6>الدورات</h6><h3><?php echo e($coursesCount); ?></h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom bg-success"><div class="card-body"><h6>المقالات</h6><h3><?php echo e($postsCount); ?></h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom  bg-info"><div class="card-body"><h6>الوسائط</h6><h3><?php echo e($mediaCount); ?></h3></div></div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-custom  bg-danger"><div class="card-body"><h6>رسائل غير مقروءة</h6><h3><?php echo e($unreadMessages); ?></h3></div></div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
                <?php echo e($coursesCount); ?>,
                <?php echo e($postsCount); ?>,
                <?php echo e($mediaCount); ?>,
                <?php echo e($unreadMessages); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>