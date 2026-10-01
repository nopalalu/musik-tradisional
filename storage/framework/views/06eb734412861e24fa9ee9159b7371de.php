

<?php $__env->startSection('content'); ?>
    <!-- LOADER -->
    <div id="pageLoader">
        <div class="container mt-4">
            <div class="row g-4">
                <?php for($i = 0; $i < 3; $i++): ?>
                    <div class="col-12">
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
    </div>

    <!-- REAL CONTENT -->
    <div id="realContent" style="display:none;">

        <?php
            $from = request('from');
            $slug = request('slug');
            $q = request('q');
        ?>

        <?php if($from === 'search'): ?>
            <a href="<?php echo e(url('/search?q=' . urlencode($q))); ?>" class="back-btn" data-no-transition>
                ← Kembali ke hasil pencarian
            </a>
        <?php elseif($from === 'pulau'): ?>
            <a href="<?php echo e(url('/pulau/' . $slug)); ?>" class="back-btn" data-no-transition>
                ← Kembali ke <?php echo e(ucfirst($slug)); ?>

            </a>
        <?php else: ?>
            <a href="<?php echo e(url('/')); ?>" class="back-btn" data-no-transition>
                ← Kembali ke beranda
            </a>
        <?php endif; ?>

        <div class="detail-container">

            <!-- IMAGE -->
            <div class="detail-image fade-up" style="--bg: url('<?php echo e(gambar_alat($alat->gambar ?? null)); ?>')">

                <?php if($alat->gambar): ?>
                    <img id="previewImg" src="<?php echo e(gambar_alat($alat->gambar)); ?>"
                        alt="<?php echo e($alat->nama); ?>" loading="lazy">
                <?php endif; ?>

                <?php if($alat->sumber_gambar): ?>
                    <div class="atribusi-overlay">
                        Sumber:
                        <a href="<?php echo e($alat->sumber_gambar); ?>" target="_blank">
                            <?php echo e($alat->author ?? 'Wikimedia Commons'); ?>

                        </a><br>
                        Lisensi: <?php echo e($alat->license ?? 'Lihat di sumber'); ?>

                    </div>
                <?php endif; ?>

            </div>

            <!-- CONTENT -->
            <div class="detail-content fade-up delay-1">

                <h1><?php echo e($alat->nama); ?></h1>

                <div class="meta">
                    Pulau: <?php echo e($alat->pulau->nama); ?><br>
                    Sumber bunyi: <?php echo e($alat->sumber_bunyi); ?><br>
                    Kategori: <?php echo e($alat->kategori); ?>

                </div>

                <p class="description">
                    <?php echo nl2br(e($alat->deskripsi)); ?>

                </p>

                <?php if($alat->audio): ?>
                    <div class="audio-box">
                        <h3>Dengarkan Suara</h3>
                        <audio controls>
                            <source src="<?php echo e(audio_alat($alat->audio)); ?>" type="audio/mpeg">
                        </audio>
                    </div>
                <?php endif; ?>

                <button id="btnQuiz" class="btn-primary quiz-trigger">
                    Coba Kuis 🎯
                </button>

            </div>

        </div>

        <!-- QUIZ -->
        <div id="quizModal" class="quiz-modal">
            <div class="quiz-card">

                <h3>Kuis Cepat</h3>

                <p>
                    <strong><?php echo e($alat->nama); ?></strong><br>
                    <?php echo e($pertanyaan); ?>

                </p>

                <div class="quiz-options" data-correct="<?php echo e($jawabanBenar); ?>" data-id="<?php echo e($alat->id); ?>"
                    data-tipe="<?php echo e($tipeSoal); ?>">

                    <?php $__currentLoopData = $opsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="quiz-choice" type="button" data-value="<?php echo e($o); ?>">
                            <?php echo e($o); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <p id="quiz-feedback"></p>

                <div class="quiz-actions">
                    <button class="quiz-retry" type="button">Coba Lagi 🔁</button>
                    <button class="quiz-close" type="button">Tutup</button>
                </div>

            </div>
        </div>

        <!-- IMAGE MODAL -->
        <div id="imgModal" class="img-modal">
            <span class="img-close">&times;</span>
            <img class="img-modal-content" id="imgZoom">
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/pages/detail.blade.php ENDPATH**/ ?>