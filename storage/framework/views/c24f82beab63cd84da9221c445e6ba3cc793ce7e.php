<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>


<section class="mt-20">
    <h2 class="section-title after-line"><?php echo e(trans('public.message_to_reviewer')); ?></h2>
    <div class="row">
        <div class="col-12">
            <div class="form-group mt-15">
                <textarea name="message_for_reviewer" rows="10" class="form-control"><?php echo e((!empty($webinar) and $webinar->message_for_reviewer) ? $webinar->message_for_reviewer : old('message_for_reviewer')); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group mt-10">
                <div class="d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="rulesSwitch"><?php echo e(trans('public.agree_rules')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="rules" class="custom-control-input " id="rulesSwitch">
                        <label class="custom-control-label" for="rulesSwitch"></label>
                    </div>
                </div>

                <?php $__errorArgs = ['rules'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger mt-10">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function () {
        var old_session = $('#old_session').val();
        // Check if the selected value of #course_type is NOT equal to 'session'
        if (old_session !== 'session') {
            $('.session_fields').addClass('d-none');
            $('.toggle-class').prop('disabled', false).css('pointer-events', 'auto');

            // $('.toggle-class').removeAttr('style', 'display: none !important');
        } else {
            // If the selected value is 'session', remove the d-none class to show #session_fields
            $('.session_fields').removeClass('d-none');
            $('.toggle-class').prop('disabled', true).css('pointer-events', 'none');

            // $('.toggle-class').attr('style', 'display: none !important');
        }

    // Trigger the change event on #course_type when the document is ready
    $('#course_type').trigger('change');
});
</script><?php /**PATH /home/n1c7f25/public_html/resources/views/web/default/panel/webinar/create_includes/step_8.blade.php ENDPATH**/ ?>