<?php include("../Filter/AuthFilter.php");?>
<?php include("includes/content_head.php");?>


<style>
    .bootstrap-tagsinput .tag {
        margin-right: 3px;
        color: white;
    }

    .bootstrap-tagsinput {
        line-height: 27px;
    }

    .label-info {
        background-color: #007bff;
    }

    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }
    .fivepxspacer {
        margin: 0px 5px 0px;
    }

    .onepxspacer {
        margin: 0px 3px 0px;
    }
</style>

<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Projects </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Projects</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button type="button" data-toggle="modal" data-target="#memberaddmodal"
                                    class="btn btn-sm btn-block btn-outline-primary float-right">Add Project</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Client</th>
                                    <th>Description</th>
                                    <th>Team Name</th>
                                    <th>Team Lead</th>
                                    <th>Status</th>
                                    <th>Budget</th>
                                    <th>Duration</th>
                                    <th>AmountSpent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>





<div class="modal fade" id="memberaddmodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="addMemberForm" action="../Controller/ProjectController.php" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General</h3>

                                        <div class="card-tools">
                                            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button> -->
                                        </div>
                                    </div>
                                    <div class="card-body" style="line-height: 2.4;">
                                        <div class="form-group">
                                            <label for="inputName">Project Name</label>
                                            <input type="text" name="projname" id="projname"
                                                class="form-control <?php if(!empty($errProjectName)) echo "is-warning"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Client Company</label>
                                            <input name="clientCompany" type="text" id="clientCompany"
                                                class="form-control <?php if(!empty($errClientCompany)) echo "is-warning"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Project Description</label>
                                            <textarea name="projDescription" id="projDescription"
                                                class="form-control <?php if(!empty($errProjectDescription)) echo "is-warning"; ?>"
                                                rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select name="projStatus" id="projStatus"
                                                class="form-control custom-select" required>
                                                <option selected="" disabled="">Select one</option>
                                                <option>On Hold</option>
                                                <option>Canceled</option>
                                                <option>Success</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Budget</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputEstimatedBudget">Estimated budget</label>
                                            <input type="number" name="estimatedBudget" id="estimatedBudget"
                                                class="form-control <?php if(!empty($errEstimatedBudget)) echo "is-warning"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSpentBudget">Total amount spent</label>
                                            <input type="number" name="totalAmountSpent" id="totalAmountSpent"
                                                class="form-control <?php if(!empty($errTotalAmountSpent)) echo "is-warning"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEstimatedDuration">Estimated project duration</label>
                                            <input type="number" name="estimatedProjectDuration"
                                                id="estimatedProjectDuration"
                                                class="form-control <?php if(!empty($errEstimatedProjectDuration)) echo "is-warning"; ?>">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Team</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Assign Team</label>
                                            <select id="teamselect" name="teamselect" data-placeholder="Select Lead For This Team" class="form-control custom-select" style="width: 100%;" required>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>








<?php include("includes/content_js.php");?>

<script>
    var oTable;
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    var imageurl = "";

    $(document).ready(function () {
        oTable = $('#example').DataTable({
            ajax: {
                url: '../Controller/ProjectController.php?getProjects=true',
                method: "GET"
            },
            columns: [
                { "data": "projectId" },
                { "data": "Name" },
                { "data": "Client" },
                { "data": "Description"},
                { "data": "teamName"},
                {
                    "title": "Lead",
                    "render": function (data, type, row, meta) {
                        return '<img style="height: 50px;border-radius: 30px;" alt="Avatar" class="table-avatar" src=".'+ row.leadAvatar+'">';
                    }
                },
                { "data": "Status"},
                { "data": "Budget"},
                { "data": "EstimatedDuration"},
                { "data": "AmountSpent"},
                {
                    "title": "Action",
                    "render": function (data, type, row, meta) {
                        return '<a class="btn btn-primary btn-sm fivepxspacer" href="#"><i class="fas fa-folder onepxspacer"></i>View </a>' +
                            '<a class="btn btn-info btn-sm  fivepxspacer" href="#"><i class="fas fa-pencil-alt onepxspacer"></i>Edit </a>' +
                            '<a class="btn btn-danger btn-sm  fivepxspacer" href="#"><i class="fas fa-trash onepxspacer"></i>Delete </a>';
                    }
                },

            ],
            columnDefs: [
                { className: 'text-center', targets: [0, 1, 2, 3, 4,5,6,7,8,9,10] }
            ],

        });
    
        $.get("../Controller/ProjectController.php?teamselect=true", function (data, status) {
            $('#teamselect').select2({
                data: JSON.parse(data)
            });
        });
    });



    $('#addMemberForm').validate({ // initialize the plugin
        rules: {
            projname: {
                required: true,
                minlength: 5
            },
            clientCompany: {
                required: true,
                minlength: 5
            },
            projDescription: {
                required: true,
                minlength: 5
            },
            estimatedBudget: {
                required: true,
                digits: true
            },
            totalAmountSpent: {
                required: true,
                digits: true
            },
            estimatedProjectDuration: {
                required: true,
                digits: true
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            if (element.prop("type") === "radio") {
                error.insertAfter(element.parent("div").parent("div"));
            }
            else if (element.prop("type") === "file") {
                error.insertAfter(element.parent("div").parent("div"));
            }
            else {
                error.insertAfter(element);
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            var formData = {
                projectAdd: {
                    projname: $('#projname').val(),
                    clientCompany: $('#clientCompany').val(),
                    projDescription: $('#projDescription').val(),
                    estimatedBudget: $('#estimatedBudget').val(),
                    totalAmountSpent: $('#totalAmountSpent').val(),
                    estimatedProjectDuration: $('#estimatedProjectDuration').val(),
                    team: $('#teamselect').val(),
                    projStatus: $('#projStatus').val()
                }
            }

            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                success: function (response) {
                    if (response == "success") {
                        Toast.fire({ type: 'success', title: "Member Added !" });
                        $('#memberaddmodal').modal('toggle');
                        oTable.ajax.reload();
                        $("#example").fadeOut();
                        $("#example").fadeIn();
                    } else {
                        Toast.fire({ type: 'error', title: "Error Occurred !" });
                        $('#memberaddmodal').modal('toggle');
                        oTable.ajax.reload();
                        $("#example").fadeOut();
                        $("#example").fadeIn();
                    }
                }
            });
        }
    });



</script>


<?php include("includes/content_footer.php");?>