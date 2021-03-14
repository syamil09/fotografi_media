<?php 
    $rows = $db->fetch("user");
    $no = 1;
?>
<div class="row">
    <div class="col-md-10 offset-1">
        <table class="table table-hover bg-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row ) :  ?>
                <tr>
                    <th><?= $no;?></th>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('');">Delete</a>
                    </td>
                </tr>
                <?php $no++;endforeach; ?>
            </tbody>
        </table>
    </div>
</div>