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
    <hr>
<?php flash("post_message"); ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach($data["posts"] as $post) : ?>
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?php echo URLROOT; ?>/images/<?php echo $post->post_image; ?>" alt=""  class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $post->post_title?></h4>
                        <p style="min-height: 5rem;" class="card-text"><?php echo substr($post->post_content, 0, 150) . "<span class='text-muted'>...</span>"; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                                <form action="<?php echo URLROOT ?>/posts/delete/<?php echo $post->post_id ?>" method="post">
                                    <div class="btn-group">
                                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" type="button" class="btn btn-sm btn-outline-secondary">Read</a>
                                        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->post_id; ?>" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a href="<?php echo URLROOT; ?>/posts/image/<?php echo $post->post_id; ?>" type="button" class="btn btn-sm btn-outline-secondary">Change image</a>
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
        <ul class="pagination d-flex justify-content-center mt-5">
        <?php for($i = 1; $i < $data["count"] + 1; $i++){?>
            <li class="page-item <?php echo ($i == $data["page"]) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo URLROOT; ?>/posts/index/<?php echo $i ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        </ul>
<hr>
<?php require APPROOT . "/views/includes/footer.php" ?>