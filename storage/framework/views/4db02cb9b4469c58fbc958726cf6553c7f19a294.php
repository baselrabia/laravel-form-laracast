<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="<?php echo e(route('profile', $reply->owner)); ?>">
                    <?php echo e($reply->owner->name); ?>

                </a> said <?php echo e($reply->created_at->diffForHumans()); ?>...
            </h5>

            <div>
                <form method="POST" action="/replies/<?php echo e($reply->id); ?>/favorites">
                    <?php echo e(csrf_field()); ?>


                    <button type="submit" class="btn btn-default" <?php echo e($reply->isFavorited() ? 'disabled' : ''); ?>>
                        <?php echo e($reply->favorites_count); ?> <?php echo e(str_plural('Favorite', $reply->favorites_count)); ?>

                    </button>
                </form>
            </div>
    </div>
</div>
    <div class="panel-body">
        <?php echo e($reply->body); ?>

    </div>
</div>