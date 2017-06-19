<div class="row">
    <form action="index.php?action=<?php echo $action; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
        
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

            <div class="form-group">
                <label for="street">Strasse:</label>
                <input class="form-control" type="text" name="street" value="<?php neat($user->getStreet()); ?>">
            </div>

            <div class="form-group">
                <label for="postcode">Postleitzahl:</label>
                <input class="form-control" type="text" name="postcode" value="<?php neat($user->getPostcode()); ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="city">Stadt:</label>
                <input class="form-control" type="text" name="city" value="<?php neat($user->getCity()); ?>">
            </div>

            <div class="form-group">
                <label for="usergroup">Benutzergruppe:</label>
                <select class="form-control" name="usergroup">
                    <option value="admin" <?php if ($user->getUsergroup() == "admin") { echo "selected"; }?>>admin</option>
                    <option value="user" <?php if ($user->getUsergroup() == "user") { echo "selected"; }?>>user</option>
                </select>
            </div>

            <?php if ($action == "editUser") { ?>
                <div class="form-group">
                    <label for="created">Erstellt:</label>
                    <input class="form-control" type="text" value="<?php echo neat($user->getCreated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <?php if ($action == "editUser") { ?>
                <div class="form-group">
                    <label for="updated">Geändert:</label>
                    <input class="form-control" type="text" value="<?php echo neat($user->getUpdated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <input class="btn btn-primary" type="submit" value="Speichern" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=viewUsers">Zurück</a>
            <?php if ($action == "editUser") { ?>
                <a class="btn btn-danger" href="index.php?action=deleteUser&id=<?php echo $user->getId(); ?>">Diesen Benutzer löschen</a>
            <?php } ?>
        </div>
    </form>
</div>