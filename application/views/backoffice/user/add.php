<section class="row">
    <h2>Ajout d'un utilisateur</h2>

    <?= validation_errors(); ?>

    <?= form_open_multipart('backoffice/user_admin/add', $attributes) ?>

    <!-- Text input-->
    <div class="row">
        <div class="input-field col s6">
            <input id="login" name="login" type="text" class="validate" required="">
            <label for="login">Login</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="email" name="email" type="email" class="validate" required="">
            <label for="email">E-mail</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="password" name="password" type="password" class="validate" required="">
            <label for="password">Mot de passe</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input id="passwordVerif" name="passwordVerif" type="password" required="">
            <label for="passwordVerif">Vérification du mot de passe</label> 
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <select name="role" required="required">
                <option value="" disabled selected="">Rôle de l'utilisateur</option>
                <?php foreach ($roles as $role) { ?>
                    <option value="<?= html_escape($role->name); ?>"><?= html_escape($role->name); ?></option>
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
                    <option value="<?= html_escape($club->id); ?>"><?= html_escape($club->name); ?></option>
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
                    <option value="<?= html_escape($category->id); ?>"><?= html_escape($category->name); ?></option>
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
                <input class="file-path validate" type="text">
            </div>
        </div>
        <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
    </div>

    <!-- Button -->
    <button id="btSendAddUser" name="btSendAddUser" class="btn">Ajouter l'utilisateur</button>

</form>
</section>