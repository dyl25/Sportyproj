<section class="container section">
    <div class="row">
        <h2 class="center">S'inscrire</h2>
        <hr>
        <?php if (isset($notification)) { ?>
                <?php if ($notification['status'] == 'error') { ?>
                    <div class="card-panel red">
                        <p class="white-text"><i class="material-icons">report_problem</i> <?= $notification['msg']; ?></p>
                    </div>
                <?php } elseif ($notification['status'] == 'success') { ?>
                    <div class="card-panel green">
                        <p class="white-text"><i class="material-icons">done</i> <?= $notification['msg']; ?></p>
                    </div>
                <?php } ?>
        <?php } elseif (validation_errors()) { ?>
            <div class="card-panel red">
                <p class="white-text"><i class="material-icons">report_problem</i> <?= validation_errors('', ''); ?></p>
            </div>
        <?php } ?>

        <?= form_open('user/signup', $attributes); ?>

        <fieldset>

            <div class="input-field">
                <input id="username" name="username" type="text" class="validate" required="required">
                <label for="username">Login</label> 
            </div>

            <div class="input-field">
                <input id="password" name="password" type="password" class="validate" required="required">
                <label for="password">Mot de passe</label> 
            </div>

            <div class="input-field">
                <input id="passwordVerif" name="passwordVerif" type="password" class="validate" required="required">
                <label for="passwordVerif">Confirmation du mot de passe</label> 
            </div>

            <div class="input-field">
                <input id="email" name="email" type="email" class="validate" required="required">
                <label for="email">E-mail</label> 
            </div>

            <button name="btSendInscription" class="btn waves-effect" type="submit">S'inscrire</button>

        </fieldset>
        </form>
    </div>
</section>