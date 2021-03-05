<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Categories</h1>
        </div>
        <div class="col-md-6">
            <?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i>Add category
            </a>
            <?php endif; ?>
        </div>
    </div>
    <hr>
<?php flash("post_message"); ?>
        <?php foreach($data["category"] as $category) : ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="card card-body mb-3">
        <div class="btn-group">
        <a class="btn btn-primary p-2" href="<?php echo URLROOT; ?>/categories/show/<?php echo $category->cat_id; ?>">
        <?php echo $category->cat_title;?>
        </a>
        <?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
        <span class="input-group-btn">
        <a class="btn btn-outline-warning p-2">EDIT</a>
        </span>
        <span class="input-group-btn">
        <a class="btn btn-outline-danger p-2">DELETE</a>
        </span>
        <?php endif; ?>
        </div>
    </div>
    </div>
        <?php endforeach; ?>

    
</div>
<hr>
<!-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="card card-body mb-3">
        <a class="btn btn-primary p-2">CATEGORY</a>
    </div>
        <span>
    <div class="card card-body mb-3">
        <span class="input-group-btn">
        <a class="btn btn-primary p-2">ADMIN</a>
        <a class="btn btn-primary p-2">ADMIN</a>
        </span>
        </span>
    </div>
</div>
<hr> -->
<?php require APPROOT . "/views/includes/footer.php" ?>
        