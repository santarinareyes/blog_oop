<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/categories/show/<?php echo $data["post"]->post_category_id; ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go back</a>
<hr>
<h1><?php echo $data["post"]->post_title?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    <span>Written by <?php echo $data["user"]->username?></span> <span class="pull-right"> on <?php echo $data["post"]->post_created; ?></span>
</div>
<p><?php echo $data["post"]->post_content; ?></p>
<hr class="mt-5">
<?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
<form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data["post"]->post_id; ?>" method="POST">
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data["post"]->post_id; ?>" class="btn btn-outline-secondary">Edit</a>
<input class="btn btn-outline-danger pull-right" type="submit" value="Delete">
</form>
<hr>
<?php endif; ?>
<?php require APPROOT . "/views/includes/footer.php" ?>