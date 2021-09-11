<?php require APPROOT . '/views/inc/header.php'; ?>

<article class="my-3" id="images">
    <div>
        <div class="bd-example">
            <img class="show bd-placeholder-img card-img-top img-fluid"
                src="<?php echo URLROOT . UPLOAD_DIR . $data['image']->name; ?>"
                alt="<?php echo $data['image']->name; ?>"
            >
            <div class="d-flex justify-content-between align-items-center">
                <?php if($data['image']->user_id == $_SESSION['user_id']) : ?> 
                <form class="d-inline " action="<?php echo URLROOT; ?>/images/delete/<?php echo $data['image']->id ?>" method="POST">
                    <input type="submit" value="Delete image" class="btn btn-danger">
                </form> 
                <?php  endif ?>
            </div>
        </div>
        
        <div class="card card-body bg-light mt-5">
            <form class="row g-3 mt-3" action="<?php echo URLROOT?>/comments/add/<?php echo $data['image']->id?>" method="POST">
                    <div class="input-group">
                    <span class="input-group-text">Title</span>
                    <input class="form-control"  name="title"></input>
                    </div>
                    <div class="input-group">
                    <span class="input-group-text">Enter your comment</span>
                    <textarea class="form-control" aria-label="With textarea" name="body"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add comment</button>
                </div>
            </form>
        </div>
        <section class="pt-5" id="comments">
            <?php flash('comment_message'); ?>
            <?php foreach($data['comments'] as $comment) : ?>
                <div class="card card-body mb-3 mt-3">
                    <h4 class="card-title"><?php echo $comment->title; ?></h4>
                    <div class="bg-light p-2 mb-3">
                        written by <?php echo $comment->userName?> on <?php  echo $comment->commentCreated; ?>
                    </div>
                    <p class="card-text"><?php echo $comment->body; ?></p>
                    <?php if($comment->userId == $_SESSION['user_id']) : ?>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo URLROOT; ?>/comments/edit/<?php echo $comment->commentId; ?>" class="btn btn-dark">Edit</a>
                        <form class="d-inline " action="<?php echo URLROOT; ?>/comments/delete/<?php echo $comment->commentId ?>" method="POST">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                    <?php endif; ?>
                    
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</article>

<?php require APPROOT . '/views/inc/footer.php'; ?>