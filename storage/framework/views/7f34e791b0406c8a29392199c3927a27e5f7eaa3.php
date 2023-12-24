<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.locations')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.locations')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('location.country')); ?></th>
                                        <th><?php echo e(trans('location.district')); ?></th>
                                        <th><?php echo e(trans('location.locality')); ?></th>
                                        <!-- <th><?php echo e(trans('location.sub_locality')); ?></th> -->
                                        <!-- <th><?php echo e(trans('location.pin_code')); ?></th>
                                        <th><?php echo e(trans('location.longitude')); ?></th>
                                        <th><?php echo e(trans('location.latitude')); ?></th> -->
                                        <th>Actions</th>
                                    </tr>
                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e(@$location->country); ?></td>
                                            <td><?php echo e(@$location->district); ?></td>
                                            <td><?php echo e(@$location->locality); ?></td>
                                            <!-- <td><?php echo e(@$location->sub_locality); ?></td> -->
                                            <!-- <td><?php echo e(@$location->pin_code); ?></td>
                                            <td><?php echo e(@$location->longitude); ?></td>
                                            <td><?php echo e(@$location->latitude); ?></td> -->
                                            
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/locations/<?php echo e($location->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/locations/'.$location->id.'/delete', 'deleteConfirmMsg' => trans('update.location_delete_confirm_msg')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($locations->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n1c7f25/public_html/resources/views/admin/locations/lists.blade.php ENDPATH**/ ?>