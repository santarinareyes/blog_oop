<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Categories</h1>
        </div>
        <div class="col-md-6">
            <?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
            <a href="<?php echo URLROOT; ?>/categories/add" class="btn btn-primary pull-right">
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
        <a href="<?php echo URLROOT; ?>/categories/edit/<?php echo $category->cat_id; ?>" class="btn btn-outline-warning p-2">EDIT</a>
        </span>
        <span class="input-group-btn">
        <form action="<?php echo URLROOT ?>/categories/delete/<?php echo $category->cat_id; ?>" method="post">
        <input type="submit" value="DELETE" class="btn btn-outline-danger p-2">
        </form>
        </span>
        <?php endif; ?>
        </div>
    </div>
    </div>
        <?php endforeach; ?>

    
<hr class="mt-5">
</div>
<?php require APPROOT . "/views/includes/footer.php" ?>
        