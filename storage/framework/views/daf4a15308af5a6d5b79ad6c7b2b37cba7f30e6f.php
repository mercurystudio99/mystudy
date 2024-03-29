<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title">My Addresses</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/download-sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bundle_sales_count')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <!-- <h2 class="section-title">My Subjects</h2> -->
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Address</th>
                <!-- <th scope="col">Code</th>
                <th scope="col">Sub Locality</th> -->
                <th scope="col">Locality</th>
                <th scope="col">District</th>
                <th scope="col">Country</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <td scope="col">Actions</td>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e(@$record->address1); ?></td>
                    <!-- <td><?php echo e(@$record->pincode->pin_code); ?></td>
                    <td><?php echo e(@$record->sublocality->sub_locality); ?></td> -->
                    <td><?php echo e(@$record->country->locality); ?></td>
                    <td><?php echo e(@$record->country->district); ?></td>
                    <td><?php echo e(@$record->country->country); ?></td>
                    <td><?php echo e(@$record->created_at); ?></td>
                    <td><?php echo e(@$record->updated_at); ?></td>
                    <td class="text-right align-middle">
                        <div class="btn-group dropdown table-actions">
                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical" height="20"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="/panel/addresses/<?php echo e($record->id); ?>/edit" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.edit')); ?></a>
                                <a href="/panel/addresses/<?php echo e($record->id); ?>/delete" class="delete-action webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

            <div class="my-30">
                
            </div>

            <div class="d-none" id="noticeboardMessageModal">
        <div class="text-center">
            <h3 class="modal-title font-16 font-weight-bold text-dark-blue"></h3>
            <span class="modal-time d-block font-12 text-gray mt-15"></span>
            <p class="modal-message font-weight-500 text-gray mt-2"></p>
        </div>
    </div>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/panel/noticeboard.min.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n1c7f25/public_html/resources/views/web/default/panel/addresses/index.blade.php ENDPATH**/ ?>