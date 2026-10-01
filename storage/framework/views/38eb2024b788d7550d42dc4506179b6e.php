

<?php $__env->startSection('content'); ?>
    <h1>Data Alat Musik</h1>
    <div class="card-form">

        <h2>Tambah Alat Musik</h2>

        <form action="/admin/alat" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label>Nama Alat</label>
                <input type="text" name="nama">
            </div>

            <div class="form-group">
                <label>Pulau</label>
                <select name="pulau_id">
                    <?php $__currentLoopData = $pulau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k); ?>"><?php echo e($k); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label>Sumber Bunyi</label>
                <select name="sumber_bunyi">
                    <?php $__currentLoopData = $sumber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($s); ?>"><?php echo e($s); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label>Gambar</label>

                <label class="custom-file">
                    Pilih Gambar
                    <input type="file" name="gambar" onchange="previewImage(event)">
                </label>

                <img id="preview" class="img-preview">
            </div>

            <div class="form-group">
                <label>Audio</label>
                <input type="file" name="audio">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"></textarea>
            </div>

            <button class="btn-save">Tambah</button>

        </form>
    </div>

    <hr>

    <form method="GET" action="/admin/alat" onsubmit="saveScroll()" style="margin-bottom:20px;">
        <input type="text" name="search" placeholder="Cari alat musik..." value="<?php echo e(request('search')); ?>">

        <button class="btn-cari" type="submit">Cari</button>
    </form>

    <table class="table-modern">
        <tr>
            <th>Nama</th>
            <th>Pulau</th>
            <th>Kategori</th>
            <th>Sumber Bunyi</th>
            <th>Gambar</th>
            <th>Audio</th>
            <th>Aksi</th>
        </tr>

        <?php $__currentLoopData = $alat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->nama); ?></td>
                <td><?php echo e($item->pulau->nama ?? '-'); ?></td>
                <td><?php echo e($item->kategori); ?></td>
                <td><?php echo e($item->sumber_bunyi); ?></td>

                <td>
                    <?php if($item->gambar): ?>
                        <img src="<?php echo e(gambar_alat($item->gambar)); ?>" class="img-preview" loading="lazy">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>

                <td>
                    <?php if($item->audio): ?>
                        <audio controls width="150">
                            <source src="<?php echo e(asset('assets/audio/alat-musik/' . $item->audio)); ?>" type="audio/mpeg">
                        </audio>
                    <?php endif; ?>
                </td>

                <td class="action-cell">

                    <a href="/admin/alat/<?php echo e($item->id); ?>/edit" class="btn-edit">
                        Edit
                    </a>

                    <form action="/admin/alat/<?php echo e($item->id); ?>" method="POST" onsubmit="return confirm('Yakin hapus?')"
                        style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-delete">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($alat->links('pagination::bootstrap-5')); ?>

    </div>
<?php $__env->startSection('scripts'); ?>
    <script>
        function previewImage(event) {
            const img = document.getElementById('preview');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php if(session('success')): ?>
    <div class="toast show">
        ✔ <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(20px)';
            }
        }, 2500);
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/admin/alat/index.blade.php ENDPATH**/ ?>