<div class="container">
    <?= $this->session->flashdata('success'); ?>
    <?= validation_errors(); ?>

    <?= form_open('user/signup', $attributes); ?>

    <fieldset>

        <!-- Form Name -->
        <legend>Subscribe</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="username">Username</label>  
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input id="username" name="username" type="text" placeholder="Your username" class="form-control input-md" required="required">
                </div>
                <span class="help-block">Enter here your username</span>  

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input id="password" name="password" type="password" placeholder="Your password" class="form-control input-md" required="required">
                </div>
                <span class="help-block">Enter here your password</span>
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordVerif">Password verification</label>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input id="passwordVerif" name="passwordVerif" type="password" placeholder="Your password" class="form-control input-md" required="required">
                </div>
                <span class="help-block">Enter here your password for the verification</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">E-mail</label>  
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input id="email" name="email" type="text" placeholder="Your e-mail" class="form-control input-md" required="required">
                </div>
                <span class="help-block">Enter here your e-mail</span>  
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="btSendInscription"></label>
            <div class="col-md-4">
                <button id="btSendInscription" name="btSendInscription" class="btn btn-success">Subscribe</button>
            </div>
        </div>

    </fieldset>
</form>
</div>