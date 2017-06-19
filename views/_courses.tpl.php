<h3>Kurse</h3>
<p>Informieren Sie Sich über unser Kursangebot in folgenden Kategorien oder Suchen Sie einfach nach einem Thema.</p>
<form action="index.php" method="GET">
    <div class="input-group">
        <input type="hidden" name="action" value="courses">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        <input type="text" name="search" class="form-control" value = "<?php echo neat($search); ?>" placeholder="Suchen Sie hier nach dem Thema..." aria-describedby="basic-addon1"  autocomplete="off">
    </div>
</form>

<?php if (!is_null($search) && count($viewArray) > 0) { ?>
    <p><br>Folgende Seminare wurden zu Ihren Suchkritierien gefunden:</p>
<?php } elseif (!is_null($search)) { ?>
    <p><br>Leider wurden zu Ihren Suchkritierien keine Seminare gefunden:</p>
<?php } ?>

<?php foreach ($viewArray as $category) { ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Kategorie: <strong><?php echo $category['category']; ?></strong></h3>
        </div>
        <div class="panel-body">
            <?php foreach ($category['course'] as $course) { ?>
                <h3>Seminar &ldquo;<?php echo neat($course['title']); ?>&rdquo;</h3>
                <p><?php echo neat($course['description']); ?></p>
                <p>Preis inkl. MwSt.: <?php echo neat($course['price']); ?> EUR</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kursbegin</th>
                                <th>Kursende</th>
                                <th>Anzahl Plätze</th>
                                <th>Raum</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($course['event'] as $event) { ?>
                                <tr>
                                    <td><?php echo neat($event['eventStart']); ?></td>
                                    <td><?php echo neat($event['eventEnd']); ?></td>
                                    <td><?php echo neat($event['eventSeats'] - $event['eventBookings']); ?> von <?php echo neat($event['eventSeats']); ?></td>
                                    <td><?php echo neat($event['eventRoom']); ?></td>
                                    <td>
                                        <?php if (isVerifiedUser() && !isVerifiedAdmin()) { ?>
                                            <?php if ($event['eventBooked']) {
                                                ?> <span class="label label-info">Sie haben dieses Seminar bereits gebucht</span> <?php } else { ?>

                                                <a class="btn btn-default" href="index.php?action=bookCourse&id=<?php echo $event['eventId']; ?>">Dieses Seminar buchen</a>
                                            <?php }
                                        } else {
                                            ?>
                                            <span class="label label-default">Zum Buchen eines Seminares müssen Sie angemeldet sein.</span>
            <?php } ?>
                                    </td>
                                </tr>
        <?php } ?>
                        </tbody>
                    </table>
                </div>
    <?php } ?>
        </div>
    </div>
<?php } ?>