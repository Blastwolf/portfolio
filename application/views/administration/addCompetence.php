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

    <!--<div class="col-4 col-12-xsmall">
        <label for="level">Niveau de maitrise de la competence : </label>
        <input style="background-color:#312450;" type="text" name="level" value="">
    </div>-->
    <div class="col-4 col-12-xsmall">
        <label for="level">Niveau : </label>
        <select name="level">
            <option value="debutant" <?php if (set_value('level') == 'debutant') echo 'selected' ?>>Débutant</option>
            <option value="intermediaire" <?php if (set_value('level') == 'intermediaire') echo 'selected' ?>>intermédiaire</option>
            <option value="bon" <?php if (set_value('level') == 'bon') echo 'selected' ?>>Bon</option>
            <option value="excellent" <?php if (set_value('level') == 'excellent') echo 'selected' ?>>Excellent</option>
        </select>
    </div>

    <ul class="actions">
        <li><input type="submit" value="Valider" class="primary"></li>
        <li><a href="<?= base_url('administration') ?>" class="button">Annuler</a></li>
    </ul>
</div><br/>
<?= validation_errors() ?>
</div>
</form>