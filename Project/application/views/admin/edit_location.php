<div class="content-wrapper">
    <div class="card mt-4">
        <div class="card-header">
         <h2>Edit Location</h2>
        </div>
        <div class="card-body">
            <form class="database_operation_from" data-url="<?php echo base_url('admin/update_location/'.$location['id']); ?>">
                <div class="form-group">
                    <label>Name</label>

                    <input type="text" name="name" value="<?php echo $location['name'] ?>" required class="form-control" placeholder="Enter Name" />
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Update Location</button>
                </div>
            </form>
        </div>
    </div>
</div>