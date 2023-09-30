<?php
$request = \Config\Services::request();

?>

<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="card-body">

<div class="col">
    <form action="" method="get">
        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pelajar</label>
        <div class="col-sm-10">
        <input type="text" name="student_name" class="form-control" id="student_name" value='<?=$request->getVar('matrik_number')?>'>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombor Pelajar</label>
        <div class="col-sm-10">
        <input value='<?=$request->getVar('matrik_number')?>' name='matrik_number' type="text" class="form-control" id="inputEmail3">
        </div>
        </div>

  
        <div class="form-group row text-center">
        <div class="col-sm">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="<?=site_url('display-student')?>"
        class="btn btn-info">Reset</a>
        </div>
        </div>
    </form>
</div>

<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pelajar</th>
      <th scope="col">Nombor Pelajar</th>
      <th scope="col">Negeri</th>
      <th scope="col">Subjek 1</th>
      <th scope="col">Subjek 2</th>
      <th scope="col">Aktiviti</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($model as $value) { ?>
    <tr>
        <th scope="row"><?= ++$count ?></th>
        <td><?= $value -> student_name ??'' ?></td>
        <td><?= $value -> matrik_number ??'' ?></td>
        <td><?= $value -> state ??'' ?></td>
        <td><?= $value -> course1 ??'' ?></td>
        <td><?= $value -> course2 ??'' ?></td>
        <td>
            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
            <a href="<?= site_url('edit-student/'.$value -> id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <form action="<?= site_url('delete-student/'.$value->id) ?>" method="post">
                <input type="hidden" name="_method" value="DELETE" />
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash-o"></i>
                </button>
            </form>
           
        </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
</div>
<?= $show ?>
<?= $pager->links('std','new_pagination') ?>
</div>
<?= $this->endSection('content') ?>