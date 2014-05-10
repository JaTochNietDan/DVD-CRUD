<?php include('layout/header.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create new title</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST">
            <?php include('form.php'); ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Create" class="btn btn-primary" name="store" />
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('layout/footer.php'); ?>