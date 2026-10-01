

<?php $__env->startSection('content'); ?>
    <div class="hero">
        <div class="hero-content">

            
            <h1 class="hero-title">
                Alat Musik Tradisional Indonesia
            </h1>

            
            <p class="hero-subtitle">
                Jelajahi budaya Nusantara secara interaktif
            </p>

            
            <div class="quiz-cta">

                
                <?php
                    $raw = session('explored_count', 0);
                    $count = min($raw, 3);
                ?>

                <div class="quiz-info">
                    <?php if($raw >= 3): ?>
                        ✅ Target tercapai
                    <?php else: ?>
                        🎯 <?php echo e($count); ?>/3 eksplor
                    <?php endif; ?>
                </div>

                <div class="quiz-progress-bar">
                    <div class="quiz-progress-fill" style="width: <?php echo e(($count / 3) * 100); ?>%">
                    </div>
                </div>

                
                <?php if(session('explored_count', 0) < 3): ?>
                    <button id="quizLocked" class="btn-quiz-hero locked">
                        🎮 Mulai Kuis
                    </button>

                    <p class="quiz-note">
                        🔒 Eksplor minimal 3 alat musik dulu
                    </p>
                <?php else: ?>
                    <a href="/quiz-global" class="btn-quiz-hero">
                        🎮 Mulai Kuis
                    </a>
                <?php endif; ?>

            </div>

            
            <div class="search-section">
                <div class="search-wrapper">
                    <?php if (isset($component)) { $__componentOriginal2ce1ea087e0510c66fba14e209f96469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ce1ea087e0510c66fba14e209f96469 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-box','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ce1ea087e0510c66fba14e209f96469)): ?>
<?php $attributes = $__attributesOriginal2ce1ea087e0510c66fba14e209f96469; ?>
<?php unset($__attributesOriginal2ce1ea087e0510c66fba14e209f96469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ce1ea087e0510c66fba14e209f96469)): ?>
<?php $component = $__componentOriginal2ce1ea087e0510c66fba14e209f96469; ?>
<?php unset($__componentOriginal2ce1ea087e0510c66fba14e209f96469); ?>
<?php endif; ?>
                </div>
            </div>

        </div>

        
        <div id="searchResults" class="row g-4 mt-4"></div>
    </div>


    <div class="container container-custom">

        
        <h2 class="section-title reveal">Pilih Pulau</h2>

        <div class="reveal">
            <?php echo $__env->make('partials.map', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <h2 class="section-title reveal">Rekomendasi Alat Musik</h2>

        <div class="row g-4">
            <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 reveal">
                    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['item' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/pages/home.blade.php ENDPATH**/ ?>