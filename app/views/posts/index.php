<?php require APPROOT . "/views/includes/header.php"; ?>
<?php flash("post_message"); ?>
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
            Written by <?php echo $post->username ?> on <?php echo $post->post_created ?>
        </div>
        <p class="card-text"><?php echo $post->post_content; ?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id ?>" class="btn btn-dark">Go to post</a>
    </div>
    <?php endforeach;?>
<?php require APPROOT . "/views/includes/footer.php" ?>