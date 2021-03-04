<?php require APPROOT . "/views/includes/header.php"; ?>
<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?php echo $data["title"];?></h1>
            <p class="lead my-3"><?php echo $data["description"];?></p>
        </div>
    </div>
<?php require APPROOT . "/views/includes/footer.php" ?>