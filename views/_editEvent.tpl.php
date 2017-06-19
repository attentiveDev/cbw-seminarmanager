<div class="row">
    <div class="col-sm-7">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $event->getId(); ?>">

            <div class="form-group">
                <label for="startdate">Seminarbegin:</label>
                <input class="form-control" type="text" id="dp-start" name="startdate" value="<?php echo neat($event->getStartdate()->format('d.m.Y')); ?>">
            </div>

            <div class="form-group">
                <label for="enddate">Seminarende:</label>
                <input class="form-control" type="text" id="dp-end" name="enddate" value="<?php echo neat($event->getEnddate()->format('d.m.Y')); ?>">
            </div>

            <div class="form-group">
                <label for="course">Seminar:</label>
                <select class="form-control" name="course">
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?php echo $course->getId(); ?>" <?php
                        if ($action == "editEvent" && $course->getTitle() == $event->getCourse()->getTitle()) {
                            echo "selected";
                        }
                        ?>><?php echo $course->getTitle(); ?></option>
                            <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="room">Raum:</label>
                <select class="form-control" name="room">
                    <?php foreach ($rooms as $room) { ?>
                        <option value="<?php echo $room->getId(); ?>" <?php
                        if ($action == "editEvent" && $room->getTitle() == $event->getRoom()->getTitle()) {
                            echo "selected";
                        }
                        ?>><?php echo $room->getTitle(); ?></option>
                            <?php } ?>
                </select>
            </div>

            <?php if ($action == "editEvent") { ?>
                <div class="form-group">
                    <label for="created">Erstellt:</label>
                    <input class="form-control" type="text" value="<?php echo $event->getCreated()->format('Y-m-d H:i'); ?>" readonly>
                </div>
            <?php } ?>

            <?php if ($action == "editEvent") { ?>
                <div class="form-group">
                    <label for="updated">Geändert:</label>
                    <input class="form-control" type="text" value="<?php echo $event->getUpdated()->format('Y-m-d H:i'); ?>" readonly>
                </div>
            <?php } ?>

            <input class="btn btn-primary" type="submit" value="Speichern" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=viewEvents">Abbrechen</a>
            <?php if ($action == "editEvent") { ?>
                <a class="btn btn-danger" href="index.php?action=deleteEvent&id=<?php echo $event->getId(); ?>">Diesen Termin löschen</a>
            <?php } ?>

        </form>
    </div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Über Termine</h4>
                <p>Die Seminare werden nur bei bestehenden Terminen angezeigt. Die Termine verbinden auch das Seminar mit dem dazugehörigen Raum.</p>
                <p>Bei der Auswahl des Datums wurde hier jquery-ui benutzt.</p>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#dp-start").datepicker({dateFormat: 'dd.mm.yy'});
        $("#dp-end").datepicker({dateFormat: 'dd.mm.yy'});
    });
</script>