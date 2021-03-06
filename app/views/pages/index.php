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
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading"><a href="<?php echo URLROOT; ?>/categories/post/<?php echo $data["posts"][1]->post_id;?>" class="link-dark" style="text-decoration: none;"><?php echo $data["posts"][1]->post_title;?></a> <span class="text-muted"><small><small><?php echo $data["posts"][1]->post_created;?></small></small></span></h2>
    <p class="lead"><?php echo $data["posts"][1]->post_content;?></p>
  </div>
  <div class="col-md-5 order-md-1">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><a href="<?php echo URLROOT; ?>/categories/post/<?php echo $data["posts"][2]->post_id;?>" class="link-dark" style="text-decoration: none;"><?php echo $data["posts"][2]->post_title;?></a> <span class="text-muted"><small><small><?php echo $data["posts"][2]->post_created;?></small></small></span></h2>
    <p class="lead"><?php echo $data["posts"][2]->post_content;?></p>
  </div>
  <div class="col-md-5">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

  </div>
</div>

<hr class="featurette-divider">
</div><!-- /.container -->
<?php endif;?>
<?php require APPROOT . "/views/includes/footer.php" ?>