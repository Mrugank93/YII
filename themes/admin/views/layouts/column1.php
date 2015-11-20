<?php $this->beginContent('//layouts/main'); ?>

    <div id="content">

        <!-- Menu Toggle on mobile -->
        <button type="button" class="btn btn-navbar main">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>

        <div class="separator bottom"></div>

        <?php echo $content;?>

    </div>


<?php $this->endContent(); ?>