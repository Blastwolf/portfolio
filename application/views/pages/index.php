<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Benjamin JANEL DWJ</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>"/>
    <noscript>
        <link rel="stylesheet" href="<?= base_url('public/assets/css/noscript.css') ?>"/>
    </noscript>
</head>
<body class="is-preload">
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <div id="presentation">
            <h3>Benjamin JANEL</h3>
            <h5>Développeur web Junior</h5>
        </div>
        <nav>
            <ul>
                <li><a href="#intro">Présentation</a></li>
                <li><a href="#one">Projets réalisés</a></li>
                <li><a href="#two">Compétences</a></li>
                <li><a href="#three">Me contacter</a></li>
            </ul>
        </nav>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Intro -->
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <div class="image-container">
                <img src="<?= base_url('public/images/test_bg2.jpg') ?>">
            </div>
            <h1>Développeur Web Junior</h1>
            <p>Mon parcours, complété par ma passion pour internet et l'informatique, m'a permis d'acquérir les connaissances techniques et pratiques indispensables à l'exercice de ce métier. Possédant les compétences de base des différents
               langages informatiques (HTML,PHP, JavaScript, Mysql…), je désire confirmer mes compétences en création et développement de logiciels, de progiciels et sites web.</p>
            <ul class="actions">
                <li><a href="#one" class="button scrolly">Projets réalisés</a></li>
            </ul>
        </div>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style2 spotlights">

        <?php foreach ($experiences as $experience) { ?>
            <section class="experience">
                <a href="#" class="image"><img src="<?= base_url('uploads/' . $experience['image'] . '') ?>" alt="<?= $experience['titre'] ?>" data-position="top center"/></a>
                <div class="content">
                    <div class="inner">
                        <small>Du <?= $experience['date_debut'] ?> au <?= $experience['date_fin'] ?></small>
                        <h2><?= $experience['titre'] ?></h2>
                        <p><?= $experience['description'] ?></p>
                        <ul class="actions">
                            <li><a href="<?= base_url('' . $experience['lien'] . '') ?>" class="button" target="_blank">Voir le projet</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        <?php } ?>
    </section>
    <!-- Two -->
    <section id="two" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>Listes des compétences</h2>
            <p>Ci-dessous quelques compétences développé au cours de ma formation et des différents projet réalisé.</p>

            <div class="competences">
                <h3>Techniques :</h3>
                <div class="techniques">
                    <hr>
                    <?php foreach ($competences as $competence) {
                        if ($competence['category'] == 'technique') { ?>
                            <div class="col-2 competence">
                                <h4><?= $competence['name'] ?></h4>
                                <div class="rating-wrapper">
                                    <div class="level" style="width:<?= $competence['level'] ?>%;" data-size="<?= $competence['level'] ?>"><span class="status"><?= $competence['level'] ?>%</span></div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <hr>
                <h3>Social :</h3>
                <div class="socials">
                    <?php foreach ($competences as $competence) {
                        if ($competence['category'] == 'social') { ?>
                            <div class="col-2 competence">
                                <h4><?= $competence['name'] ?></h4>
                                <div class="rating-wrapper">
                                    <div class="level" style="width:<?= $competence['level'] ?>%;" data-size="<?= $competence['level'] ?>"><span class="status"><?= $competence['level'] ?>%</span></div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>

            <ul class="actions">
                <li><a href="generic.html" class="button">Learn more</a></li>
            </ul>
        </div>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style1 fade-up">
        <div class="inner">
            <h2>Me contacter</h2>
            <p>Si vous souhaitez prendre contact vous pouvez m'envoyer un message via ce formulaire.</p>

            <section>
                <form method="post" action="<?= base_url('pages/contact#three') ?>">
                    <div class="fields">
                        <div class="field half">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" value="<?= set_value('name') ?>"/>
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?= set_value('email') ?>"/>
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5" value="<?= set_value('message') ?>"></textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Valider"></li>
                    </ul>
                </form>

                <?php if (!empty($this->session->flashdata('messageOk'))) { ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('messageOk') ?>
                    </div>
                <?php } elseif (!empty($this->session->flashdata('messageKo'))) { ?>
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('messageKo') ?>
                    </div>
                <?php } ?>
                <?= validation_errors() ?>

            </section>

        </div>

    </section>

</div>

<!-- Footer -->
<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <li>Par Benjamin JANEL.</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script src="<?= base_url('public/assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/jquery.scrollex.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/jquery.scrolly.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/browser.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/breakpoints.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/util.js') ?>"></script>
<script src="<?= base_url('public/assets/js/main.js') ?>"></script>
<script src="<?= base_url('public/assets/js/script.js') ?>"></script>

</body>
</html>