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
          <label for="password">Change/Confirm Password: </label>
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
  
  

</div>
      </div>
  </div>
</div> <!-- container -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
