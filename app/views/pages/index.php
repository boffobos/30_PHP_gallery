
<?php require APPROOT . '/views/inc/header.php'; ?>

  <section class="<?php if(isLoggedIn()){ echo 'py-1';} else { echo 'py-5';} ?> text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo $data['title']; ?></h1>
          <?php if(isLoggedIn()): ?>
            <p>
              <a href="<?php echo URLROOT; ?>/images/upload" class="btn btn-primary my-2">Upload images</a>
            </p>
          <?php else : ?>
            <p class="lead text-muted"><?php echo $data['description'] ?></p>
            <div class="card-body">
                  <p class="card-text lead text-muted">To upload images and comments login, please!</p>
                  <p>
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary my-2">Login</a>
                  <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
                  </p>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Modal section -->
  <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adding comment to image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="bd-example mb-3">
          <img class="bd-placeholder-img card-img-top" height="225"  width="100%" 
              src="img/Freestyler.jpg"
              alt="Freestyler ?>"
              >
          </div>
            <form action="">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
              <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary mt-2">Save changes</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <?php foreach($data['images'] as $image) : ?>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225"
              src="<?php echo $image->path; ?>"
              alt="<?php echo $image->name; ?>"
              >
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php echo URLROOT; ?>/images/show/<?php echo $image->id; ?>" class="btn btn-sm btn-outline-secondary">Show</a>
                    <?php if(isLoggedIn()) : ?>
                    <a href="<?php echo URLROOT; ?>/images/comment/<?php echo $image->id; ?>" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">Comment</a>
                    <?php endif; ?>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach; ?>  
      </div>
    </div>
  </div>

</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
