<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'Musik Nusantara'); ?></title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- ✅ BOOTSTRAP (HARUS DULU) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- ✅ CSS LU (HARUS TERAKHIR BIAR MENANG) -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/hero.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/search.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/card.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/map.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/detail.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/quiz-modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/quiz-global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/quiz-result.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/animation.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/tutorial.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pagination.css')); ?>">
</head>

<body>

    <!-- GLOBAL ELEMENT -->
    <div id="tooltip"></div>
    <div id="topLoader"></div>

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- GLOBAL UI -->
    <div id="toast" class="custom-toast"></div>

    <!-- ================= LIBRARY ================= -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js" defer></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>

    <!-- ================= CUSTOM JS ================= -->
    <script src="<?php echo e(asset('assets/js/tooltip.js')); ?>" defer></script>
    <script src="<?php echo e(asset('assets/js/quiz.js')); ?>" defer></script>

    <!-- ================= MAIN ================= -->
    <script type="module" src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <!-- ================= TUTORIAL ================= -->
    <script src="<?php echo e(asset('assets/js/tutorial.js')); ?>" defer></script>
    <!-- ================= MAP ================= -->
    <script src="<?php echo e(asset('assets/js/map.js')); ?>" defer></script>

    <script src="<?php echo e(asset('assets/js/search.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->make('components.tutorial', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\musik-tradisional\resources\views/layouts/app.blade.php ENDPATH**/ ?>