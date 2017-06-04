<section class="container section">
    <div class="row">
        <h2>Devenir un athllète</h2>
        <hr>
        <p class="center">Pour devenir un athlète vous devez être au préalable être déjà inscript au club concerné. <br>
            Veuilllez remplir le formulaire suivant avec votre numéro de dossard et votre catégorie. <br>
            Ces données seront vérifiées par les administrateurs et votre demande sera acceptée ou refusée.
        </p>
        <div class="container">
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
            <?= form_open('user/addRequest', $attributes) ?>
            <div class="row">
                <div class="input-field col m8">
                    <input id="registerNum" name="registerNum" type="number">
                    <label for="registerNum">Numéro de dossard</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col m8">
                    <select name="category" class="browser-default">
                        <option value="" disabled>Catégorie de l'athlète</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= html_escape($category->id); ?>"><?= html_escape($category->name); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <button id="btSendAddRequest" name="btSendAddRequest" class="btn">Envoyer ma demande</button>
            </form>
        </div>
    </div>
</section>
