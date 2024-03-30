<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="" id="manage-subactivity">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="S_Activity_Name" class="control-label">Subactivity Name</label>
                            <input type="text" class="form-control form-control-sm" id="S_Activity_Name" name="S_Activity_Name" value="<?php echo isset($S_Activity_Name) ? $S_Activity_Name : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="S_Start_Date" class="control-label">Start Date</label>
                            <input type="date" class="form-control form-control-sm" id="S_Start_Date" name="S_Start_Date" autocomplete="off" value="<?php echo isset($S_Start_Date) ? date("Y-m-d", strtotime($S_Start_Date)) : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="S_End_Date" class="control-label">End Date</label>
                            <input type="date" class="form-control form-control-sm" id="S_End_Date" name="S_End_Date" autocomplete="off" value="<?php echo isset($S_End_Date) ? date("Y-m-d", strtotime($S_End_Date)) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="S_Responsibility" class="control-label">Responsibility</label>
                            <input type="text" class="form-control form-control-sm" id="S_Responsibility" name="S_Responsibility" value="<?php echo isset($S_Responsibility) ? $S_Responsibility : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="S_Notes" class="control-label">Notes</label>
                            <textarea name="S_Notes" id="S_Notes" cols="30" rows="3" class="form-control"><?php echo isset($S_Notes) ? $S_Notes : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- You can add more fields for subactivity details here -->
                <div class="card-footer border-top border-info">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button class="btn btn-flat bg-gradient-primary mx-2" type="submit">Save</button>
                        <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=sub_activity'">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#manage-subactivity').submit(function(e) {
        e.preventDefault();
        start_load();
        $.ajax({
            url: 'ajax.php?action=save_subactivity',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast('Data successfully saved', "success");
                    setTimeout(function() {
                        location.href = 'index.php?page=sub_activity';
                    }, 2000);
                } else {
                    alert_toast('Failed to save data. Please try again.', "error");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert_toast('Failed to save data. Please try again.', "error");
            }
        });
    });
</script>

