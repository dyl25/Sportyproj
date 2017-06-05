<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?= html_escape($title); ?></title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/athlete.css">
        <script src="<?= base_url(); ?>assets/javascript/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/materialize.min.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/myapp.js"></script>
        <script src="https://use.fontawesome.com/8c7af56c09.js"></script>       
        <?php
        if (isset($scripts)) {
            foreach ($scripts as $src) {
                ?>
                <script src="<?= $src; ?>" ></script>   
                <?php
            }
        }
        ?>
        <?php
        if (isset($customSrc)) {
            foreach ($customSrc as $src) {
                echo $src;
            }
        }
        ?>
    </head>
    <body>
        <!-- Sidenav -->
        <div class="row">
            <div class="col s12 m2 hide-on-small-only sideBack no-padding">
                <div class="profile-data text-center section">
                    <?php if (isset($athlete->picture)) { ?>
                        <img src="<?= base_url(); ?>assets/images/upload/<?= html_escape($athlete->picture); ?>" alt="Image de profile" class="circle responsive-img center-block">
                    <?php } else { ?>
                        <img src="<?= base_url(); ?>assets/images/defaultProfilePic.png" alt="Image de profile" class="circle responsive-img center-block">
                    <?php } ?>
                    <p class="center white-text"><?php
                        if (isset($athlete->login)) {
                            echo html_escape($athlete->login);
                        }
                        ?></p>
                </div>
                <ul>
                    <li><a href="<?= site_url('athlete/dashboard_athlete'); ?>"><i class="material-icons left">dashboard</i> Dashboard</a></li>
                    <li class="no-padding">
                        <ul class="collapsible no-margin" data-collapsible="accordion">
                            <li>
                                <a href="<?= site_url('athlete/result_athlete') ?>"><i class="material-icons left">alarm_on</i>Mes résultats</a>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">add_alert</i> Evénements <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('athlete/event_athlete'); ?>">Tous les événements</a></li>
                                        <li><a href="<?= site_url('athlete/event_athlete/competitions'); ?>">Compétitions</a></li>
                                        <li><a href="<?= site_url('athlete/event_athlete/reunions'); ?>">Réunions</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">location_on</i>Parcours d'échauffement <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('athlete/map_athlete'); ?>">Consulter</a></li>
                                        <li><a href="<?= site_url('athlete/map_athlete/add'); ?>">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">supervisor_account</i> Informations de compte <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="<?= site_url('athlete/user_athlete/view'); ?>">Voir</a></li>
                                        <li><a href="<?= site_url('athlete/user_athlete/edit'); ?>">Modifier</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('accueil'); ?>" class="darken-4waves"><i class="material-icons left">store</i> Accueil du site</a></li>
                    <li><a href="<?= site_url('logout'); ?>" class="darken-4waves"><i class="material-icons left">power_settings_new</i> Déconnexion</a></li>
                </ul>
            </div>
            <!-- Nav mobile -->
            <ul id="nav-mobile" class="side-nav">
                <li><a href="<?= site_url('athlete/dashboard_athlete'); ?>"><i class="material-icons left">dashboard</i> Dashboard</a></li>
                <li class="no-padding">
                    <ul class="collapsible no-margin" data-collapsible="accordion">
                        <li>
                            <a href="<?= site_url('athlete/result_athlete') ?>"><i class="material-icons left">alarm_on</i>Mes résultats</a>
                        </li>
                        <li>
                            <a class="collapsible-header"><i class="material-icons left">add_alert</i> Evénements <i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body no-padding">
                                <ul>
                                    <li><a href="<?= site_url('athlete/event_athlete'); ?>">Tous les événements</a></li>
                                    <li><a href="<?= site_url('athlete/event_athlete/competitions'); ?>">Compétitions</a></li>
                                    <li><a href="<?= site_url('athlete/event_athlete/reunions'); ?>">Réunions</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header"><i class="material-icons left">location_on</i>Parcours d'échauffement <i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body no-padding">
                                <ul>
                                    <li><a href="<?= site_url('athlete/map_athlete'); ?>">Consulter</a></li>
                                    <li><a href="<?= site_url('athlete/map_athlete/add'); ?>">Ajouter</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="<?= site_url('accueil'); ?>" class="darken-4waves"><i class="material-icons left">store</i> Accueil du site</a></li>
                <li><a href="<?= site_url('logout'); ?>" class="darken-4waves"><i class="material-icons left">power_settings_new</i> Déconnexion</a></li>
            </ul>
            <div class="col s12 m10 offset-m2">
                <!-- Nav mobile -->
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#"><i class="material-icons left">dashboard</i> Dashboard</a></li>
                    <li class="no-padding">
                        <ul class="collapsible no-margin" data-collapsible="accordion">
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">supervisor_account</i> Users <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="#!">Gérer</a></li>
                                        <li><a href="#!">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header"><i class="material-icons left">library_books</i> Articles <i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body no-padding">
                                    <ul>
                                        <li><a href="#!">Gérer</a></li>
                                        <li><a href="#!">Ajouter</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
                <main>
                        <?php if (isset($notification)) { ?>
                        <section>
    <?php if ($notification['status'] == 'error') { ?>
                                <div class="card-panel red">
                                    <p class="white-text"><i class="material-icons">report_problem</i> <?= $notification['msg']; ?></p>
                                </div>
    <?php } elseif ($notification['status'] == 'success') { ?>
                                <div class="card-panel green">
                                    <p class="white-text"><i class="material-icons">done</i> <?= $notification['msg']; ?></p>
                                </div>
                        <?php } ?>
                        </section>
<?php } elseif ($this->session->flashdata('notification')) { ?>
    <?php if ($this->session->flashdata('notification')['status'] == 'error') { ?>
                            <div class="card-panel red">
                                <p class="white-text"><i class="material-icons">report_problem</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                            </div>
    <?php } elseif ($this->session->flashdata('notification')['status'] == 'success') { ?>
                            <div class="card-panel green">
                                <p class="white-text"><i class="material-icons">done</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    <section class="row">
                        <?php foreach ($content as $data): ?>
    <?= $data; ?>
<?php endforeach; ?>
                    </section>
                </main>
            </div>
        </div>   
    </body>   
</html>