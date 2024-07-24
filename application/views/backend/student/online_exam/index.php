<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block"> <i class="mdi mdi-grease-pencil title_icon"></i> <?php echo get_phrase('online_exam_details'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body grade_content">
               <?php $online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->get()->result_array();  
                if (count($online_exams) > 0):?>
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                    <thead>
                        <tr style="background-color: #313a46; color: #ababab;">
                            <th><?php echo get_phrase('exam_name'); ?></th>
                            <th><?php echo get_phrase('starting_date'); ?></th>
                            <th><?php echo get_phrase('exam_time'); ?></th>
                            <th><?php echo get_phrase('exam_duration'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                            <th><?php echo get_phrase('option'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($online_exams as $exam):
                        $examId = $exam['id'];
                        $currentDatetime = new DateTime();
                        $get_exam_status = $this->db->get_where('online_exam_details', array('status' => '1','id' => $examId))->row_array();

                        $get_exam_start_dt = $get_exam_status['exam_start_date'];
                        $get_exam_end_time = $get_exam_status['exam_end_time'];
                        $get_exam_end_am_pm = $get_exam_status['exam_end_am_pm'];

                        $examEndDateTimeString = $get_exam_start_dt . ' ' . $get_exam_end_time . ' ' . $get_exam_end_am_pm;

                        // Convert the datetime string to a DateTime object
                        $examEndDateTime = DateTime::createFromFormat('Y-m-d h:i A', $examEndDateTimeString);

                        $exam_status = ($examEndDateTime < $currentDatetime) ? 'Closed' : 'Open';
                    ?>
                    <tr>
                        <td><?php echo $exam['online_exam_name']; ?></td>
                        <td><?php echo $exam['exam_start_date']; ?></td>
                        <td>Time: <?php echo $exam['exam_start_time'].$exam['exam_start_am_pm']."-".$exam['exam_end_time'].$exam['exam_end_am_pm']; ?></td>
                        <td><?php echo $exam['exam_duration']; ?> Min</td>
                        <td><?php echo $exam_status; ?></td>
                        <td>
                        <?php if ($examEndDateTime > $currentDatetime) {?> 
                        <div class="dropdown text-center">
                            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/online_exam/exam-page/'.$exam['id'])?>', '<?php echo get_phrase('exam_page'); ?>');"><?php echo get_phrase('start_exam'); ?></a>
                               
                            </div>
                        </div>
                        <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?php else: ?>
                    <?php include APPPATH.'views/backend/empty.php'; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script>
    var showAllGrades = function () {
        var url = '<?php echo route('grade/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.grade_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
