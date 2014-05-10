<?php include('layout/header.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">DVD Movie Index</h3>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Director</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($dvds) == 0) { ?>
            <tr>
                <td colspan="4">There are no DVDs yet!</td>
            </tr>
            <?php } ?>
        
            <?php foreach($dvds as $dvd) { ?>
            <tr>
                <td>
                    <a href="show.php?id=<?php echo $dvd->ID; ?>">
                        <?php echo $dvd->filmtitle; ?>
                    </a>
                    <span class="pull-right label label-<?php echo $dvd->getCertColour(); ?>">
                        <?php echo $dvd->cert; ?>
                    </span>
                </td>
                <td><?php echo $dvd->releaseDate; ?></td>
                <td><?php echo $dvd->director; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit.php?id=<?php echo $dvd->ID; ?>">
                        Edit
                    </a>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $dvd->ID; ?>" />
                        <input type="hidden" name="_token" value="<?php echo Input::token(); ?>" />
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger confirme" />
                    </form>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4"><a href="create.php" class="btn btn-success">Add new title</a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include('layout/footer.php'); ?>