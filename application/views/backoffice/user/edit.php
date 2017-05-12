<section class="row">
    <h2>Editer un utilisateur</h2>
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
    <?php } ?>
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
                <option value="<?= $role->id; ?>" <?php if($role->id == $user->role_id){ echo "selected=selected";}  ?> ><?= $role->name; ?></option>
            <?php } ?>
        </select>
            <label>Rôle de l'utilisateur</label>
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




