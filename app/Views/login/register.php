<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="card-body">
    <form action="<?= site_url('add-register') ?>" method="post">
    <?=  csrf_field() ?>
        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
        <input type="text" name="username" class="form-control <?= ($validation->getError('username'))?'is-invalid':''  ?>" id="username" value="<?= old('username',$model->username ??'') ?>">
        <div class="invalid-feedback">
            <?=$validation->getError('username')?>
            </div>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" name="email" class="form-control <?= ($validation->getError('email'))?'is-invalid':''  ?>" id="email" value="<?= old('email',$model->email ??'') ?>">
        <div class="invalid-feedback">
            <?=$validation->getError('email')?>
            </div>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" name="password" class="form-control <?= ($validation->getError('password'))?'is-invalid':''  ?>" id="password" value="<?= old('password',$model->password ??'') ?>">
        <div class="invalid-feedback">
            <?=$validation->getError('password')?>
            </div>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
        <input type="password" name="confirmpassword" class="form-control <?= ($validation->getError('confirmpassword'))?'is-invalid':''  ?>" id="confirmpassword" value="<?= old('confirmpassword') ?>">
        <div class="invalid-feedback">
            <?=$validation->getError('confirmpassword')?>
            </div>
        </div>
        </div>

        <div class="form-group row text-right">
        <div class="col-sm">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </div>

    </form>
</div>

<?= $this->endSection('content') ?>