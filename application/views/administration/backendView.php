<div class="inner">
    <div class="table-wrapper">
        <h2>Tableau des expériences</h2>
        <a href="<?= base_url('administration/addExperience/') ?>" class="button small">Ajouter</a><br/><br/>
        <?php if (!empty($this->session->flashdata('messageExp'))) { ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('messageExp') ?>
            </div>
        <?php } ?>

        <table class="alt">
            <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($experiences as $experience) { ?>
                <tr>
                    <td>Du <?= $experience['date_debut'] ?> au <?= $experience['date_fin'] ?></td>
                    <td><?= $experience['titre'] ?></td>
                    <td><a href="<?= base_url('administration/editExperience/' . $experience['id']) ?>">Modifier</a></td>
                    <td><a href="<?= base_url('administration/deleteExperience/' . $experience['id']) ?>" onClick="return confirm('Etes vous sur de vouloir supprimer cette experience ?')">Supprimer</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="table-wrapper">
        <h2>Tableau des compétences</h2>
        <a href="<?= base_url('administration/addCompetence/') ?>" class="button small">Ajouter</a><br/><br/>

        <?php if (!empty($this->session->flashdata('messageComp'))) { ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('messageComp') ?>
            </div>
        <?php } ?>

        <table class="alt">
            <thead>
            <tr>
                <th>Categorie</th>
                <th>Nom</th>
                <th>Niveau</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($competences as $competence) { ?>
                <tr>
                    <td><?= $competence['category'] ?></td>
                    <td><?= $competence['name'] ?></td>
                    <td><?= $competence['level'] ?></td>
                    <td><a href="<?= base_url('administration/editCompetence/' . $competence['id']) ?>">Modifier</a></td>
                    <td><a href="<?= base_url('administration/deleteCompetence/' . $competence['id']) ?>" onClick="return confirm('Etes vous sur de vouloir supprimer cette experience ?')">Supprimer</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>