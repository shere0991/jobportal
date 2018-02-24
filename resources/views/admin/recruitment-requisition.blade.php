@extends('admin.layouts.app')
@section('navbar')
@if(Auth::guest('admin'))
@include('admin.layouts.partial.top-navbar')
@else
@include('admin.layouts.partial.main-header') 
@endif
@endsection
@section('main-sidebar')
@if(Auth::user()->role())
@include('admin.layouts.partial.main-sidebar')
@endif
@endsection
@section('main-content')
<div id="message" class="navbar-fixed-top"></div>
@if (session('message'))
@push('js')
<script type="text/javascript">
  $('#message').html('<div class="callout callout-success text-center"><h2>Congratulation!!</h2><h3>Form Submitted Successfully!</h3></div>');
$("#message").show().fadeOut(3000).queue(function(n) {
  $(this).hide(); n();
}); 
</script>
@endpush
@endif
<div class="container">
  <h2>Recruitment Requisition Form</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Form 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Form 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Form 3</a></li>
  </ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Recruitment Requisition Form</h3>
      </div>
  <!-- /.box-header -->
  <!-- form start -->
      <form class="form-horizontal" action="{{ url('admin/submit_requisition_form_1') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="form_one" value="Form One">
        <div class="col-md-6 col-lg-6">
          <div class="box-body">
          <div class="form-group">
            <label for="unit_name" class="col-sm-4 control-label">Unit's Name</label>
            <div class="col-sm-8">
              <input type="text" name="unit_name" class="form-control" id="unit_name" placeholder="Unit's Name">
            </div>
          </div>
          <div class="form-group">
            <label for="position" class="col-sm-4 control-label">Position</label>

            <div class="col-sm-8">
              <input type="text" name="position" class="form-control" id="position" placeholder="Position">
            </div>
          </div>
          <div class="form-group">
            <label for="no_of_employees_required" class="col-sm-4 control-label">No of Employees Required:</label>

            <div class="col-sm-8">
              <input type="number" name="no_of_employees_required" class="form-control" id="no_of_employees_required" placeholder="No of Employees Required:">
            </div>
          </div>
          <div class="form-group">
            <label for="no_of_existing_positions" class="col-sm-4 control-label">No of existing positions:</label>

            <div class="col-sm-8">
              <input type="number" name="no_of_existing_positions" class="form-control" id="no_of_existing_positions" placeholder="No of existing positions:">
            </div>
          </div>

        </div>

        </div>
        <div class="col-md-6 col-lg-6">
          <div class="box-body">
          <div class="form-group">
            <label for="department" class="col-sm-4 control-label">Department</label>

            <div class="col-sm-8">
              <input type="text" name="department" class="form-control" id="department" placeholder="Department">
            </div>
          </div>
          <div class="form-group">
            <label for="vacancy_created_on" class="col-sm-4 control-label">Vacancy Created on: </label>

            <div class="col-sm-8">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="vacancy_created_on" class="form-control pull-right" id="datepicker1" placeholder="Vacancy Created on">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="anticipated_start_date" class="col-sm-4 control-label">Anticipated Start Date:</label>

            <div class="col-sm-8">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="anticipated_start_date" class="form-control pull-right" id="datepicker2" placeholder="Anticipated Start Date">
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="last_hiring_for_same" class="col-sm-4 control-label">Last hiring for same position:</label>

            <div class="col-sm-8">
             <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="last_hiring_for_same" class="form-control pull-right" id="datepicker3" placeholder="Last hiring for same position">
                </div>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12"><h2 class="text-center">(In case of replacement)</h2><hr></div>
        </div>
          <div class="col-md-6 col-lg-6">
            <div class="form-group">
            <label for="replaced_employee_name" class="col-sm-4 control-label">Replaced Employee Name:</label>

            <div class="col-sm-8">
              <input type="text" name="replaced_employee_name" class="form-control" id="replaced_employee_name" placeholder="Replaced Employee Name">
            </div>
          </div>
          <div class="form-group">
            <label for="requested_by" class="col-sm-4 control-label">Requested by: </label>

            <div class="col-sm-8">
              <input type="text" name="requested_by" class="form-control" id="requested_by" placeholder="Requested by">
            </div>
          </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="form-group">
            <label for="replaced_employee_designation" class="col-sm-4 control-label">Designation</label>

            <div class="col-sm-8">
              <input type="text" name="replaced_employee_designation" class="form-control" id="replaced_employee_designation" placeholder="Designation">
            </div>
          </div>
          <div class="form-group">
            <label for="requester_designation"  class="col-sm-4 control-label">Designation</label>

            <div class="col-sm-8">
              <input type="text" name="requester_designation" class="form-control" id="requester_designation" placeholder="Designation">
            </div>
          </div>
          </div>
          <div class="box-body">
            <div class="row">
            <div class="col-md-12">
            <h2 class="text-center"> Requirements</h2>
            <hr>
            </div>
            <div class="col-md-12 col-lg-12">
            <div class="form-group">
              <label for="education" class="col-sm-2 control-label">Education </label>

              <div class="col-sm-10">
                <input type="text" name="education" class="form-control" id="education" placeholder="Education">
              </div>
            </div>
            <div class="form-group">
              <label for="work_experience" class="col-sm-2 control-label">Work Experience </label>

              <div class="col-sm-10">
                <input type="text" name="work_experience" class="form-control" id="work_experience" placeholder="Work Experience">
              </div>
            </div>
            <div class="form-group">
              <label for="training" class="col-sm-2 control-label">Training </label>

              <div class="col-sm-10">
                <input type="text" name="training" class="form-control" id="training" placeholder="Training">
              </div>
            </div>
            <div class="form-group">
              <label for="skills" class="col-sm-2 control-label">Skills </label>

              <div class="col-sm-10">
                <input type="text" name="skills" class="form-control" id="skills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group">
              <label for="additional_requirements" class="col-sm-2 control-label">Additional Requirements </label>

              <div class="col-sm-10">
                <input type="text" name="additional_requirements" class="form-control" id="additional_requirements" placeholder="Additional Requirements">
              </div>
            </div>
          </div>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-12 col-lg-12">
              <h2 class="text-center">Justification for Employment (by Department Head)</h2><hr>
            <div class="form-group">
              <label for="remarks" class="col-sm-2 control-label">Remarks</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks"></textarea>
              </div>
            </div>

            </div>
            <div class="col-md-12 col-lg-12">
              
              
              <div class="form-group">
              <label for="internal_or_transfer" class="col-sm-2 col-md-2 col-lg-2 text-right"  control-label">Source</label>
              <div class="col-md-10">

              <label>
                      <input type="checkbox" value="S1" name="internal_or_transfer" class="flat-red" > Internal / Transfer
                    </label>
              <label for="newspaper"  control-label">&nbsp;&nbsp;| External:&nbsp;&nbsp;</label>
                    <label>
                      <input type="checkbox" value="S2" name="newspaper" class="flat-red"> Newspaper     
                    </label>
                    <label>
                      <input type="checkbox" value="S3" name="online" class="flat-red" > Online 
                    </label>
                    <label>
                      <input type="checkbox" value="S4" name="cv_bank" class="flat-red" > CV Bank 
                    </label> 
                    <label>
                      <input type="checkbox" value="S5" name="referral" class="flat-red" > Referral 
                    </label>
              </div>
              </div>
            </div>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
          <label for="" class="col-md-2 col-lg-2"></label>
          <div class="col-md-10 col-lg-10">
            <button type="submit" class="btn btn-info pull-right">Submit Requisition</button>
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
</div>


