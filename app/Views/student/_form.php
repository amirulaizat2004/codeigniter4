<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pelajar</label>
    <div class="col-sm-10">
      <input type="text" name="student_name" class="form-control <?= ($validation->getError('student_name'))?'is-invalid':''  ?>" id="student_name" value="<?= old('student_name',$model->student_name ??'') ?>">
      <div class="invalid-feedback">
          <?=$validation->getError('student_name')?>
        </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">No Matrik</label>
    <div class="col-sm-10">
      <input type="text" name="matrik_number" class="form-control <?= ($validation->getError('matrik_number'))?'is-invalid':''  ?>" id="matrik_number" value="<?= old('matrik_number',$model->matrik_number ??'') ?>">
      <div class="invalid-feedback">
          <?=$validation->getError('matrik_number')?>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Negeri</label>
    <div class="col-sm-10">
    <select id="state" name="state" class="form-control <?= ($validation->getError('state'))?'is-invalid':''  ?>">
        <option value="">Pilih...</option>
        <?php foreach ($state as $key => $value) { ?>
          <option <?=(old('state',$model->state ??'')==$key)?'selected':''  ?> value="<?= $key ?>"><?= $value ?></option>
        <?php } ?>
      </select>
      <div class="invalid-feedback">
          <?=$validation->getError('state')?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Pilihan Pertama</label>
    <div class="col-sm-10">
    <select id="inputState" name="id_course1" class="form-control <?= ($validation->getError('id_course1'))?'is-invalid':''  ?>">
        <option value="">Pilih...</option>
        <?php foreach ($course as $key => $value) { ?>
          <option <?=(old('id_course1',$model->id_course1 ??'')==$key)?'selected':''  ?> value="<?= $key ?>"><?= $value ?></option>
        <?php } ?>
  
      </select>
      <div class="invalid-feedback">
          <?=$validation->getError('id_course1')?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Pilihan Kedua</label>
    <div class="col-sm-10">
    <select id="id_course2" name="id_course2" class="form-control <?= ($validation->getError('id_course2'))?'is-invalid':''  ?>">
        <option value="">Pilih...</option>
        <?php foreach ($course as $key => $value) { ?>
          <option <?=(old('id_course2',$model->id_course2 ??'')==$key)?'selected':''  ?> value="<?= $key ?>"><?= $value ?></option>
        <?php } ?>

      </select>

      <div class="invalid-feedback">
          <?=$validation->getError('id_course2')?>
      </div>
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Jantina</legend>
      <div class="col-sm-10">
        
          <?php foreach ($gender as $key => $value) { ?>
            <div class="form-check">
            <input name="gender" class="form-check-input <?= ($validation->getError('gender'))?'is-invalid':''  ?>" type="radio" name="gridRadios" id="gridRadios1" <?=(old('gender',$model->gender ??'')==$key)?'checked':''  ?> value="<?= $key ?>">
            <label class="form-check-label" for="gridRadios1">
            <?= $value ?>
          </label>
          </div>
          <?php } ?>
          
        
        
      </div>
    </div>
  </fieldset>
