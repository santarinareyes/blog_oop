<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i>Add Post
            </a>
        </div>
    </div>
    <?php foreach($data["posts"] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->post_title?></h4>
        <div class="bg-light p-2 mb-3">
            Written by <?php echo $post->username ?>
        </div>
    </div>
    <?php endforeach;?>
<?php require APPROOT . "/views/includes/footer.php" ?>