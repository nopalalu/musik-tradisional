

<?php $__env->startSection('content'); ?>
    <div class="container">

        <h2 class="mb-3">Hasil Pencarian</h2>

        <p class="text-muted">
            <?php echo e($results->total()); ?> hasil ditemukan
            <?php if($q): ?>
                | Kata kunci: <strong><?php echo e($q); ?></strong>
            <?php endif; ?>
            <?php if($kategori): ?>
                | Kategori: <strong><?php echo e($kategori); ?></strong>
            <?php endif; ?>
        </p>

        <div class="row g-4 mt-4">

            <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <div class="card-custom">
                        <h5><?php echo e($item->nama); ?></h5>

                        <?php if($item->gambar): ?>
                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="img-fluid my-3">
                        <?php endif; ?>

                        <p class="text-muted small">
                            <?php echo e(\Illuminate\Support\Str::limit($item->deskripsi, 90)); ?>

                        </p>

                        <a href="/alat/<?php echo e($item->id); ?>" class="btn btn-primary btn-sm mt-2">
                            Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted text-center mt-4">
                    Data tidak ditemukan
                </p>
            <?php endif; ?>

        </div>

        <div class="d-flex justify-content-center mt-5">
            <?php echo e($results->links('pagination::bootstrap-5')); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/search.blade.php ENDPATH**/ ?>