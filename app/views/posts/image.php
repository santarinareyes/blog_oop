<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-light"><i class="fa fa-chevron-left"></i> Go to all posts</a>
<div class="card card-body bg-light mt-5">
    <h2><?php echo $data["post"]->post_title; ?> <small class="text-muted">Update Image</small></h2>
    <form action="<?php echo URLROOT; ?>/posts/image/<?php echo $data["post_id"];?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-3">
        <label for="image">Select Image</label>
        <input type="file" name="image" class="form-control <?php echo (!empty($data["image_err"])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
        </div>
        <div class="col pull-right mt-3">
            <a class="btn" href="<?php echo URLROOT; ?>/posts">Cancel</a>
            <input type="submit" value="Update image" class="btn btn-primary">
        </div>
    </form>
</div>
<hr class="mt-5">
<?php require APPROOT . "/views/includes/footer.php" ?>