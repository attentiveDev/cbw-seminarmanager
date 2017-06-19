<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategorie</th>
                <th>Seminar</th>
                <th>Datum</th>
                <th>Raum</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $event) { ?>
                <tr>
                    <td><?php echo neat($event->getId()); ?></td>  
                    <td><?php echo neat($event->getCourse()->getCategory()->getTitle()); ?></td>
                    <td><?php echo neat($event->getCourse()->getTitle()); ?></td>
                    <td><?php echo $event->getStartdate()->format('d.m.Y') . " - " . $event->getEnddate()->format('d.m.Y'); ?></td>
                    <td><?php echo neat($event->getRoom()->getTitle()); ?></td>
                    <td><a class="btn btn-success btn-xs" href="index.php?action=editEvent&id=<?php echo $event->getId(); ?>">Bearbeiten</a></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>
<a class="btn btn-default" href="index.php?action=newEvent">Neuen Termin anlegen</a>