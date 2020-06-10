<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Thread</div>

                <div class="panel-body">
                    <form method="POST" action='/threads'>
                        <?php echo e(csrf_field()); ?>


                        <div class='form-group'>
                            <label for='channel_id'>Choose a Channel:</label>
                            <select name='channel_id' id='channel_id' class='form-control' required>
                                <option value=''>Choose one</option>

                                <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- associate channel id and remember selected channel -->
                                    <option value="<?php echo e($channel->id); ?>"  <?php old('channel_id') == $channel->id ? 'selected' : '' ?> >
                                        <?php echo e($channel->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class='form-group'>
                            <label for='title'>Title:</label>
                            <input type='text' class='form-control' name='title' value="<?php echo e(old('title')); ?>" required>
                        </div>

                        <div class='form-group'>
                            <label for='body'>Body:</label>
                            <textarea name='body' id='body' class='form-control' rows='8' required><?php echo e(old('body')); ?></textarea>
                        </div>

                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Publish</button>
                        </div>
                    
                        <?php if(count($errors)): ?>
                            <ul class='alert alert-danger'>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>