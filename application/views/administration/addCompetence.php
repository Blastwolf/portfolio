<h2>Ajouter une competence</h2>
<?= form_open('administration/addCompetence/') ?>
<div class="row gtr-uniform">
    <div class="col-12">
        <label for="category">Categorie : </label>
        <select name="category">
            <option value="technique">Technique</option>
            <option value="social">Social</option>
        </select>
    </div>
    <div class="col-6 col-12-xsmall">
        <label for="name">Competence : </label>
        <input style="background-color:#312450;" type="text" name="name" value="<?php echo set_value('name') ?>">
    </div>

    <div class="col-4 col-12-xsmall">
        <label for="level">Niveau de maitrise de la competence : </label>
        <input style="background-color:#312450;" type="text" name="level" value="<?php echo set_value('level') ?>">
    </div>

    <ul class="actions">
        <li><input type="submit" value="Valider" class="primary"></li>
        <li><a href="<?= base_url('administration') ?>" class="button">Annuler</a></li>
    </ul>
</div><br/>
<?= validation_errors() ?>
</div>
</form>