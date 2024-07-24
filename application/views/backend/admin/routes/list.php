<?php
    
    $check_data = $this->db->get('routes')->result_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Route Title'); ?></th>
        <th><?php echo get_phrase('Route Fare'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
        
        ?>
        <tr>
          <td><?php echo $data['route_title']; ?></td>
          <td><?php echo $data['route_fare']; ?></td>
       
          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <!--<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/complaintsactions/edit/'.$data['id'])?>', '<?php echo get_phrase('update_Complaint'); ?>');"><?php echo get_phrase('edit'); ?></a>-->
                <!-- item-->
               <!-- <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('complaintsactions/delete/'.$data['id']); ?>', showAllComplaint)"><?php echo get_phrase('delete'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item" onclick="previewModal('<?php echo site_url('modal/popup/complaintsactions/view/'.$data['id'])?>', '<?php echo get_phrase('Complaint'); ?>');"><?php echo get_phrase('view'); ?></a>-->
                                              
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
