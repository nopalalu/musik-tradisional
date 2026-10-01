

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(url('/pulau/' . $alat->pulau->nama)); ?>" class="back-btn">
        ← Kembali ke <?php echo e($alat->pulau->nama); ?>

    </a>

    <div class="detail-container">

        <div class="detail-image">
            <?php if($alat->gambar): ?>
                <img src="<?php echo e(asset('storage/' . $alat->gambar)); ?>" alt="<?php echo e($alat->nama); ?>">
            <?php endif; ?>
        </div>

        <div class="detail-content">

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
                        <source src="<?php echo e(asset('storage/' . $alat->audio)); ?>" type="audio/mpeg">
                    </audio>
                </div>
            <?php endif; ?>

            <!-- ===== MODAL KUIS ===== -->
            <button id="btnQuiz" class="btn-primary quiz-trigger">
                Coba Kuis 🎯
            </button>

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

                    <p id="scoreBox">Skor: <?php echo e(session('score', 0)); ?></p>

                    <div class="quiz-actions">
                        <button class="quiz-retry" type="button">
                            Coba Lagi 🔁
                        </button>
                        <button class="quiz-close" type="button">
                            Tutup
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/detail.blade.php ENDPATH**/ ?>