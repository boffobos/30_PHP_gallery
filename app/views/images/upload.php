<?php require APPROOT . '/views/inc/header.php'; ?>
        <form action="<?php echo URLROOT . '/images/upload'; ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="customFile">Upload files</label>

            <?php if (!empty($data['errors'])): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($data['errors'] as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if (!empty($_FILES) && empty($data['errors'])): ?>
            <div class="alert alert-success">Файлы успешно загружены</div>
            <?php endif; ?>

            <input type="file" class="form-control" name="files[]" accept="<?php echo implode(', ', $data['file_types'])?>" id="customFile" multiple required>
            <small class="form-text text-muted">
                Max file size: <?php echo number_format($data['max_size'] / (1024 ** 2), 2) . 'МB'; ?> 
                Allowed file types: <?php echo implode(', ', $data['file_types']); ?>
            </small>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
<?php require APPROOT . '/views/inc/footer.php'; ?>