

<?php $__env->startSection('content'); ?>
    <div class="quiz-page quiz-main">

        
        <div class="quiz-card">

            
            <div class="quiz-top">

                <div class="quiz-timer">
                    ⏱ <span id="quizTimer">10</span> detik
                </div>

                <div class="timer-bar">
                    <div id="timerProgress"></div>
                </div>

                <div class="quiz-meta">
                    <span>Soal <span id="currentStep">1</span> / <span id="totalStep">10</span></span>
                    <span class="quiz-sub">Gas terus 🔥</span>
                </div>

            </div>

            
            <div class="quiz-content split-layout">

                
                <div class="quiz-left">
                    <div id="quizImage"></div>
                </div>

                
                <div class="quiz-right">

                    <h2 id="question">Loading...</h2>

                    <div id="options"></div>

                    
                    <div id="quizLoading" class="quiz-loading">
                        <div class="loading-bar"></div>
                        <span>Menyiapkan soal berikutnya...</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/quiz-global.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/quiz/global.blade.php ENDPATH**/ ?>