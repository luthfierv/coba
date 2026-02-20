<?php $__env->startSection('content'); ?>
    <section class="card" style="margin-bottom:1rem;">
        <div class="toolbar">
            <div>
                <h1 class="page-title" style="margin:0;">Manajemen Artikel</h1>
                <p class="muted" style="margin:0.4rem 0 0;">Kelola artikel edukasi bencana dengan status draft atau publish.</p>
            </div>
            <a href="<?php echo e(route('admin.artikels.create')); ?>" class="btn btn-primary">
                Tambah Artikel
            </a>
        </div>
    </section>

    <section class="card">
        <?php if($artikels->isEmpty()): ?>
            <p class="muted" style="margin:0;">Belum ada artikel.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($artikel->judul); ?></td>
                                <td><?php echo e($artikel->slug); ?></td>
                                <td><span class="pill"><?php echo e($artikel->status); ?></span></td>
                                <td><?php echo e($artikel->published_at?->format('d-m-Y H:i') ?? '-'); ?></td>
                                <td>
                                    <div style="display:flex; gap:0.6rem; flex-wrap:wrap;">
                                        <a href="<?php echo e(route('admin.artikels.edit', $artikel)); ?>" class="btn btn-outline">Edit</a>
                                        <a href="<?php echo e(route('admin.artikels.show', $artikel)); ?>" class="btn btn-outline">Lihat</a>
                                        <form action="<?php echo e(route('admin.artikels.destroy', $artikel)); ?>" method="POST" onsubmit="return confirm('Hapus artikel ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="margin-top:1rem;">
                <?php echo e($artikels->links()); ?>

            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\bnpb\resources\views/admin/artikels/index.blade.php ENDPATH**/ ?>