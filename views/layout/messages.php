<?php
if(Flash::has('error')) { ?>
    <div class="alert alert-danger">
        <b>Errors: </b>
<?php
    foreach(Flash::get('error') as $error) {
?>
        <li><?php echo $error; ?></li>
<?php
    }
?>
    </div>
<?php
}
?>

<?php
if(Flash::has('success')) { ?>
    <div class="alert alert-success">
        <b>Success: </b>
<?php
    foreach(Flash::get('success') as $message) {
?>
        <li><?php echo $message; ?></li>
<?php
    }
?>
    </div>
<?php
}
?>