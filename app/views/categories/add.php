<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/categories" class="btn btn-light"><i class="fa fa-chevron-left"></i> Go back</a>
<div class="card card-body bg-light mt-5">
    <h2>Create category</h2>
    <form action="<?php echo URLROOT; ?>/categories/add" method="POST">
        <div class="form-group mt-3">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control <?php echo (!empty($data["title_err"])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="col pull-right mt-3">
            <input type="submit" value="Create category" class="btn btn-primary">
        </div>
    </form>
</div>
<hr class="mt-5">
<?php require APPROOT . "/views/includes/footer.php" ?>