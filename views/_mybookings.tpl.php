<?php if (count($bookings) == 0) { ?>
    <div class="alert alert-info">Sie haben noch keine Seminare gebucht.</div>
<?php } else { ?>    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategorie</th>
                    <th>Seminar</th>
                    <th>Startdatum</th>
                    <th>Enddatum</th>
                    <th>Raum</th>
                    <th>Preis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) { ?>
                    <tr>
                        <td><?php echo neat($booking->getId()); ?></td>
                        <td><?php echo neat($booking->getEvent()->getCourse()->getCategory()); ?></td>
                        <td><?php echo neat($booking->getEvent()->getCourse()->getTitle()); ?></td>
                        <td><?php echo neat($booking->getEvent()->getStartdate()->format('d.m.Y')); ?></td>
                        <td><?php echo neat($booking->getEvent()->getEnddate()->format('d.m.Y')); ?></td>
                        <td><?php echo neat($booking->getEvent()->getRoom()->getTitle()); ?></td>
                        <td align="right"><?php echo neat($booking->getEvent()->getCourse()->getPrice()); ?> EUR</td>
                    </tr>
                <?php } ?>  
            </tbody>
        </table>
    </div>
<?php } ?>