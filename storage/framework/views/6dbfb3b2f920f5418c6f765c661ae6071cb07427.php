

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Abonnements Conducteurs</h3>
                </div>
                <div class="card-body">

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Valider un paiement</h5>
                        </div>
                        <div class="card-body">
                            <form action="/subscriptions/store" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Conducteur</label>
                                            <select name="driver_id" class="form-control" required>
                                                <option value="">-- Choisir --</option>
                                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($driver->id); ?>">
                                                        <?php echo e($driver->user->name); ?> - <?php echo e($driver->user->mobile); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="subscription_type" class="form-control" required>
                                                <option value="weekly">Hebdomadaire</option>
                                                <option value="monthly">Mensuel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Montant (FCFA)</label>
                                            <input type="number" name="paid_amount" class="form-control" placeholder="2000" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Référence Orange Money</label>
                                            <input type="text" name="transaction_id" class="form-control" placeholder="OM-XXXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-success btn-block">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Conducteur</th>
                                <th>Téléphone</th>
                                <th>Type</th>
                                <th>Montant</th>
                                <th>Référence</th>
                                <th>Expiration</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($sub->driver->user->name ?? '-'); ?></td>
                                <td><?php echo e($sub->driver->user->mobile ?? '-'); ?></td>
                                <td><?php echo e($sub->subscription_type == 'weekly' ? 'Hebdomadaire' : 'Mensuel'); ?></td>
                                <td><?php echo e(number_format($sub->paid_amount)); ?> FCFA</td>
                                <td><?php echo e($sub->transaction_id); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($sub->expired_at)->format('d/m/Y')); ?></td>
                                <td>
                                    <?php if($sub->active && \Carbon\Carbon::parse($sub->expired_at)->isFuture()): ?>
                                        <span class="badge badge-success">Actif</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Expiré</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="/subscriptions/suspend/<?php echo e($sub->driver_id); ?>" method="POST" style="display:inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-warning"
                                            onclick="return confirm('Suspendre ce conducteur ?')">
                                            Suspendre
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center">Aucun abonnement trouvé</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <?php echo e($subscriptions->links()); ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/subscriptions/index.blade.php ENDPATH**/ ?>