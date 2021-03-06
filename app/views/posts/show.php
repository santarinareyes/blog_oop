<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT ?>/posts" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Go back</a>
<hr>
<h1 ><?php echo $data["post"]->post_title?> <small class="text-muted"><?php echo $category->cat_title; ?></small></h1>
<div class="bg-secondary text-white p-2 mb-3">
    <span>Written by <?php echo $data["user"]->username?></span> <span class="pull-right"> on <?php echo $data["post"]->post_created; ?></span>
</div>
<p><?php echo $data["post"]->post_content; ?></p>
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