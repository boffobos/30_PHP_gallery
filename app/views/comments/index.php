<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('comment_message'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Comments</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="<?php echo URLROOT; ?>/comments/add" class="btn btn-primary ">
                <i class="fa fa-pencil"></i> Add Comment
            </a>
        </div>
    </div>
    <?php foreach($data['comments'] as $comment) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $comment->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                written by <?php echo $comment->name?> on <?php  echo $comment->commentCreated; ?>
            </div>
            <p class="card-text"><?php echo $comment->body; ?></p>
            <a href="<?php echo URLROOT; ?>/comments/show/<?php echo $comment->commentId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>