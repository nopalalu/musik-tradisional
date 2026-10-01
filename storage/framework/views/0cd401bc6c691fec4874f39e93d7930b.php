

<?php $__env->startSection('content'); ?>
    <div class="admin-container">

        <h1 class="admin-title">Dashboard Admin</h1>

        <!-- CARDS -->
        <div class="admin-grid">

            <div class="admin-card">
                <div class="card-icon blue">🎵</div>
                <div>
                    <p class="card-label">Total Alat Musik</p>
                    <h2><?php echo e($totalAlat); ?></h2>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-icon green">🎯</div>
                <div>
                    <p class="card-label">Percobaan Kuis</p>
                    <h2><?php echo e($totalQuiz); ?></h2>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-icon yellow">✅</div>
                <div>
                    <p class="card-label">Jawaban Benar</p>
                    <h2><?php echo e($totalBenar); ?></h2>
                </div>
            </div>

        </div>

        <!-- MENU -->
        <div class="admin-menu">

            <a href="/admin/alat" class="menu-card blue">
                <h3>Kelola Alat Musik</h3>
                <p>Tambah, edit, dan hapus data</p>
            </a>

            <a href="/admin/statistik" class="menu-card green">
                <h3>Statistik Kuis</h3>
                <p>Lihat performa pengguna</p>
            </a>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>