

<?php $__env->startSection('content'); ?>
    <div class="hero">
        <h1 class="hero-title">Alat Musik Tradisional Indonesia</h1>
        <p class="hero-subtitle">
            Jelajahi kekayaan budaya Nusantara secara interaktif.
        </p>

        <div class="search-container">

            <form action="<?php echo e(route('search')); ?>" method="GET" class="search-box" id="searchForm">

                <input type="text" name="q" id="searchInput" placeholder="Cari alat musik..."
                    value="<?php echo e(request('q')); ?>">

                <input type="hidden" name="kategori" id="kategoriInput" value="<?php echo e(request('kategori')); ?>">

                <button type="submit">Cari</button>
            </form>

            <div class="kategori-chip">
                <?php
                    $kategoriList = ['Semua', 'Petik', 'Pukul', 'Tiup', 'Gesek', 'Goyang'];
                ?>

                <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button"
                        class="<?php echo e(request('kategori') == $kat || ($kat == 'Semua' && !request('kategori')) ? 'active' : ''); ?>"
                        onclick="setKategori('<?php echo e($kat == 'Semua' ? '' : $kat); ?>')">
                        <?php echo e($kat); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>


    <div class="container">

        <h2 class="section-title reveal">Pilih Pulau</h2>

        <div class="reveal">
            <?php echo $__env->make('partials.map', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <h2 class="section-title reveal">Rekomendasi Alat Musik</h2>

        <div class="row g-4">
            <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 reveal">
                    <div class="card p-3">
                        <h5><?php echo e($item->nama); ?></h5>

                        <?php if($item->gambar): ?>
                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="img-fluid mb-3">
                        <?php endif; ?>

                        <p class="text-muted small">
                            <?php echo e(\Illuminate\Support\Str::limit($item->deskripsi, 80)); ?>

                        </p>

                        <a href="/alat/<?php echo e($item->id); ?>" class="btn btn-primary btn-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/home.blade.php ENDPATH**/ ?>