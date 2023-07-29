<div class="content-wrapper">
    <div class="card mt-4">
        <h2>Manage Bus Schedule <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm float-right">Add New</a></h2>
    </div>
    <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Bus Number</th>
                <th>Start</th>
                <th>End</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($schedules as $key => $obj) {
            ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $obj['bus_number'] ?></td>
                <td><?php echo $obj['start_location'] ?></td>
                <td><?php 
                $objNew = $this->CM->select_data("bms_location","name",array("id"=>$obj['end']));
                echo $objNew[0]['name'];
                ?></td>
                <td><?php echo date("h:i",strtotime($obj['time'])) ?></td>
                <td><?php echo $obj['amount'] ?></td>
                <td>
                    <a href="<?php echo base_url("admin/bus_schedule_edit/".$obj['id']) ?>" class="btn btn-info btn-sm">Edit</a>
                    <a href="<?php echo base_url("admin/bus_schedule_delete/".$obj['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php
        }
          
            ?> 

             
          </tbody>
    </table>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Add New Schedule</h4>
      <button class="close" type="button" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form class="database_operation_from" data-url="<?php echo base_url('admin/bus_schedule'); ?>" >
      <div class="form-group">
            <label>Bus Number</label>
            <input type="text" name="bus_number" required class="form-control" placeholder="Enter Bus Number" />
        </div>
        <div class="form-group">
            <label>Start</label>
            <select name="start" required class="form-control">
                <option value="">Select Start</option>
                <?php
                foreach($locations as $loc){
                ?>
                <option value="<?php echo $loc['id']  ?>"><?php echo $loc['name'] ?></option>
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
                foreach($locations as $loc){
                ?>
                <option value="<?php echo $loc['id']  ?>"><?php echo $loc['name'] ?></option>
                <?php

                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="time" name="time" min="06:00" max="22:00" required class="form-control"  />
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="text" name="amount" required class="form-control" placeholder="Enter Amount" />
        </div>
        <div class="form-group">
            <button class="btn btn-info">Add</button>
        </div>
        
      </form>
    </div>
    
  </div>
  
</div>
</div>	