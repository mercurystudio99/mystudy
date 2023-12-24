<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>
<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('public.chapters')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button type="button" class="js-add-chapter btn btn-primary btn-sm mt-15" data-webinar-id="<?php echo e($webinar->id); ?>"><?php echo e(trans('public.new_chapter')); ?></button>

    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<?php if($webinar->isWebinar()): ?>
    <div id="newSessionForm" class="d-none">
        <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.session',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>

<div id="newFileForm" class="d-none">
    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.file',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if(getFeaturesSettings('new_interactive_file')): ?>
    <div id="newInteractiveFileForm" class="d-none">
        <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.new_interactive_file',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>


<div id="newTextLessonForm" class="d-none">
    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.text-lesson',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div id="newQuizForm" class="d-none">
    <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.quiz',['webinar' => $webinar, 'quizInfo' => null, 'webinarChapterPages' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if(getFeaturesSettings('webinar_assignment_status')): ?>
    <div id="newAssignmentForm" class="d-none">
        <?php echo $__env->make('web.default.panel.webinar.create_includes.accordions.assignment',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>

<?php echo $__env->make('web.default.panel.webinar.create_includes.chapter_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.default.panel.webinar.create_includes.change_chapter_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script>
        var requestFailedLang = '<?php echo e(trans('public.request_failed')); ?>';
        var thisLiveHasEndedLang = '<?php echo e(trans('update.this_live_has_been_ended')); ?>';
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var quizzesSectionLang = '<?php echo e(trans('quiz.quizzes_section')); ?>';
    </script>

    <script src="/assets/default/js/panel/quiz.min.js"></script>
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
</script><?php /**PATH /home/n1c7f25/public_html/resources/views/web/default/panel/webinar/create_includes/step_4.blade.php ENDPATH**/ ?>