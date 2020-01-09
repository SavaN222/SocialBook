<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row p-2">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-info">
          <img src="<?php echo URLROOT; ?>/images/cartman.jpg" class="card-img-top rounded-circle " alt="...">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">Eric Cartman</h5>
            <p class="card-blockquote font-italic">Lorem ipsum.</p>
            <hr>
            <p class="card-text"><strong>25k </strong>followers</p>
            <hr>
            <p class="card-text"><strong>25k </strong> followers</p>
            <a href="#" class="btn btn-primary">View Profile</a>
          </div>
</div>
    </div> <!-- col-lg-3 -->

    <div class="col-lg-6"> 
            <div class="card">
                <div class="card-body border-strong">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <img class="w-100" src="<?php echo URLROOT; ?>/images/cartman.jpg" alt="">
                        </div>
                        <div class="col-lg-9">
                            <p class="card-text text-primary">O cemu razmisljas?</p>
                            <form action="">
            <div class="form-group">
            <textarea name="" id="" class="form-control"></textarea>
        </div>
            <div class="form-group text-right">
            <input type="submit" class="btn btn-info" value="POST">
            </div>
        </form>
                        </div>
                    
                </div>
            </div>
        </div>
        
    </div><!-- col-lg-6 -->

    <div class="col-lg-3"> 

    </div><!-- col-lg-3 -->
</div> <!-- row -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
