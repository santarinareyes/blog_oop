<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/categories/show/<?php echo $data["post"]->post_category_id; ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Read other articles in the same category</a>
<hr class="featurette-divider">
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><?php echo $data["post"]->post_title; ?> <span class="text-muted"><small><small> <?php echo $data["post"]->post_created ?></small></small></span></h2>
    <p class="text-muted">Written by <?php echo $data["user"]->username ?></p>
    <p class="lead"><?php echo $data["post"]->post_content;?></p>
  </div>
  <div class="col-md-5">
  <img src="<?php echo URLROOT; ?>/images/<?php echo $data["post"]->post_image; ?>" alt="image" class="bd-placeholder-img card-img-top" width="500" height="500">

  </div>
</div>
<hr class="mt-5">
<?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
<form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data["post"]->post_id; ?>" method="POST">
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data["post"]->post_id; ?>" class="btn btn-outline-secondary">Edit Post</a>
<input class="btn btn-outline-danger" type="submit" value="Delete Post">
</form>
<hr>
<?php endif; ?>
<div class="card card-body bg-light mt-5">
  <h4>Leave a Comment:</h4>
  <form role="form" method="post" action="<?php echo URLROOT ?>/categories/commentadd/<?php echo $data["post_id"] ?>">
    <div class="form-group">
      <textarea
        class="form-control"
        name="comment_content"
        rows="5"
        style="resize: none"
      ></textarea>
    </div>
    <button type="submit" name="comment_submit" class="btn btn-primary mt-2">
      Submit comment
    </button>
  </form>
</div>
<?php flash("post_message");?>
<?php foreach($data["comments"] as $comment) : ?>
<div class="media card card-body">
  <div class="media-body">
    <h4 class="media-heading">
      <strong><?php echo $comment->username; ?></strong>
      <small class="text-muted"><?php echo $comment->comment_created?></small>
    </h4>
    <p><?php echo $comment->comment_content; ?></p>
    <?php if($_SESSION["user_id"] === $comment->comment_user_id || $_SESSION["user_status"] === "Admin") :?>
    <form action="<?php echo URLROOT ?>/categories/commentdelete/<?php echo $comment->comment_id; ?>&post=<?php echo $data["post_id"]; ?>" method="post">
      <input type="submit" value="DELETE COMMENT" class="btn btn-outline-danger btn-sm p-2">
    </form>
    <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>
<hr class="mt-5">
<?php require APPROOT . "/views/includes/footer.php" ?>