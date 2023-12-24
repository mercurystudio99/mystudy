<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="section-body">
        <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="/panel/what-to-teach/<?php echo e(!empty($record) ? $record->id.'/update' : 'store'); ?>"
                      method="Post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
        <label>Banner</label>
        <input type="file" class="form-control <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="loadFile(event)" id="fileUpload" name="banner" accept="image/*">
        <?php if(isset($record->banner) && $record->banner != null): ?>
            <img src="<?php echo e(asset('images/' . $record->banner)); ?>" alt="Uploaded Image" id="image-preview" style="width: 30%;">
        <?php else: ?>
            <img id="image-preview" style="width: 30%;">
        <?php endif; ?>
        <?php $__errorArgs = ['banner'];
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
                        <label class="form-select">Subject</label><br>
                        <select class="form-control <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="subject_id">
                            <option selected disabled>Select any option</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>" <?php echo e(@$subject->id == @$record->subject_id ? 'selected' : ''); ?>><?php echo e($subject->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback"><?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-select">Level</label><br>
                        <select class="form-control <?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="level_id">
                            <option selected disabled>Select any option</option>
                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($level->id); ?>" <?php echo e(@$level->id == @$record->level_id ? 'selected' : ''); ?>><?php echo e($level->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback"><?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-select">Sublevel</label><br>
                        <select class="form-control <?php $__errorArgs = ['sublevel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="sublevel_id">
                            <option selected disabled>Select any option</option>
                            <?php $__currentLoopData = $sub_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub_level->id); ?>" <?php echo e(@$sub_level->id == @$record->sublevel_id ? 'selected' : ''); ?>><?php echo e($sub_level->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback"><?php $__errorArgs = ['sublevel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description"
                               class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               value="<?php echo e(!empty($level) ? @$record->description : old('description')); ?>"
                               placeholder="Description"/><?php echo e(!empty($record) ? @$record->description : old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
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
                        <label for="enabled" class="form-select">Active</label><br>
                        <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Default select example" name="status">
                            <option selected disabled>Select any option</option>
                            <option value="Yes" <?php echo e(@$level->status == 'Yes' ? 'selected' : ''); ?>>Yes</option>
                            <option value="No" <?php echo e(@$level->status == 'No' ? 'selected' : ''); ?>>No</option>
                        </select>
                        <div class="invalid-feedback"><?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("image-preview");
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        // $(document).ready(function() {
        //     // Your other jQuery code if needed
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script>
        var teach_success_send = '<?php echo e(trans('panel.teach_success_send')); ?>';
    </script>

    <script src="/assets/default/js/panel/youTeach.min.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n1c7f25/public_html/resources/views/web/default/panel/youTeach/create.blade.php ENDPATH**/ ?>