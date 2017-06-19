<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Raum</th>
                <th>Anzahl Sitze</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $room) { ?>
                <tr>
                    <td><?php echo neat($room->getId()); ?></td>  
                    <td><?php echo neat($room->getTitle()); ?></td>
                    <td><?php echo neat($room->getSeats()); ?></td>
                    <td><a class="btn btn-success btn-xs" href="index.php?action=editRoom&id=<?php echo $room->getId(); ?>">Bearbeiten</a></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>
<a class="btn btn-default" href="index.php?action=newRoom">Neuen Raum anlegen</a>