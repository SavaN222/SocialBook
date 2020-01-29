<nav id="mynav" class="navbar navbar-expand-md navbar-dark bg-info">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>">
    <?php echo SITENAME; ?>
  </a>
  
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
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/home"><i class="fas fa-home nav-icons"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/messages/index"><i class="fas fa-envelope nav-icons"></i></a>
      </li>

        <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="friendDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-globe-americas nav-icons">
          </i><span class="badge badge-light">
            <?php echo $data['notification']->totalComments; ?>
          </span>
        </a>
          <div class="dropdown-menu" aria-labelledby="friendDropdown">
            <?php foreach ($data['commentsNotifications'] as $data['commentsNotification']): ?>
              <a class="dropdown-item mr-5" 
              href="#post<?php echo $data['commentsNotification']->post_id; ?>">
             <img class="img-thumbnail friendRequest-img" src="<?php echo URLROOT;?>/<?php echo $data['commentsNotification']->profile_pic; ?>"> 
             <span><?php echo $data['commentsNotification']->fname . ' ' . $data['commentsNotification']->lname; ?> wrote an comment:</span>
             <p>Comment: <?php echo $data['commentsNotification']->description; ?></p>
            </a>
            <form>
              <div class="form-group d-flex justify-content-center">
                <button class="btn btn-info btn-sm">
                <a class="text-white" href="<?php echo URLROOT; ?>/posts/readComment/<?php echo $data['commentsNotification']->commentId ?>">Mark as Read</a>
              </button>
              </div>
            </form>
            <hr>
            <?php endforeach; ?>
          </div>
        </div>
      </li>




      <li class="nav-item">
        <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="friendDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-friends nav-icons">
          </i><span class="badge badge-light">
            <?php echo $data['countFriendRequest']->total; ?>
          </span>
        </a>
          <div class="dropdown-menu" aria-labelledby="friendDropdown">
            <?php foreach ($data['friendRequests'] as $data['friendRequest']): ?>
              <a class="dropdown-item mr-5" 
              href="<?php echo URLROOT; ?>/pages/profile/<?php echo $data['friendRequest']->id; ?>">
             <img class="img-thumbnail friendRequest-img" src="<?php echo URLROOT;?>/<?php echo $data['friendRequest']->profile_pic; ?>"> 
             <?php echo $data['friendRequest']->fname . ' ' . $data['friendRequest']->lname; ?>
            </a>
            <form>
              <div class="form-group d-flex justify-content-between">
                <button class="btn btn-info btn-sm">
                <a class="text-white" href="<?php echo URLROOT; ?>/friends/accept/<?php echo $data['friendRequest']->id ?>">Accept</a>
              </button>
                <button class="btn btn-danger btn-sm">
                <a class="text-white" href="<?php echo URLROOT; ?>/friends/decline/<?php echo $data['friendRequest']->id ?>">Decline</a>
              </button>
              </div>
            </form>
            <hr>
            <?php endforeach; ?>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/games/index"><i class="fas fa-gamepad nav-icons"></i></a>
      </li>
      <li class="nav-item left-divider ml-2">
        <div class="dropdown show">
  <a class="dropdown text-white mr-5" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="ml-1 nav-profile-pic" src="<?php echo URLROOT.'/'.$_SESSION['profilePic']; ?>" alt="" > <?php echo $_SESSION['fname']; ?></a>
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