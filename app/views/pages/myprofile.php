<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
  <div class="card">
      <div class="card-header cover-img" style="background-image:url('<?php echo URLROOT; ?>/images/cover.png');">
          <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class='profile-pic'>
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
      <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Name: <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Bith Date: <?php echo $_SESSION['birthDate']; ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ukupno Prijatelja
    <span class="badge badge-primary badge-pill">32</span>
  </li>
</ul>
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
