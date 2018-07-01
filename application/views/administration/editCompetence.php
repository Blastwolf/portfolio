<h2>Modifier une competence</h2>
<?= form_open('administration/editCompetence/' . $competence['id']) ?>
<div class="row gtr-uniform">
    <div class="col-12">
        <label for="category">Categorie : </label>
        <select name="category">
            <option value="technique" <?php if ($competence['category'] == 'technique') echo 'selected'; ?>>Technique</option>
            <option value="social" <?php if ($competence['category'] == 'social') echo 'selected'; ?>>Social</option>
        </select>
    </div>

    <div class="col-6 col-12-xsmall">
        <label for="name">Competence : </label>
        <input style="background-color:#312450;" type="text" name="name" value="<?= $competence['name'] ?>">
    </div>

    <div class="col-4 col-12-xsmall">
        <label for="level">Niveau de maitrise de la competence : </label>
        <input style="background-color:#312450;" type="text" name="level" value="<?= $competence['level'] ?>">
    </div>

    <ul class="actions">
        <li><input type="submit" value="Valider" class="primary"></li>
        <li><a href="<?= base_url('administration') ?>" class="button">Annuler</a></li>
    </ul>
</div>
<?= validation_errors() ?>
</div>
</form>