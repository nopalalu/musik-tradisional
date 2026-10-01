

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">

        <h1>Statistik Kuis</h1>

        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <h4><?php echo e($total); ?></h4>
                    <small>Total Percobaan</small>
                </div>
            </div>
        </div>

        <p>Jawaban Benar: <?php echo e($benar); ?></p>
        <p>Jawaban Salah: <?php echo e($salah); ?></p>
        <p>Akurasi Global: <?php echo e($akurasi); ?>%</p>

        <hr>

        <h2>Statistik Soal: Kategori</h2>

        <table border="1" cellpadding="10">
            <tr>
                <th>Kategori</th>
                <th>Total</th>
                <th>Benar</th>
                <th>Akurasi (%)</th>
            </tr>

            <?php $__currentLoopData = $perKategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($k->kategori); ?></td>
                    <td><?php echo e($k->total); ?></td>
                    <td><?php echo e($k->benar); ?></td>
                    <td>
                        <?php echo e($k->total > 0 ? round(($k->benar / $k->total) * 100, 2) : 0); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

        <canvas id="kategoriChart" height="100"></canvas>

        <hr>

        <h2>Statistik Soal: Sumber Bunyi</h2>

        <table border="1" cellpadding="10">
            <tr>
                <th>Sumber Bunyi</th>
                <th>Total</th>
                <th>Benar</th>
                <th>Akurasi (%)</th>
            </tr>

            <?php $__currentLoopData = $perSumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($s->sumber_bunyi); ?></td>
                    <td><?php echo e($s->total); ?></td>
                    <td><?php echo e($s->benar); ?></td>
                    <td>
                        <?php echo e($s->total > 0 ? round(($s->benar / $s->total) * 100, 2) : 0); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

        <canvas id="sumberChart" height="100"></canvas>
        <div class="admin-grid mb-4">

            <div class="admin-card">
                <p>Total Percobaan</p>
                <h2><?php echo e($total); ?></h2>
            </div>

            <div class="admin-card">
                <p>Akurasi</p>
                <h2><?php echo e($akurasi); ?>%</h2>
            </div>

            <div class="admin-card">
                <p>Salah</p>
                <h2><?php echo e($salah); ?></h2>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const kategoriData = <?php echo json_encode($perKategori, 15, 512) ?>;
            const kategoriLabels = kategoriData.map(k => k.kategori);
            const kategoriAccuracy = kategoriData.map(k =>
                k.total > 0 ? ((k.benar / k.total) * 100).toFixed(2) : 0
            );

            new Chart(document.getElementById('kategoriChart'), {
                type: 'bar',
                data: {
                    labels: kategoriLabels,
                    datasets: [{
                        label: 'Akurasi (%)',
                        data: kategoriAccuracy
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });

            const sumberData = <?php echo json_encode($perSumber, 15, 512) ?>;
            const sumberLabels = sumberData.map(s => s.sumber_bunyi);
            const sumberAccuracy = sumberData.map(s =>
                s.total > 0 ? ((s.benar / s.total) * 100).toFixed(2) : 0
            );

            new Chart(document.getElementById('sumberChart'), {
                type: 'bar',
                data: {
                    labels: sumberLabels,
                    datasets: [{
                        label: 'Akurasi (%)',
                        data: sumberAccuracy
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/admin/statistik.blade.php ENDPATH**/ ?>