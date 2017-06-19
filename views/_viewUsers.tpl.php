<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Benutzer</th>
                <th>E-Mail Adresse</th>
                <th>Gruppe</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo neat($user->getId()); ?></td>  
                    <td><?php echo neat($user); ?></td>
                    <td><?php echo neat($user->getEmail()); ?></td>
                    <td><?php echo neat($user->getUsergroup()); ?></td>
                    <td><a class="btn btn-success btn-xs" href="index.php?action=editUser&id=<?php echo $user->getId(); ?>">Bearbeiten</a></td>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
</div>
<a class="btn btn-default" href="index.php?action=newUser">Neuen Benutzer anlegen</a>