<!-- DataTable -->
      <!-- Small boxes (Stat box) -->
      <div class="box" id="load_table">
          <div class="box-header with-border">
          <h3 class="box-title">Published Job</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead id="load_head">
                <tr>
                  <th>Unit's Name</th>
                  <th>Department</th>
                  <th>Position</th>
                  <th>Vacancy Created on:</th>
                  <th>No of Employees Required:</th>
                  <th>Anticipated Start Date:</th>
                  <th>No of existing positions:</th>
                  <th>Last hiring for same position:</th>
                  <th>Replaced Employee Name:</th>
                  <th>Designation</th>
                  <th>Requested by:</th>
                  <th>Designation</th>
                  <!-- <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th> -->
                </tr>
                </thead>
                <tbody>
                  @foreach($formOne as $fOne)
                  <tr>
                    <td>{{ $fOne->unit_name }}</td>
                    <td>{{ $fOne->position }}</td>
                    <td>{{ $fOne->no_of_employees_required }}</td>
                    <td>{{ $fOne->no_of_existing_positions }}</td>
                    <td>{{ $fOne->department }}</td>
                    <td>{{ $fOne->vacancy_created_on }}</td>
                    <td>{{ $fOne->anticipated_start_date }}</td>
                    <td>{{ $fOne->last_hiring_for_same }}</td>
                    <td>{{ $fOne->replaced_employee_name }}</td>
                    <td>{{ $fOne->requested_by }}</td>
                    <td>{{ $fOne->replaced_employee_designation }}</td>
                    {{-- <td>{{ $fOne->requester_designation }}</td>
                    <td>{{ $fOne->education }}</td>
                    <td>{{ $fOne->work_experience }}</td>
                    <td>{{ $fOne->training }}</td>
                    <td>{{ $fOne->skills }}</td>
                    <td>{{ $fOne->additional_requirements }}</td>
                    <td>{{ $fOne->remarks }}</td>
                    <td>{{ $fOne->internal_or_transfer }}</td>
                    <td>{{ $fOne->newspaper }}</td>
                    <td>{{ $fOne->online }}</td>
                    <td>{{ $fOne->cv_bank }}</td>
                    <td>{{ $fOne->referral }}</td> --}}
                    <td></button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info{{ $fOne->id }}">
                      View File
                    </button>
                  </td>
                  </tr>

                   <di v class="modal modal-info fade" id="modal-info{{ $fOne->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Info Modal</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-outline">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Requisition Form 2</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('admin/submit_requisition_form_2') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="form_two" value="Form Two">
              <div class="box-body">
                <div class="form-group">
                  <label for="loaction" class="col-sm-2 control-label">LOCATION :</label>

                  <div class="col-sm-10">
                    <label>
                      <input type="checkbox" value="L1" name="head_office" class="flat-red"> Head Office     
                    </label>
                    <label>
                      <input type="checkbox" value="L2" name="factory" class="flat-red"> Factory      
                    </label>
                    <label>
                      <input type="checkbox" value="L3" name="field" class="flat-red"> Field (Region)     
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputtext3" class="col-sm-2 control-label">EMPLOYEE TYPE :</label>

                  <div class="col-sm-10">
                    <label>
                      <input type="checkbox" value="ET1" name="permanent" class="flat-red"> Permanent     
                    </label>
                    <label>
                      <input type="checkbox" value="ET2" name="contract" class="flat-red"> Contract      
                    </label>
                    <label>
                      <input type="checkbox" value="ET3" name="temporary" class="flat-red"> Temporary     
                    </label>
                    <label>
                      <input type="checkbox" value="ET4" name="casual" class="flat-red"> Casual     
                    </label>
                  </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="inputtext3" class="col-sm-4 control-label">SALARY GRADE :</label>

                  <div class="col-sm-8">
                    <input type="text" name="slary_grade" class="form-control" id="inputtext3" placeholder="Type Salary Grade">
                  </div>
                </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="inputtext3" class="col-sm-4 control-label">JOB CLASS :</label>

                  <div class="col-sm-8">
                    <input type="text" name="job_class" class="form-control" id="inputtext3" placeholder="Type Job Class">
                  </div>
                </div> 
                </div> 
                <div class="form-group">
                  <label for="inputtext3" class="col-sm-2 control-label">Comments:</label>

                  <div class="col-sm-10">
                    <textarea  class="form-control" name="comments" id="inputtext3" placeholder="Write your comments"></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit Form 2</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- DataTable -->
      <!-- Small boxes (Stat box) -->
      <div class="box" id="load_table">
          <div class="box-header with-border">
          <h3 class="box-title">Published Job</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="form2" class="table table-bordered table-striped">
                <thead id="load_head">
                <tr>
                  <th>S.No.</th>
                  <th>Company Name</th>
                  <th>Company Logo</th>
                  <th>Created at</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">(Complete this page ONLY if requesting creation of new position)</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('admin/submit_requisition_form_3') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="form_three" value="Form Three">
              <div class="box-body">
                <div class="col-md-6 col-lg-12">
                  <div class="form-group">
                  <label for="modification" class="col-sm-6 control-label">Responsibilities / Tasks / Duties / Functions(Amend Existing JDF Records for Modifications)</label>
                  <div class="col-sm-6">
                    <textarea name="modification" class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"> Submit Form</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
  </div>
