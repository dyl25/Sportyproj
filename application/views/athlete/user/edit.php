<section class="row">
    <h2>Editer un utilisateur</h2>

    <?= validation_errors(); ?>

    <?= form_open_multipart('athlete/user_athlete/edit/' . html_escape($user->id), $attributes) ?>

    <!-- Text input-->
    <div class="row">
        <div class="input-field col s6">
            <input id="login" name="login" type="text" class="validate" required="" value="<?= html_escape($user->login); ?>">
            <label for="login">Login</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="email" name="email" type="email" class="validate" required="" value="<?= html_escape($user->email); ?>">
            <label for="email">E-mail</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="password" name="password" type="password" >
            <label for="password">Nouveau mot de passe</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="passwordVerif" name="passwordVerif" type="password" >
            <label for="passwordVerif">Vérification du nouveau mot de passe</label> 
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field col m9">
            <div class="btn">
                <span>Image de profil</span>
                <input name="image" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" value="<?= html_escape($user->profile_image); ?>">
            </div>
        </div>
        <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
    </div>

    <!-- Button -->
    <button id="btSendUserEdit" name="btSendUserEdit" class="btn">Modifier l'utilisateur</button>

</form>
</section>




