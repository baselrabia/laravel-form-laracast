<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        <?php echo e($profileUser->name); ?>

                        <small>Since <?php echo e($profileUser->created_at->diffForHumans()); ?></small>
                    </h1>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                               <span class="flex">
                                <a href="<?php echo e(route('profile', $thread->creator)); ?>"><?php echo e($thread->creator->name); ?></a> posted:
                                <a href="<?php echo e($thread->path()); ?>"><?php echo e($thread->title); ?></a>
                               </span>

                                <span><?php echo e($thread->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>

                        <div class="panel-body">
                            <?php echo e($thread->body); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>There are no relevant results at this time.</p>
                <?php endif; ?>

                <?php echo e($threads->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>