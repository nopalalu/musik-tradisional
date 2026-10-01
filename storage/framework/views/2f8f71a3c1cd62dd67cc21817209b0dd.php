

<?php $__env->startSection('content'); ?>
    <?php if(session('explored_count', 0) < 3): ?>
        <script>
            window.location.href = "/";
        </script>
    <?php endif; ?>
    <div class="quiz-page quiz-result">
        <div class="quiz-card">

            <h2 class="result-title">Quiz selesai 🎉</h2>

            <div id="score" class="score"></div>

            <p id="resultText" class="result-text"></p>

            <p id="percentText" class="percent-text"></p>

            <div class="result-divider"></div>

            <div class="quiz-actions">
                <a href="/quiz-global" class="btn-primary">Ulangi Quiz</a>
                <a href="/" class="back-home">Kembali ke Home</a>
            </div>

            <button id="toggleReview" class="btn-secondary">
                Lihat Review Jawaban
            </button>

            <div id="reviewContainer"></div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/quiz-result.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/quiz/result.blade.php ENDPATH**/ ?>