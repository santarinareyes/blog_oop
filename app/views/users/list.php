<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Users</h1>
        </div>
        <div class="col-md-6">
            <?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") :?>
            <a href="<?php echo URLROOT; ?>/categories/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i>Add category
            </a>
            <?php endif; ?>
        </div>
    </div>
    <hr>
    <table class="table table-bordered table-hover">
    <?php flash("post_message");?>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Created</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data["users"] as $user) : ?>
        <tr>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->user_email ?></td>
            <td><?php echo $user->user_created ?></td>
            <td><?php echo $user->user_status ?></td>
            <td>
            <?php if($user->user_status === "Admin") :?>
                <?php if($user->user_id == 1) : ?>
                    <a type="submit" class="btn btn-success" disabled>Main Admin</a>
                    <?php else: ?>
                    <form action="<?php echo URLROOT; ?>/users/demote/<?php echo $user->user_id; ?>" method="post">
                    <input type="submit" value="Change to User" class="btn btn-outline-warning">
                    </form>
                <?php endif;?>
            <?php else : ?>
            <form action="<?php echo URLROOT; ?>/users/promote/<?php echo $user->user_id?>" method="post">
            <input type="submit" value="Change to Admin" class="btn btn-outline-primary">
            </form>
            <?php endif; ?>
            <td>
            <?php if($user->user_status !== "Admin") : ?>
            <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->user_id?>" method="post">
            <input type="submit" value="DELETE" class="btn btn-outline-danger">
            </form>
            </td>
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr class="mt-5">
</div>
<?php require APPROOT . "/views/includes/footer.php" ?>
            