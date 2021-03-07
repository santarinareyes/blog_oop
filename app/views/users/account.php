<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Change password</h2>
                <form action="<?php echo URLROOT; ?>/users/account/<?php echo $_SESSION["user_id"]; ?>" method="POST">
                    <div class="form-group mt-3">
                    <div class="form-group mt-3">
                        <label for="password">New password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data["password_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirm password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data["confirm_password_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                        <div class="col pull-right mt-3">
                            <input type="submit" value="Change password" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
    </div>
<hr class="mt-5">
<?php require APPROOT . "/views/includes/footer.php" ?>