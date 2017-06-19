<div class="row">
    <div class="col-sm-7">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $room->getId(); ?>">

            <div class="form-group">
                <label for="title">Name:</label>
                <input class="form-control" type="text" name="title" value="<?php neat($room->getTitle()); ?>">
            </div>

            <div class="form-group">
                <label for="seats">Anzahl Sitze:</label>
                <input class="form-control" type="text" name="seats" value="<?php neat($room->getSeats()); ?>">
            </div>

            <?php if ($action == "editRoom") { ?>
                <div class="form-group">
                    <label for="created">Erstellt:</label>
                    <input class="form-control" type="text" value="<?php echo neat($room->getCreated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <?php if ($action == "editRoom") { ?>
                <div class="form-group">
                    <label for="updated">Geändert:</label>
                    <input class="form-control" type="text" value="<?php echo neat($room->getUpdated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <input class="btn btn-primary" type="submit" value="Speichern" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=viewRooms">Zurück</a>
            <?php if ($action == "editRoom") { ?>
                <a class="btn btn-danger" href="index.php?action=deleteRoom&id=<?php echo $room->getId(); ?>">Diesen Raum löschen</a>
            <?php } ?>
        </form>
    </div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Über Räume</h4>
                <p>Die Räume dienen zur Planung und zur Bestimmung der maximalen Teilnehmer pro Seminartermin.</p>
            </div>
        </div>
    </div>
</div>