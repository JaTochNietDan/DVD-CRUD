<input type="hidden" name="_token" value="<?php echo Input::token(); ?>" />
<div class="form-group">
    <label class="col-sm-2 control-label">Title</label>
    <div class="col-sm-8">
        <input value="<?php echo Input::old('filmtitle', isset($dvd) ? $dvd->filmtitle : ''); ?>" id="title" type="text" name="filmtitle" class="form-control" placeholder="Film's title">
    </div>
    <div class="col-sm-2">
        <a class="btn btn-success" id="IMDB">Fetch Movie Info</a>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Certificate</label>
    <div class="col-sm-10">
        <select name="cert" class="form-control">
            <option value="18"<?php if(Input::old('cert', isset($dvd) ? $dvd->cert : '') == '18') echo ' selected'; ?>>18</option>
            <option value="15"<?php if(Input::old('cert', isset($dvd) ? $dvd->cert : '') == '15') echo ' selected'; ?>>15</option>
            <option value="12"<?php if(Input::old('cert', isset($dvd) ? $dvd->cert : '') == '12') echo ' selected'; ?>>12</option>
            <option value="PG"<?php if(Input::old('cert', isset($dvd) ? $dvd->cert : '') == 'PG') echo ' selected'; ?>>PG</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Release Date</label>
    <div class="col-sm-10">
        <input value="<?php echo Input::old('releaseDate', isset($dvd) ? $dvd->releaseDate : ''); ?>" id="release" type="text" name="releaseDate" class="form-control" placeholder="Film's release date">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Duration</label>
    <div class="col-sm-10">
        <input value="<?php echo Input::old('filmDuration', isset($dvd) ? $dvd->filmDuration : ''); ?>" id="duration" type="text" name="filmDuration" class="form-control" placeholder="Film's duration in minutes">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Director</label>
    <div class="col-sm-10">
        <input value="<?php echo Input::old('director', isset($dvd) ? $dvd->director : ''); ?>" id="director" type="text" name="director" class="form-control" placeholder="Film's director">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea id="description" rows="10" name="description" class="form-control"><?php echo Input::old('description', isset($dvd) ? $dvd->description : ''); ?></textarea>
    </div>
</div>