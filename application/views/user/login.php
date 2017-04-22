<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?= $title; ?></title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/materialize.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
        <script src="<?= base_url(); ?>assets/javascript/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/materialize.min.js"></script>
        <script src="<?= base_url(); ?>assets/javascript/myapp.js"></script>
        <script src="https://use.fontawesome.com/8c7af56c09.js"></script>
        <?php
        if (isset($scripts)) {
            foreach ($scripts as $src) {
                ?>
                <script src="<?= $src; ?>"></script>   
                <?php
            }
        }
        ?>
    </head>
    <body id="signinPage">
        <div class="container">
            <div class="row">
                <div class="col m4 s12 offset-m4">
                    <?= validation_errors(); ?>
                    <?= form_open('login', $attributes); ?>
                    <fieldset>
                        <legend class="center">Se connecter</legend>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" name="email" id="email" class="validate" required="required">
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" name="password" id="password" class="validate" required="required">
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <button type="submit" class="btn light-blue darken-4 waves-effect">Connexion</button>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>