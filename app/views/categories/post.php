<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/categories/show/<?php echo $data["post"]->post_category_id; ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go back</a>
<hr>
<h1><?php echo $data["post"]->post_title?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    <span>Written by <?php echo $data["user"]->username?></span> <span class="pull-right"> on <?php echo $data["post"]->post_created; ?></span>
</div>
<p><?php echo $data["post"]->post_content; ?></p>
<hr class="mt-5">
<div class="card card-body bg-light mt-5">
  <h4>Leave a Comment:</h4>
  <form role="form" method="post" action="#comment_submitted">
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
<div class="media card card-body">
  <div class="media-body">
    <h4 class="media-heading">
      <strong>username</strong>
      <small>comment_date</small>
    </h4>
    <p>aaaaaaaaaaaaaaaaaaaaa</p>
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
<?php require APPROOT . "/views/includes/footer.php" ?>