<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go back</a>
<hr>
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
<hr>
<p class="btn btn-secondary disabled">Tags <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></p>
<?php foreach($data['tags'] as $tag) : ?>
<p class="btn btn-secondary disabled"><?php echo $tag;?></p>
<?php endforeach;?>
<form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data["post"]->post_id; ?>" method="POST">
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data["post"]->post_id; ?>" class="btn btn-outline-secondary">Edit</a>
<input class="btn btn-outline-danger" type="submit" value="Delete">
</form>
<hr>
<?php require APPROOT . "/views/includes/footer.php" ?>