<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row p-2">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-info">
                <img src="<?php echo URLROOT.'/'.$_SESSION['profilePic']; ?>" class="card-img-top rounded " alt="...">
          </div>
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></h5>
                <hr>
                <p class="card-text"><strong><?php echo $data['totalFriends']->total; ?> </strong>friends</p>
                <hr>
                <p class="card-text"><strong><?php echo $data['totalPosts']->total; ?> </strong>posts</p>
                <hr>
          </div>
        </div>
    </div> <!-- col-lg-3 -->

    <div class="col-lg-6"> 
        <div class="card mb-3">
            <div class="card-body border-strong">
                <p class="card-text text-primary text-center">Say something...</p>
                <form id="postForm" method="POST" action="<?php echo URLROOT; ?>/posts/create">
                    <div class="form-group">
                        <textarea id="desc" name="description" class="form-control"></textarea>
                    </div>
                <div class="form-icons d-flex ">
                <div class="form-group ml-auto">
                    <button id="sendBtn" type="submit" class="btn" name="submit">
                    <i class="fab fa-telegram fa-3x text-info"></i>
                    </button>
                </div>
        </div>

        </form>
                    
            </div>
        </div>
        <?php foreach($data['posts'] as $data['post']): ?>
             <div class="posts py-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="friend_info border border-primary rounded">
                    <div class="card-header d-flex justify-content-between">
                    <div id="post<?php echo $data['post']->id; ?>" class="friend_data">
                    <img class="rounded-circle post-profile-pic p-2" src="<?php echo URLROOT; ?>/<?php echo $data['post']->profile_pic; ?>" alt=""> 
                    <strong class="text-info">
                        <a href="<?php echo URLROOT; ?>/pages/profile/<?php echo $data['post']->user_id; ?>">
                        <?php echo $data['post']->fname . ' ' . $data['post']->lname; ?>
                        </a>
                    </strong>
                    <small class="text-gray-dark font-italic">
                        <?php echo $data['post']->date_added; ?>
                    </small>
                    </div>
                    </div> <!-- card header -->

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $data['post']->description; ?>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <form class="likeForm">
                                <button class="btn likeBtn" value="<?php echo $data['post']->id;?>">
                                    <span data-liked='false' id="likeTxt<?php echo $data['post']->id;?>" class="text-info"><?php echo $data['post']->likes; ?></span>
                                    <i class="far fa-thumbs-up text-primary fa-lg mr-3"></i>
                                </button>
                            </form>
                            <form id="commentsForm<?php echo $data['post']->id; ?>">
                            <a class="btn text-info" data-toggle="collapse" href="#commentBox<?php echo $data['post']->id; ?>" role="button" aria-expanded="false" aria-controls="commentBox<?php echo $data['post']->id; ?>">
                                 <button class="btn commentShow" name="postId" value="<?php echo $data['post']->id; ?>">
                                <i class="fas fa-comment"></i>
                                    Comments
                                 </button>
                            </a>
                            </form>
                        </div>
                            <!-- comments -->
                                <div class="collapse" id="commentBox<?php echo $data['post']->id; ?>">
                                    <div id="commentsOutput<?php echo $data['post']->id;?>">
                                    </div>
                                <form class="d-flex justify-content-between commentForm">
                                    <input id="postUser<?php echo $data['post']->id;?>" 
                                    type="hidden" name="postUser" 
                                    value="<?php echo $data['post']->user_id;?>">
                                    <textarea id="commentText<?php echo $data['post']->id; ?>" name="description" class="form-control description" 
                                    placeholder="<?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?> write a comment..."></textarea>
                                    <button type="submit" class="btn sendcom" name="postId" value="<?php echo $data['post']->id;?>">
                    <i class="fab fa-telegram fa-3x text-info"></i>
                    </button>
                                </form>
                                </div> 
                            <!-- End comments -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div><!-- col-lg-6 -->

    <div class="col-lg-3"> 
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Maybe you know?</h5>
                <hr>
                <?php foreach ($data['friendSuggestions'] as $data['friendSuggestion']): ?>
                <div class="d-flex justify-content-start align-items-center">

                <a href="<?php echo URLROOT; ?>/pages/profile/<?php echo $data['friendSuggestion']->id; ?>">
                <img class="mr-1 img-thumbnail friendRequest-img" src="<?php echo URLROOT;?>/<?php echo $data['friendSuggestion']->profile_pic; ?>">
                <span class="text-info">
                    <?php echo $data['friendSuggestion']->fname . ' ' . $data['friendSuggestion']->lname; ?>
                </span>
                    </a>
              </div>
              <hr>
                <?php endforeach; ?>
                 <div class="card-footer">
                    <p class="card-text">Add new friends and get more posts!</p>
                </div>
        </div>
    </div><!-- col-lg-3 -->
</div> <!-- row -->

</div> <!-- container -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
