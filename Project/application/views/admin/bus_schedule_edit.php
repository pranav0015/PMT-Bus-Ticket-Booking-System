<div class="content-wrapper">
    <div class="card mt-4">
        <div class="card-header">
         <h2>Edit Bus Schedule</h2>
        </div>
        <div class="card-body">
            <form class="database_operation_from" data-url="<?php echo base_url('/admin/bus_schedule_edit/'.$schedule['id']); ?>">
                <div class="form-group">
                    <label>Bus Number</label>
                    <input type="text" value="<?php echo $schedule['bus_number'] ?>" name="bus_number" required class="form-control" placeholder="Enter Bus Number" />
                </div>
                <div class="form-group">
                    <label>Start</label>
                    <select name="start" required class="form-control">
                        <option value="">Select Start</option>
                        <?php 
                        foreach($locations as $loc) {
                        ?>
                        <option <?php if($schedule['start']==$loc['id']) { echo "selected"; } ?> value="<?php echo $loc['id'] ?>"><?php echo $loc['name'] ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>End</label>
                    <select name="end" required class="form-control">
                        <option value="">Select End</option>
                        <?php 
                        foreach($locations as $loc) {
                        ?>
                        <option <?php if($schedule['end']==$loc['id']) { echo "selected"; } ?> value="<?php echo $loc['id'] ?>"><?php echo $loc['name'] ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="date" name="date" value="<?php echo $schedule['time'] ?>" required class="form-control"  />
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" value="<?php echo $schedule['amount'] ?>" required class="form-control" placeholder="Enter Amount" />
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
