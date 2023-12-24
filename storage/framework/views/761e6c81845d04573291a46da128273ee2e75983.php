<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Sublevels</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item">Sublevels</div>
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
                                        <th>Title</th>
                                        <th>Level</th>
                                        <th>Enabled</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php $__currentLoopData = $sub_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td class="text-left"><?php echo e(@$sub_level->title); ?></td>
                                            <td><?php echo e(@$sub_level->level->title); ?></td>
                                            <td><?php echo e(@$sub_level->status); ?></td>
                                            
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/sublevels/<?php echo e($sub_level->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/sublevels/'.$sub_level->id.'/delete', 'deleteConfirmMsg' => trans('update.sub_level_delete_confirm_msg')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($sub_levels->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n1c7f25/public_html/resources/views/admin/sub-levels/lists.blade.php ENDPATH**/ ?>