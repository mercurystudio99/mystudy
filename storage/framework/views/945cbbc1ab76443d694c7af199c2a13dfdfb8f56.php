<?php $__env->startPush('styles_top'); ?>
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($location) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('admin/main.location')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/locations"><?php echo e(trans('admin/main.locations')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($location) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/locations/<?php echo e(!empty($location) ? $location->id.'/update' : 'store'); ?>"
                                  method="Post">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_country')); ?></label>
                                    <input type="text" name="country"
                                           class="form-control  <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->country : old('country')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_country')); ?>"/>
                                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_district')); ?></label>
                                    <input type="text" name="district"
                                           class="form-control  <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->district : old('district')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_district')); ?>"/>
                                    <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_locality')); ?></label>
                                    <input type="text" name="locality"
                                           class="form-control  <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->locality : old('locality')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_locality')); ?>"/>
                                    <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_sub_locality')); ?></label>
                                    <input type="text" name="sub_locality"
                                           class="form-control  <?php $__errorArgs = ['sub_locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->sub_locality : old('sub_locality')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_sub_locality')); ?>"/>
                                    <?php $__errorArgs = ['sub_locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_pincode')); ?></label>
                                    <input type="text" name="pin_code"
                                           class="form-control  <?php $__errorArgs = ['pin_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->pin_code : old('pin_code')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_pincode')); ?>"/>
                                    <?php $__errorArgs = ['pin_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_longitude')); ?></label>
                                    <input type="number" name="longitude"
                                           class="form-control  <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->longitude : old('longitude')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_longitude')); ?>"/>
                                    <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('/admin/main.location_latitude')); ?></label>
                                    <input type="number" name="latitude"
                                           class="form-control  <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($location) ? $location->latitude : old('latitude')); ?>"
                                           placeholder="<?php echo e(trans('admin/main.choose_latitude')); ?>"/>
                                    <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div> -->

                                <div class="text-right mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                </div>
                            </form>

                            <li class="form-group main-row list-group d-none">
                                <div class="p-2 border rounded-sm">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text cursor-pointer move-icon">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                        </div>

                                        <input type="text" name="sub_categories[record][title]"
                                               class="form-control w-auto flex-grow-1"
                                               placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                        <div class="input-group-append">
                                            <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>

                                    <div class="input-group mt-1">
                                        <input type="text" name="sub_categories[record][slug]"
                                               class="form-control w-auto flex-grow-1"
                                               placeholder="<?php echo e(trans('admin/main.choose_url')); ?>"/>
                                    </div>

                                    <div class="input-group mt-1">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager " data-input="icon_record" data-preview="holder">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="sub_categories[record][icon]" id="icon_record" class="form-control" placeholder="<?php echo e(trans('admin/main.icon')); ?>"/>
                                    </div>
                                </div>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n1c7f25/public_html/resources/views/admin/locations/create.blade.php ENDPATH**/ ?>