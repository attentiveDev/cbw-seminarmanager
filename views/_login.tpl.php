<div class="row">
    <div class="col-sm-5">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input class="form-control" type="email" name="email" value="" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="clearpwd">Passwort:</label>
                <input class="form-control" type="password" name="clearpwd" value="">
            </div>

            <input class="btn btn-primary" type="submit" value="Anmelden" name="submitbutton">
        </form>
    </div>
    <div class="col-sm-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Die Anmeldung</h4>
                <p>Mittels folgenden Kombinationen kann man sich an dem Seminarmanager anmelden:</p>
                <ul>
                    <li><strong>Benutzername(E-Mail):</strong> admin@cbw.local <strong>Passwort:</strong> admin</li>
                    <li><strong>Benutzername(E-Mail):</strong> user@cbw.local <strong>Passwort:</strong> user</li>
                </ul>
            </div>
        </div>
    </div>
</div>