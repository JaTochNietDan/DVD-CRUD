<?php include('layout/header.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit <?php echo $dvd->filmtitle; ?></h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST">
            <?php include('form.php'); ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Save" class="btn btn-primary" name="update" />
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('layout/footer.php'); ?>