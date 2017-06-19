<div class="row">
    <div class="col-sm-7">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $course->getId(); ?>">

            <div class="form-group">
                <label for="title">Titel:</label>
                <input class="form-control" type="text" name="title" value="<?php neat($course->getTitle()); ?>">
            </div>

            <div class="form-group">
                <label for="category">Kategorie:</label>
                <select class="form-control" name="category">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category->getId(); ?>" <?php
                        if ($action == "editCourse" && $category->getTitle() == $course->getCategory()->getTitle()) {
                            echo "selected";
                        }
                        ?>><?php echo $category->getTitle(); ?></option>
                            <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Beschreibung:</label>
                <input class="form-control" type="text" name="description" value="<?php neat($course->getDescription()); ?>">
            </div>

            <div class="form-group">
                <label for="price">Preis EUR:</label>
                <input class="form-control" type="text" name="price" value="<?php neat($course->getPrice()); ?>">
            </div>

            <?php if ($action == "editCourse") { ?>
                <div class="form-group">
                    <label for="created">Erstellt:</label>
                    <input class="form-control" type="text" value="<?php echo neat($course->getCreated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <?php if ($action == "editCourse") { ?>
                <div class="form-group">
                    <label for="updated">Geändert:</label>
                    <input class="form-control" type="text" value="<?php echo neat($course->getUpdated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <input class="btn btn-primary" type="submit" value="Speichern" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=viewCourses">Zurück</a>
            <?php if ($action == "editCourse") { ?>
                <a class="btn btn-danger"href="index.php?action=deleteCourse&id=<?php echo $course->getId(); ?>">Dieses Seminar löschen</a>
            <?php } ?>
        </form>
    </div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Über Seminare</h4>
                <p>Hier befinden sich die eigentlichen Seminare der Lösung. Die Termine werden seperat gepflegt.</p>
                <p>Die Seminare sind nach Kategorie und erst dann nach Titel sortiert.</p>
            </div>
        </div>
    </div>
</div>