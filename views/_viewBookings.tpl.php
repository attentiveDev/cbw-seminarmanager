<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Seminar</th>
                <th>Startdatum</th>
                <th>Raum</th>
                <th>Teilnehmer</th>
                <th>E-Mail Adresse</th>
                <th>IP-Adresse</th>
                <th>Registriert</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking) { ?>
                <tr>
                    <td><?php echo neat($booking->getId()); ?></td>  
                    <td><?php echo neat($booking->getEvent()->getCourse()->getTitle()); ?></td>
                    <td><?php echo neat($booking->getEvent()->getStartdate()->format('d.m.Y')); ?></td>
                    <td><?php echo neat($booking->getEvent()->getRoom()->getTitle()); ?></td>
                    <td><?php echo neat($booking->getUser()); ?></td>
                    <td><?php echo neat($booking->getUser()->getEmail()); ?></td>
                    <td><?php echo neat($booking->getIpAdress()); ?></td>
                    <td><?php echo neat($booking->getCreated()->format('d.m.Y H:i')); ?></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>