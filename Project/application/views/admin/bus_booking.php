<div class="content-wrapper">
    <div class="card mt-4">
        <div class="card-header">
         <h2>Manage Booking <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm float-right">Add New</a></h2>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Amount</th>
                        <th>Bus</th>
                        <th>Number Of Member</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($booking as $key => $book) {
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $book['name']; ?></td>
                        <td><?php echo $book['mobile']; ?></td>
                        <td><?php foreach($locations as $loc) {
                            if($loc['id'] == $book['start']) {
                                echo $loc['name'];
                            }
                        }  ?></td>
                        <td><?php foreach($locations as $loc) {
                            if($loc['id'] == $book['end']) {
                                echo $loc['name'];
                            }
                        }  ?></td>
                        <td><?php echo $book['amount']; ?></td>
                        <td><?php echo $book['bus_number']; ?></td>
                        <td><?php echo $book['numberofmember']; ?></td>
                        <td>
                            <?php 
                            if($book['status']==0) {
                                echo "Pending";
                            } else if($book['status']==1) {
                                echo "Completed";
                            }
                             ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url("admin/edit_booking/".$book['id']) ?>" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add New Booking</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form class="database_operation_from" data-url="<?php echo base_url('admin/bus_booking'); ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required class="form-control" placeholder="Enter Name" />
        </div>
        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile" required class="form-control" placeholder="Enter Mobile Number" />
        </div>
        <div class="form-group">
            <label>Number Of Member</label>
            <input type="text" name="numberofmember" required class="form-control" placeholder="Enter Number of member" />
        </div>
        <div class="form-group">
            <label>Bus</label>
            <select class="form-control" name="bus" required>
                <option value="">Select Bus</option>
                <?php 
                foreach($schedules as $schedule) {
                ?>
                <option value="<?php echo $schedule['id'] ?>"><?php echo $schedule['bus_number'] ?></option>
                <?php 
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-info">Add Booking</button>
        </div>
      </form>
    </div>
  </div>
  
</div>
</div>