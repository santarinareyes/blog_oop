<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i>New category
            </a>
        </div>
    </div>
    <hr>
<?php flash("post_message"); ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="card card-body mb-3">
        <div class="btn-group">
        <a class="btn btn-primary p-2">CATEGORY</a>
        <span class="input-group-btn">
        <a class="btn btn-outline-warning p-2">EDIT</a>
        </span>
        <span class="input-group-btn">
        <a class="btn btn-outline-danger p-2">DELETE</a>
        </span>
        </div>
    </div>
    </div>

    
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
        