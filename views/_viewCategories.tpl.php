<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategorie</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?php echo neat($category->getId()); ?></td>  
                    <td><?php echo neat($category->getTitle()); ?></td>
                    <td><a class="btn btn-success btn-xs" href="index.php?action=editCategory&id=<?php echo $category->getId(); ?>">Bearbeiten</a></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>
<a class="btn btn-default" href="index.php?action=newCategory">Neue Kategorie anlegen</a>