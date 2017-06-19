<div class="row">
    <form action="index.php?action=<?php echo $action; ?>" method="post">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="firstname">Vorname:</label>
                <input class="form-control" type="text" name="firstname" value="<?php neat($user->getFirstname()); ?>">
            </div>

            <div class="form-group">
                <label for="lastname">Nachname:</label>
                <input class="form-control" type="text" name="lastname" value="<?php neat($user->getLastname()); ?>">
            </div>

            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input class="form-control" type="email" name="email" value="<?php neat($user->getEmail()); ?>">
            </div>

            <div class="form-group">
                <label for="clearpwd">Passwort:</label>
                <input class="form-control" type="password" name="clearpwd" value="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="street">Strasse:</label>
                <input class="form-control" type="text" name="street" value="<?php neat($user->getStreet()); ?>">
            </div>

            <div class="form-group">
                <label for="postcode">Postleitzahl:</label>
                <input class="form-control" type="text" name="postcode" value="<?php neat($user->getPostcode()); ?>">
            </div>

            <div class="form-group">
                <label for="city">Stadt:</label>
                <input class="form-control" type="text" name="city" value="<?php neat($user->getCity()); ?>">
            </div>
            <input class="btn btn-primary" type="submit" value="Registrieren" name="submitbutton">
        </div>
    </form>
</div>
