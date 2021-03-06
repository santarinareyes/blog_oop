<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?php echo $data["title"];?></h1>
            <p class="lead my-3"><?php echo $data["description"];?></p>
            <?php if(!isset($_SESSION["user_id"])) :?>
            <a href="<?php echo URLROOT . "/users/login" ?>" class="btn btn-primary lead my-3">Please login to see the content.</a>
            <?php endif;?>
        </div>
    </div>

<?php if(isset($_SESSION["user_id"])) :?>
<div class="container">
<!-- START THE FEATURETTES -->

<hr class="featurette-divider">
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><a href="<?php echo URLROOT; ?>/categories/post/<?php echo $data["posts"][0]->post_id;?>" class="link-dark" style="text-decoration: none;"><?php echo $data["posts"][0]->post_title;?></a> <span class="text-muted"><small><small><?php echo $data["posts"][0]->post_created;?></small></small></span></h2>
    <p class="lead"><?php echo $data["posts"][0]->post_content;?></p>
  </div>
  <div class="col-md-5">
  <img src="<?php echo URLROOT; ?>/images/<?php echo $data["posts"][0]->post_image; ?>" alt="image" class="bd-placeholder-img card-img-top" width="500" height="500">

  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading"><a href="<?php echo URLROOT; ?>/categories/post/<?php echo $data["posts"][1]->post_id;?>" class="link-dark" style="text-decoration: none;"><?php echo $data["posts"][1]->post_title;?></a> <span class="text-muted"><small><small><?php echo $data["posts"][1]->post_created;?></small></small></span></h2>
    <p class="lead"><?php echo $data["posts"][1]->post_content;?></p>
  </div>
  <div class="col-md-5 order-md-1">
  <img src="<?php echo URLROOT; ?>/images/<?php echo $data["posts"][1]->post_image; ?>" alt="image"  class="bd-placeholder-img card-img-top" width="500" height="500">

  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><a href="<?php echo URLROOT; ?>/categories/post/<?php echo $data["posts"][2]->post_id;?>" class="link-dark" style="text-decoration: none;"><?php echo $data["posts"][2]->post_title;?></a> <span class="text-muted"><small><small><?php echo $data["posts"][2]->post_created;?></small></small></span></h2>
    <p class="lead"><?php echo $data["posts"][2]->post_content;?></p>
  </div>
  <div class="col-md-5">
  <img src="<?php echo URLROOT; ?>/images/<?php echo $data["posts"][2]->post_image; ?>" alt="image"  class="bd-placeholder-img card-img-top" width="500" height="500">

  </div>
</div>

<hr class="featurette-divider">
</div><!-- /.container -->
<?php endif;?>
<?php require APPROOT . "/views/includes/footer.php" ?>