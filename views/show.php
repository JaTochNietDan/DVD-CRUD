<?php include('layout/header.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo $dvd->filmtitle; ?>
            <span class="pull-right label label-<?php echo $dvd->getCertColour(); ?>">
                <?php echo $dvd->cert; ?>
            </span>
        </h3>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Director</th>
            <td><?php echo $dvd->director; ?></td>
        </tr>
        <tr>
            <th>Release Date</th>
            <td><?php echo $dvd->releaseDate; ?></td>
        </tr>
        <tr>
            <th>Duration</th>
            <td><?php echo $dvd->filmDuration.'m'; ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $dvd->description; ?></td>
        </tr>
    </table>
</div>

<?php include('layout/footer.php'); ?>