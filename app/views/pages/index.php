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
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <a href="#" class="btn btn-primary">View Profile</a>
          </div>
        </div>
    </div> <!-- col-lg-3 -->

    <div class="col-lg-6"> 
        <div class="card">
            <div class="card-body border-strong">
                <p class="card-text text-primary text-center">O cemu razmisljas?</p>
                <form action="">
                    <div class="form-group">
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                <div class="form-icons d-flex ">
                    <div class="form-group">
                         <button type="submit" class="btn">
                         <i class="fas fa-camera fa-3x text-info"></i>
                        </button>
                </div>
                <div class="form-group ml-auto">
                    <button type="submit" class="btn">
                    <i class="fab fa-telegram fa-3x text-info"></i>
                    </button>
                </div>
        </div>

        </form>
                    
            </div>
        </div>
        
    </div><!-- col-lg-6 -->

    <div class="col-lg-3"> 
        <div class="card">
            <div class="card-header bg-info">
                <img src="https://picsum.photos/200/300?random=1" class="card-img-top" alt="...">
          </div>
            <div class="card-body text-center">
                <h5 class="card-title">Random Pics.</h5>
                <p class="card-blockquote font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, illum!</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <p class="card-text"><strong>25k </strong>followers</p>
                <hr>
                <a href="#" class="btn btn-primary">View Profile</a>
          </div>
        </div>
    </div><!-- col-lg-3 -->
</div> <!-- row -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
