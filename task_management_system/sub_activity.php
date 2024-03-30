<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db_connect.php';

?>
<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <?php if (isset($_SESSION['login_type']) && $_SESSION['login_type'] != 3): ?>
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=add_subactivity"><i class="fa fa-plus"></i>Add SubActivity</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table class="table table-hover table-condensed" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="35%">
                    <col width="15%">
                    <col width="15%">
                    <col width="23%">
                    <col width="10%">
                </colgroup>
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Sub Activity</th>
                    <th>Date Started</th>
                    <th>Due Date</th>
                    <th>Responsibility</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $qry = $conn->query("SELECT * FROM sub_activity");
                while ($row = $qry->fetch_assoc()) :
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><?php echo $row['S_Activity_Name'] ?></td>
                        <td><?php echo date("M d, Y", strtotime($row['S_Start_Date'])) ?></td>
                        <td><?php echo date("M d, Y", strtotime($row['S_End_Date'])) ?></td>
                        <td><?php echo $row['S_Responsibility'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                Action
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="./index.php?page=view_subactivity&id=<?php echo $row['id'] ?>">View</a>
                                <div class="dropdown-divider"></div>
                                <?php if (isset($_SESSION['login_type']) && $_SESSION['login_type'] != 3) : ?>

                                    <a class="dropdown-item" href="./index.php?page=edit_subactivity&id=<?php echo $row['id'] ?>">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_subactivity" href="javascript:void(0)" onclick="delete_subactivity(<?php echo $row['id']; ?>)">Delete</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    table p {
        margin: unset !important;
    }

    table td {
        vertical-align: middle !important
    }
</style>
<script>
    $(document).ready(function() {
        $('#list').dataTable()


        $('.delete_subactivity').click(function() {
            _conf("Are you sure to delete this subactivity?", "delete_subactivity", [$(this).attr('data-id')]);
        });

        $('.edit_subactivity').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Get the subactivity ID from the data-id attribute
            var id = $(this).data('id');

            // Redirect to the edit_subactivity.php page with the subactivity ID in the URL
            window.location.href = 'edit_subactivity.php?id=' + id;
        });

    });


    function delete_subactivity(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_subactivity',
            method: 'POST',
            data: {
                id: id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
</script>




