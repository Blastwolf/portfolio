<h2>Form</h2>
<?= form_open_multipart('administration/editExperience/' . $experience['id']) ?>
<div class="row gtr-uniform">
    <div class="col-6 col-12-xsmall">
        <label for="date_debut">Date de début</label>
        <input style="background-color:ghostwhite;color:black;" type="date" name="date_debut" value="<?= $experience['date_debut_us'] ?>">
    </div>
    <div class="col-6 col-12-xsmall">
        <label for="date_fin">Date de fin</label>
        <input style="background-color:ghostwhite;color:black;" type="date" name="date_fin" value="<?= $experience['date_fin_us'] ?>">
    </div>

    <div class="col-12">
        <label for="userfile">Ajouter une image</label>
        <input style="background-color:#312450;" type="file" name="userfile">
    </div>

    <div class="col-12">
        <label for="lien">Lien vers le projet</label>
        <input type="text" name="lien" value="<?= $experience['lien'] ?>">
    </div>

    <div class="col-12">
        <label for="titre">Titre</label>
        <input type="text" name="titre" value="<?= $experience['titre'] ?>">
    </div>
    <div class="col-12">
        <label for="description">Déscription</label>
        <textarea name="description" rows="6"><?= $experience['description'] ?></textarea>
    </div>
    <div class="col-12">
        <ul class="actions">
            <li><input type="submit" value="Valider" class="primary"></li>
            <li><a href="<?= base_url('administration') ?>" class="button">Annuler</a></li>
        </ul>
    </div>
</div>
<br/>

<?= $error ?>
<?= validation_errors() ?>
</form>
