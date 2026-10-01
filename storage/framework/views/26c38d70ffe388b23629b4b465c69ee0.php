<?php use Illuminate\Support\Str; ?>



<?php $__env->startSection('content'); ?>
    <div class="container">

        <h1 class="title-page">
            Alat Musik - <?php echo e($pulau->nama); ?>

        </h1>

        <!-- SKELETON -->
        <div id="pageLoader" class="mt-4">
            <div class="row g-4">
                <?php for($i = 0; $i < 6; $i++): ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <?php if (isset($component)) { $__componentOriginalfd3a6f8f1730f577643b0c9e9ee5a212 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd3a6f8f1730f577643b0c9e9ee5a212 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.skeleton-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('skeleton-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd3a6f8f1730f577643b0c9e9ee5a212)): ?>
<?php $attributes = $__attributesOriginalfd3a6f8f1730f577643b0c9e9ee5a212; ?>
<?php unset($__attributesOriginalfd3a6f8f1730f577643b0c9e9ee5a212); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd3a6f8f1730f577643b0c9e9ee5a212)): ?>
<?php $component = $__componentOriginalfd3a6f8f1730f577643b0c9e9ee5a212; ?>
<?php unset($__componentOriginalfd3a6f8f1730f577643b0c9e9ee5a212); ?>
<?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- CONTENT -->
        <div id="realContent" class="mt-4" style="display:none;">
            <div class="row g-4">

                <?php $__currentLoopData = $alat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="card-custom">
                            <div class="card-img-wrapper">
                                <?php if($item->gambar): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="card-body">
                                <h5><?php echo e($item->nama); ?></h5>
                                <p><?php echo e(Str::limit($item->deskripsi, 90)); ?></p>

                                <a href="/alat/<?php echo e($item->id); ?>" class="btn btn-primary btn-sm">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/pulau.blade.php ENDPATH**/ ?>