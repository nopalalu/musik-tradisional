<?php
    use Illuminate\Support\Str;

    $url = '/alat/' . $item->id;

    if (request()->routeIs('pulau.*') || request()->segment(1) === 'pulau') {
        $url .= '?from=pulau&slug=' . request()->segment(2);
    }

    if (request()->has('q') && request()->segment(1) === 'search') {
        $query = request('q');
        $url .= '?from=search&q=' . urlencode($query);
    }
?>

<div class="card-custom">
    <div class="card-img-wrapper">

        <img src="<?php echo e($item->gambar ? gambar_alat($item->gambar) : asset('assets/img/default.png')); ?>"
            alt="<?php echo e($item->nama); ?>" loading="lazy">

    </div>

    <div class="card-body">
        <h5><?php echo e($item->nama); ?></h5>

        <p class="card-desc">
            <?php echo e(Str::limit($item->deskripsi, 40)); ?>

        </p>

        <a href="<?php echo e(url($url)); ?>" class="btn-detail">
            Lihat Detail →
        </a>
    </div>
</div>
<?php /**PATH C:\laragon\www\musik-tradisional\resources\views/components/card.blade.php ENDPATH**/ ?>