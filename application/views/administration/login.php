<h2>Administration</h2>
<?= form_open('login/index'); ?>
<div class="row gtr-uniform">
    <div class="col-6 col-12-xsmall">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" value="<?= set_value('username') ?>">
    </div>
    <div class="col-6 col-12-xsmall">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
    </div>
    <div class="col-12">
        <ul class="actions">
            <input type="submit" name="submit" value="Valider" class="primary">
        </ul>
    </div>
</div>
<br/>

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-warning">
        <?= $this->session->flashdata('message') ?>
    </div>
<?php } else { ?>
    <?= validation_errors() ?>
<?php } ?>
</form>
</div>
