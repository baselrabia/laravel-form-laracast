<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                                <a href="<?php echo e(route('profile', $thread->creator)); ?>"><?php echo e($thread->creator->name); ?></a> posted:
                                <?php echo e($thread->title); ?>

                            </span>

                            <?php if(Auth::check()): ?>
                                <form action="<?php echo e($thread->path()); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>


                                    <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php echo e($thread->body); ?>

                    </div>
                </div>

                <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('threads.reply', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($replies->links()); ?>


                <?php if(auth()->check()): ?>
                    <form method="POST" action="<?php echo e($thread->path() . '/replies'); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?"
                                      rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                <?php else: ?>
                    <p class="text-center">Please <a href="<?php echo e(route('login')); ?>">sign in</a> to participate in this
                        discussion.</p>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This thread was published <?php echo e($thread->created_at->diffForHumans()); ?> by
                            <a href="#"><?php echo e($thread->creator->name); ?></a>, and currently
                            has <?php echo e($thread->replies_count); ?> <?php echo e(str_plural('comment', $thread->replies_count)); ?>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>