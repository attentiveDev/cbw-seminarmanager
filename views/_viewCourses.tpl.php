<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Seminar</th>
                <th>Kategorie</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($courses as $course) { ?>
                <tr>
                    <td><?php echo neat($course->getId()); ?></td>  
                    <td><?php echo neat($course->getTitle()); ?></td>
                    <td><?php echo neat($course->getCategory()); ?></td>
                    <td><a class="btn btn-success btn-xs" href="index.php?action=editCourse&id=<?php echo $course->getId(); ?>">Bearbeiten</a></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>
<a class="btn btn-default" href="index.php?action=newCourse">Neues Seminar anlegen</a>