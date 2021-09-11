<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/comments" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
<br>
<h1><?php echo $data['comment']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['comment']->created_at;?>
</div>
<p><?php echo $data['comment']->body; ?></p>

<?php if($data['comment']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <a href="<?php echo URLROOT; ?>/comments/edit/<?php echo $data['comment']->id; ?>" class="btn btn-dark">Edit</a>
        <form class="d-inline " action="<?php echo URLROOT; ?>/comments/delete/<?php echo $data['comment']->id ?>" method="POST">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>