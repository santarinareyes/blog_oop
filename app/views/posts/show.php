<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go back</a>
<hr>
<h1><?php echo $data["post"]->post_title?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data["user"]->username?> on <?php echo $data["post"]->post_created; ?>
</div>
<p><?php echo $data["post"]->post_content; ?></p>
<hr class="mt-5">
<form action="<?php URLROOT; ?>/posts/delete/<?php echo $data["post"]->post_id; ?>">
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data["post"]->post_id; ?>" class="btn btn-outline-secondary">Edit</a>
<input class="btn btn-outline-danger pull-right" type="submit" value="Delete">
</form>
<hr>
<?php require APPROOT . "/views/includes/footer.php" ?>