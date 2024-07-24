<?php

$online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->get()->result_array();   

// $online_exams = $this->db->get_where('online_exam_details', array('status' => '1'))->result_array();
?>

<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2 parent_content">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-grease-pencil title_icon"></i> Online Exam Details </h4>
		  
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('http://localhost/eduquest-latest/modal/popup/online_exam/create', 'Create exam')"> <i class="mdi mdi-plus"></i> Add exam details</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<?php if (count($online_exams) > 0): ?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('exam_name'); ?></th>
             <th><?php echo get_phrase('quarter_name'); ?></th>
            <th><?php echo get_phrase('starting_date'); ?></th>
            <th><?php echo get_phrase('exam_time'); ?></th>
            <th><?php echo get_phrase('exam_duration'); ?></th>
            <th><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
	<?php foreach($online_exams as $exam):?>
	<tr>
	    <td><?php echo $exam['online_exam_name']; ?></td>
        <td><?php echo $exam['name']; ?></td>
	    <td><?php echo $exam['exam_start_date']; ?></td>
      <td>Time: <?php echo $exam['exam_start_time'].$exam['exam_start_am_pm']."-".$exam['exam_end_time'].$exam['exam_end_am_pm']; ?></td>
	    <td><?php echo $exam['exam_duration']; ?> Min</td>
	    <td>
        <div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item"><?php echo get_phrase('edit'); ?></a>
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('online_exam_create/delete/'.$exam['id']); ?>', showAllExams)"><?php echo get_phrase('delete'); ?></a>
					</div>
				</div>
	    </td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
