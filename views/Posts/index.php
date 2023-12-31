<div class="d-flex justify-content-center flex-column align-items-center">
    
    <?php if(isset($_SESSION['is_logged_in'])) : ?>

    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>posts/add">Share Something</a>

    <?php endif; ?>
    
    <?php foreach($viewmodel as $item) : ?>


        <div class="card bg-light mb-3 d-flex justify-content-center" style="min-width: 60vw; max-width: 60vw;">
        <div class="card-header "><small><?php echo $item['create_date']; ?></small></div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $item['title'] ?></h5>
            <p class="card-text"><?php echo $item['body']; ?></p>
            <a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Get me there.</a>
        </div>
        </div>
    <?php endforeach; ?>

    
</div>