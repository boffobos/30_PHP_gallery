<?php require APPROOT . '/views/inc/header.php'; ?>

<article class="my-3" id="images">
    <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        <h3>Images</h3>
    </div>

    <div>
        <div class="bd-example">
            <img class="bd-placeholder-img card-img-top"
                src="<?php echo PUBLIC_DIR . $data['image']->path; ?>"
                alt="<?php echo $data['image']->name; ?>"
            >
         </div>
    </div>
</article>

<?php require APPROOT . '/views/inc/footer.php'; ?>