<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
  <div class="card">
      <div class="card-header cover-img" style="background-image:url('<?php echo URLROOT; ?>/images/cover.png');">
          <img src="<?php echo URLROOT.'/'.$_SESSION['profilePic']; ?>" class='profile-pic'>
          <span class="text-dark text-pic h3">
              <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
          </span>
      </div>
      <div class="card-body">
        <nav class="pt-2 d-flex justify-content-center">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link bg-info text-white" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Info</a>
    <a class="nav-item nav-link bg-info text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pictures</a>
    <a class="nav-item nav-link bg-info text-white" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Feed</a>
  </div>
</nav>
<div class="tab-content mt-4" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/users/edit" method="post">
      <ul class="list-group">
        <li class="list-group-item">
          <label for="fname">Edit First Name:</label>
          <input type="text" name="fname" value="<?php echo $_SESSION['fname'];?>">
           <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorName']; ?>
                        </div>
                        <?php } ?>
        </li>
        <li class="list-group-item">
          <label for="lname">Edit Last Name:</label>
          <input type="text" name="lname" value="<?php echo $_SESSION['lname'];?>">
           <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorLastName'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorLastName']; ?>
                        </div>
                        <?php } ?>
        </li>
        <li class="list-group-item">
          <label for="birthDate">Edit Birth Date:</label>
          <input type="date" name="birthDate" value="<?php echo $_SESSION['birthDate'];?>">
           <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorBirth'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorBirth']; ?>
                        </div>
                        <?php } ?>
        </li>
        <li class="list-group-item">
          <label for="password">Change Password: </label>
          <input type="password" name="password">
           <!-- Name Errors Check -->
                        <?php if (!empty($data['errors']['errorPassword'])) { ?>
                        <div class="alert alert-warning" role='alert'>
                        <?php echo $data['errors']['errorPassword']; ?>
                        </div>
                        <?php } ?>
        </li>
        <li class="list-group-item">
          <label for="profilePicture">Change Profile Picture</label>
          <input type="file" class="form-control" name="profilePic" 
          value="<?php echo $_SESSION['profilePic']; ?>">
        </li>
         <li class="list-group-item">
         <button name="submit" class="btn btn-info w-100">UPDATE</button>
        </li>
        <li class="list-group-item">
         <button onclick="return confirm('Are you sure?');" name="submit" class="btn btn-danger w-100"><a href="<?php echo URLROOT; ?>/users/delete" class="text-white">DELETE PROFILE</a></button>
        </li>
</ul>
</form>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row">
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-lg-3">
            <img src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="..." class="img-thumbnail">
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

      <div class="media">
  <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class="mr-3 media-profile" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p class='commentText'>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin<span class="dots">...</span>
    <a href="#" class="text-info btnText viewMore">
        View More
    </a>
 <span class="more">Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span></p>
    <div class="mb-0">
        <a href="#" class="bg-white">
            25 <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
        </a>
        <a class="bg-white text-secondary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="#collapseExample1">
            <i class="fas fa-comment"></i> Comment 15
        </a>
    </div>
  </div>
</div>
<hr>
<div class="media">
  <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class="mr-3 media-profile" alt="...">
   <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p class='commentText'>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin<span class="dots">...</span>
    
    <a href="#" class="text-info viewMore btnText">
        View More
    </a>
 <span class="more">Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span></p>     
    <div class="mb-0">
        <a href="#" class="bg-white">
            <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
        </a>
        <a class="bg-white text-secondary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
            View Comments...
        </a>
        <!-- comments -->
  <div class="collapse" id="collapseExample2">
     <div class="media pt-5">
  <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class="align-self-center mr-3 media-profile" alt="...">
  <div class="media-body">
    <p class='commentText'>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin<span class="dots">...</span>
    <a href="#" class="text-info btnText viewMore">
        View More
    </a>
 <span class="more">Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span></p>
    <div class="mb-0">
        <a href="#" class="bg-white">
            <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
        </a>
</div>
    </div>
  </div>
<hr>
       <div class="media pt-5">
  <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class="align-self-center mr-3 media-profile" alt="...">
  <div class="media-body">
    <p class='commentText'>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin<span class="dots">...</span>
    <a href="#" class="text-info btnText viewMore">
        View More
    </a>
 <span class="more">Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span></p>
    <div class="mb-0">
        <a href="#" class="bg-white">
            <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i> 
        </a>
</div>
    </div>
  </div>
</div> <!-- end comments -->
  </div>
</div>
      </div>
  </div>
</div> <!-- container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
