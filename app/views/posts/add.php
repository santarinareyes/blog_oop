<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-light"><i class="fa fa-chevron-left"></i> Go back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <form action="<?php echo URLROOT; ?>/posts/add" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control <?php echo (!empty($data["title_err"])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <select name="category" class="form-select form-control-lg <?php echo (!empty($data["post_category_err"])) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                <option value="no" selected>Choose category <sup>*</sup></option>
                <?php foreach($data["category"] as $category) : ?>
                <option value="<?php echo $category->cat_id ?>"><?php echo $category->cat_title?></option>
                <?php endforeach; ?>
            </select>
            <span class="invalid-feedback"><?php echo $data['post_category_err']; ?></span>
        </div>
        <div class="form-group mt-3">
        <label for="image">Select Image</label>
        <input type="file" name="image" class="form-control <?php echo (!empty($data["image_err"])) ? 'is-invalid' : ''; ?>" >
        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <label for="content">Content: <sup>*</sup></label>
            <textarea rows="10" cols="30" style="resize: none" name="content" class="form-control form-control-lg <?php echo (!empty($data["content_err"])) ? 'is-invalid' : ''; ?>"><?php echo $data['content']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
        </div>
        <div class="form-group mt-3">
        <label for="tags">Tags</label>
        <input type="text" name="tags" class="form-control">
        </div>
        <div class="col pull-right mt-3">
            <input type="submit" value="Create post" class="btn btn-primary">
        </div>
    </form>
</div>
<hr class="mt-5">
<?php require APPROOT . "/views/includes/footer.php" ?>