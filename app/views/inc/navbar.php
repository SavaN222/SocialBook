<nav id="mynav" class="navbar navbar-expand-md navbar-dark bg-info">
  <a class="navbar-brand" href="#"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
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
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="nav-profile-pic" src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="" > John</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    
  </div>
</nav>