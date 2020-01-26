<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container-fluid mt-2">
        <div class="message-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="d-flex justify-content-center align-items-center">

                <img class="mr-1 img-thumbnail friendRequest-img" src="<?php echo URLROOT; ?>/<?php echo $_SESSION['profilePic']; ?>">
                <span class="text-white">
                   <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
                </span>
                        </div>
                    </div>
                    <div class="card-divider bg-dark">
                        <p class="text-center text-white p-1 mt-2">Chat whith friends</p>
                    </div>
                    <div class="card-body">
                        <?php foreach ($data['friends'] as $data['friend']): ?>
                            <?php if ($data['friend']->id == $_SESSION['id']) {
                                continue; // skip logged user in friend list
                            } ?>
                        <div class="d-flex justify-content-start align-items-center m-2">
                            <a href="<?php echo URLROOT; ?>/messages/chat/<?php echo $data['friend']->id; ?>">
                            <img class="mr-1 img-thumbnail friendRequest-img" src="<?php echo URLROOT; ?>/<?php echo $data['friend']->profile_pic; ?>">
                            <span class="text-info">
                                <?php echo $data['friend']->fname . ' ' . $data['friend']->lname; ?>
                                <?php if ($data['friend']->status == '1') {
                                ?> <i class="fas fa-circle text-success"></i>
                                <?php } else {
                                ?> <i class="fas fa-circle text-danger"></i>
                                <?php } ?>
                            </a>
                            </span>
                        </div>
                        <hr class="bg-dark">
                    <?php endforeach; ?>
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                        <h2 class="text-center text-danger">Click on the user to display messages</h2>

                    </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
