<header>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME;?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
          </li>
             <li class="nav-item dropdown">
                <a href="<?php echo URLROOT; ?>/categories" class="nav-link" role="button" id="dropdownCategories" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownCategories">
                    <?php foreach($data["category"] as $category) :?>
                      <li><a class="dropdown-item" href="<?php echo URLROOT ?>/categories/show/<?php echo $category->cat_id; ?>/1"><?php echo $category->cat_title;?></a></li>
                    <?php endforeach; ?>
                  </ul>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-md-0">
          <?php if(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "Admin") : ?>
            <li class="nav-item dropdown">
                <a href="<?php echo URLROOT; ?>/categories" class="nav-link" role="button" id="dropdownAdmin" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownAdmin">
                      <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/posts">Posts</a></li>
                      <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/categories">Categories</a></li>
                      <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/account/<?php echo $_SESSION["user_id"];?>">Account</a></li>
                  </ul>
              </li>
            <?php elseif(isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "User") :?>
              <li class="nav-item dropdown">
                <a href="<?php echo URLROOT; ?>/users/account/<?php echo $_SESSION["user_id"];?>" class="nav-link">Account</a>
              </li>
          <?php endif; ?>
          <?php if(isset($_SESSION["username"])) : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout">Logout</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>