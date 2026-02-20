<?php $__env->startSection('content'); ?>
    <section class="card">
        <div class="toolbar">
            <div>
                <h1 class="page-title" style="margin:0;">Verifikasi Relawan</h1>
                <p class="muted" style="margin:0.4rem 0 0;">Daftar pendaftaran relawan untuk proses review admin.</p>
            </div>
            <form method="GET" action="<?php echo e(route('admin.relawans.index')); ?>" style="display:flex; gap:0.5rem; align-items:center; flex-wrap:wrap;">
                <label for="status" class="muted">Filter status</label>
                <select id="status" name="status">
                    <option value="">Semua</option>
                    <option value="pending" <?php if($statusFilter === 'pending'): echo 'selected'; endif; ?>>Pending</option>
                    <option value="approved" <?php if($statusFilter === 'approved'): echo 'selected'; endif; ?>>Approved</option>
                    <option value="rejected" <?php if($statusFilter === 'rejected'): echo 'selected'; endif; ?>>Rejected</option>
                </select>
                <button type="submit" class="btn btn-outline">
                    Terapkan
                </button>
            </form>
        </div>

        <?php if($relawans->isEmpty()): ?>
            <p class="muted">Belum ada data relawan.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Area Tugas</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Kontak Publik</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $relawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($relawan->nama); ?></td>
                                <td><?php echo e($relawan->nik); ?></td>
                                <td><?php echo e($relawan->area_tugas); ?></td>
                                <td><span class="pill" style="text-transform:capitalize;"><?php echo e($relawan->status); ?></span></td>
                                <td><?php echo e($relawan->is_active ? 'Ya' : 'Tidak'); ?></td>
                                <td><?php echo e($relawan->is_public_contact ? 'Ya' : 'Tidak'); ?></td>
                                <td><?php echo e($relawan->files_count); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.relawans.show', $relawan)); ?>" class="btn btn-outline">Lihat Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top:1rem;">
                <?php echo e($relawans->links()); ?>

            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\bnpb\resources\views/admin/relawans/index.blade.php ENDPATH**/ ?>