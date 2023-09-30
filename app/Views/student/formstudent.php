<?php 
$request = \Config\Services::request();
?>
<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="card-body">
<form action="<?= site_url('student-store') ?>" method="POST">
<?= csrf_field() ?>


  
<?= $this->include('student/_form') ?>

  <!-- <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div> -->
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
</div>


<?= $this->endSection('content') ?>

<?= $this->section('script') ?>

<script>
$(document).ready(function() {
                  // console.log("ready");
                  $("#id_course2").select2();
                });


</script>


<?= $this->endSection('script') ?>