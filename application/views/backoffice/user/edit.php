<section class="row">
    <h2>Editer un utilisateur</h2>

    <?= validation_errors(); ?>

    <?= form_open_multipart('backoffice/user_admin/edit/' . $user->id, $attributes) ?>

    <!-- Text input-->
    <div class="row">
        <div class="input-field col s6">
            <input id="login" name="login" type="text" class="validate" required="" value="<?= $user->login ?>">
            <label for="login">Login</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="email" name="email" type="email" class="validate" required="" value="<?= $user->email ?>">
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
        <div class="input-field col s6">
            <select name="role" required="required">
                <option value="" disabled>Rôle de l'utilisateur</option>
                <?php foreach ($roles as $role) { ?>
                    <option value="<?= $role->name; ?>" <?php
                    if ($role->name == $user->name) {
                        echo "selected=selected";
                    }
                    ?> ><?= $role->name; ?></option>

                <?php } ?>
            </select>
            <label>Rôle de l'utilisateur</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <select name="club" class="browser-default">
                <option value="" disabled>Club de l'athlète</option>
                <?php foreach ($clubs as $club) { ?>
                    <option value="<?= $club->id; ?>" <?php
                    if ($role->name == $user->name) {
                        echo "selected=selected";
                    }
                    ?>><?= $club->name; ?></option>
                        <?php } ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="registerNum" name="registerNum" type="number">
            <label for="registerNum">Numéro de dossard</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <select name="category" class="browser-default">
                <option value="" disabled>Catégorie de l'athlète</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field col m9">
            <div class="btn">
                <span>Image de profil</span>
                <input name="image" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" value="<?= $user->profile_image; ?>">
            </div>
        </div>
        <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
    </div>

    <!-- Button -->
    <button id="btSendUserEdit" name="btSendUserEdit" class="btn">Modifier l'utilisateur</button>

</form>
</section>




