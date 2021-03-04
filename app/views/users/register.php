<?php require APPROOT . "/views/includes/header.php"; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create Account</h2>
                <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                    <div class="form-group mt-3">
                        <label for="username">Name: <sup>*</sup></label>
                        <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data["username_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data["email_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data["password_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirm password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data["confirm_password_err"])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_password_err']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                    </div>

                        <div class="col pull-right mt-3">
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>
                        <div class="col pull-right mt-3">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light">Already have an account? Login</a>
                        </div>

                </form>
            </div>
        </div>
    </div>
<hr>
<?php require APPROOT . "/views/includes/footer.php" ?>