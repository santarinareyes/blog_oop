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
    <hr>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach($data["posts"] as $post) : ?>
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $post->post_title?></h4>
                        <p style="min-height: 5rem;" class="card-text"><?php echo $post->post_content; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                                <form action="">
                                    <div class="btn-group">
                                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                </form>
                                </div>
                            <small class="text-muted">Posted by <?php echo $post->username ?></small>
                        </div>
                    </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<hr>
<?php require APPROOT . "/views/includes/footer.php" ?>
        