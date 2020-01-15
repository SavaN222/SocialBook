<nav id="mynav" class="navbar navbar-expand-md navbar-dark bg-info">
  <a class="navbar-brand" href="#"><?php echo SITENAME; ?></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="nav navbar-nav navbar-logo mx-auto">
      <li class="nav-item">
        <div class="form-group">
          <div class="input-group form-group ml-lg-5">
            <div class="input-group-prepend ml-lg-5">
              <span class="input-group-text bg-white text-info ml-lg-5"><i class="fas fa-search"></i></span>
             </div>
             <form id="searchForm">
            <input id="search" type="text" class="form-control" placeholder="Search for users...">
            </form>
        </div>
          <ul id="searchResults" class="scrollable-menu list-group" role="menu">
                </ul>
      </li>
    </ul>
    
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-home nav-icons"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-envelope nav-icons"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-globe-americas nav-icons"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user-friends nav-icons"></i></a>
      </li>
      <li class="nav-item left-divider ml-2">
        <div class="dropdown show">
  <a class="dropdown text-white mr-5" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="ml-1 nav-profile-pic" src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="" > <?php echo $_SESSION['fname']; ?></a>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/profile/<?php echo $_SESSION['id']; ?>">Profile</a>
    <a class="dropdown-item" href="<?php echo URLROOT; ?>/login/logoutUser">Logout</a>
    <a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</li>
    </ul>
  </div>
</nav>