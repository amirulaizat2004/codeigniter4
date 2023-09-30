<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="card-body">
<form action="<?=  site_url('update-student/'.$model->id) ?>" method="post">
<input type="hidden" name="_method" value="PUT" />
    <?= csrf_field() ?>

    <?= $this->include('student/_form') ?>

    <div class="form-group row text-center">
    <div class="col-sm">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('display-student') ?>" class="btn btn-secondary">Kembali</a>
    </div>
    </div>
</form>
</div>
<?= $this->endSection('content') ?>