

<?php $__env->startSection('content'); ?>
    <h2>Edit Alat Musik</h2>

    <form action="/admin/alat/<?php echo e($alat->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <input type="text" name="nama" value="<?php echo e($alat->nama); ?>"><br><br>

        <!-- PULAU -->
        <select name="pulau_id">
            <?php $__currentLoopData = $pulau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($p->id); ?>" <?php echo e($alat->pulau_id == $p->id ? 'selected' : ''); ?>>
                    <?php echo e($p->nama); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br><br>

        <!-- KATEGORI -->
        <select name="kategori">
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($alat->kategori == $k ? 'selected' : ''); ?>>
                    <?php echo e($k); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br><br>

        <!-- SUMBER BUNYI -->
        <select name="sumber_bunyi">
            <?php $__currentLoopData = $sumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($s); ?>" <?php echo e($alat->sumber_bunyi == $s ? 'selected' : ''); ?>>
                    <?php echo e($s); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br><br>

        <input type="file" name="gambar"><br><br>
        <input type="file" name="audio"><br><br>

        <textarea name="deskripsi"><?php echo e($alat->deskripsi); ?></textarea><br><br>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/admin/alat/edit.blade.php ENDPATH**/ ?>