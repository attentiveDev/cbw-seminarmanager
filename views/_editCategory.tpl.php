<div class="row">
    <div class="col-sm-7">
        <form action="index.php?action=<?php echo $action; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $category->getId(); ?>">

            <div class="form-group">
                <label for="title">Kategorie:</label>
                <input class="form-control" type="text" name="title" value="<?php neat($category->getTitle()); ?>">
            </div>

            <?php if ($action == "editCategory") { ?>
                <div class="form-group">
                    <label for="created">Erstellt:</label>
                    <input class="form-control" type="text" value="<?php echo neat($category->getCreated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <?php if ($action == "editCategory") { ?>
                <div class="form-group">
                    <label for="updated">Geändert:</label>
                    <input class="form-control" type="text" value="<?php echo neat($category->getUpdated()->format('Y-m-d H:i')); ?>" readonly>
                </div>
            <?php } ?>

            <input class="btn btn-primary" type="submit" value="Speichern" name="submitbutton">
            <a class="btn btn-default" href="index.php?action=viewCategories">Abbrechen</a>
            <?php if ($action == "editCategory") { ?>
                <a class="btn btn-danger" href="index.php?action=deleteCategory&id=<?php echo $category->getId(); ?>">Diese Kategorie löschen</a>
            <?php } ?>

        </form>
    </div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Über Kategorien</h4>
                <p>Kategorien dienen der Gruppierung der Seminare in der Übersicht.</p>
                <p>Die Seminare sind nach Kategorie und erst dann nach Titel sortiert.</p>
            </div>
        </div>
    </div>
</div>