<div class="row">
    <div class="col-sm-6">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $event->getId(); ?>">

            <div class="form-group">
                <label>Seminarkategorie:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getCourse()->getCategory()->getTitle()); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Seminartitel:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getCourse()->getTitle()); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Kursbegin:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getStartdate()->format('D, d.m.Y')); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Kursende:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getEnddate()->format('D, d.m.Y')); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Preis inkl. MwSt:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getCourse()->getPrice()); ?> EUR" readonly>
            </div>

            <div class="form-group">
                <label>Raum:</label>
                <input class="form-control" type="text"  value="<?php neat($event->getRoom()->getTitle()); ?>" readonly>
            </div>

    </div>

    <div class="col-sm-6">

        <div class="form-group">
            <label>Vollständiger Name:</label>
            <input class="form-control" type="text"  value="<?php neat($user->getFullUsername()); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Straße:</label>
            <input class="form-control" type="text"  value="<?php neat($user->getStreet()); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Postleitzahl:</label>
            <input class="form-control" type="text"  value="<?php neat($user->getPostcode()); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Stadt:</label>
            <input class="form-control" type="text"  value="<?php neat($user->getCity()); ?>" readonly>
        </div>

        <div class="form-group">
            <label>E-Mail Adresse:</label>
            <input class="form-control" type="text"  value="<?php neat($user->getEmail()); ?>" readonly>
        </div>

        <div class="form-group">
            <label>Ich bestätige hiermit das alle oben stehenden Angaben korrekt sind:</label><br>
            <input class="btn btn-primary" type="submit" value="Jetzt kostenpflichtig buchen" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=courses">Zurück</a>
        </div>

        </form>
    </div>
</div>