</div>


@endsection
@push('js')
<script type="text/javascript">
   $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
   
   $(function () {
    $('#form2').DataTable()
    // $('#form2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
  });

    //Date picker
     $('#datepicker1').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
     $('#datepicker2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
     $('#datepicker3').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('#datepicker').datepicker({
      autoclose: true
    });
    $('#datepicker1').datepicker({
      autoclose: true
    });
    $('#datepicker2').datepicker({
      autoclose: true
    });
    $('#datepicker3').datepicker({
      autoclose: true
    });


  // $('#save-company').on('click',function(){
  //   var company_name=$('#company_name').val();
  //   $('#save-company').html("");
  //   $('#save-company').html('<i class="fa fa-circle-o-notch fa-spin"></i> Saving..');
  //   $.ajax({
  //       url:'addCompany',
  //         data:new FormData($("#add_company_data")[0]),
  //         dataType:'json',
  //         type:'post',
  //         processData: false,
  //         contentType: false,
  //         success:function(response){
  //           console.log(response);
  //     if (response.data=='success') {
  //       $('#save-company').html("");
  //       $('#save-company').html('Save Company');
  //       $('#company_name').val("");
  //       $('#company_logo').val("");
  //     $('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Record add successfully!</div>');
  //         $("#message").show().fadeOut(3000).queue(function(n) {   
  //         $(this).hide(); n();
  //         });
  //         // $('#load_table').load(location.href+' #load_table');
  //         location.href="{{ url('admin/add-company') }}";
  //           } 
  //     },
  //   });

    // $.post('addCompany',{'company_name':company_name,'_token':$('input[name=_token]').val()},function(response){
    //   console.log(response);
    // })
  //);

// function editCompany(i){
//   $('#save-company').hide();
//   $('#update-company').show();
//   $.post('editCompany',{'id':i,'_token':$('input[name=_token]').val()},
//     function(response){
//       console.log(response.data[0].company_logo);
//       $('#company_name').val(response.data[0].company_name);
//       $('#updateId').val(response.data[0].id);
//       // $('#company_logo').val(response.data[0].company_logo);

//       $('#editImage').attr("src","{{ asset('storage/admin/images') }}/"+response.data[0].company_logo);
//     });
// }

// $('#update-company').on('click',function(){
//     $(this).html("");
//     $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating..');
//     $('#editImage').hide();
//    $.ajax({
//         url:'updateCompany',
//           data:new FormData($("#add_company_data")[0]),
//           dataType:'json',
//           type:'post',
//           processData: false,
//           contentType: false,
//           success:function(response){
//       if (response.data=='success') {
//         $('#update-company').html("");
//         $('#update-company').html('Update Company');
//         $('#company_name').val("");
//         $('#company_logo').val("");
//       $('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Record add successfully!</div>');
//           $("#message").show().fadeOut(3000).queue(function(n) {   
//           $(this).hide(); n();
//           });
//           location.href="{{ url('admin/add-company') }}";
//           // $('#load_table').load(location.href+' #load_table');
//           // $('#editImage').load(location.href+' #editImage');
//             } 
//       },
//     }) 
// });

// function deleteCompany(i){
//   $('#deleted'+i).html("");
//     $('#deleted'+i).html('<i class="fa fa-circle-o-notch fa-spin"></i> Deleting..');
//   $.post('deleteCompany',{'id':i,'_token':$('input[name=_token]').val()},function(response){
//     if (response.data=='success') {
//       $('#deleted'+i).html("");
//       $('#deleted'+i).html('<i class="fa fa-trash"></i>');
//       $('#message').html('<div class="callout callout-danger text-center"><h4>Reminder!</h4>Record deleted successfully!</div>');
//           $("#message").show().fadeOut(3000).queue(function(n) {   
//           $(this).hide(); n();
//           });
//     } 
//           // $('#load_table').load(location.href+' #load_table');
//           location.href="{{ url('admin/add-company') }}";
//   })
// }


// $('#message').html('<div class="callout callout-danger text-center"><h2>Reminder!</h2><h3>This Applicants is deleted!</h3></div>');
// $("#message").show().fadeOut(3000).queue(function(n) {
//   $(this).hide(); n();
// }); 

 
</script>
@endpush