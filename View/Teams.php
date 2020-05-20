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
                    <h1> Teams </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Teams</li>
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
                        <h3 class="card-title">Overall Team Members Registered</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button type="button" data-toggle="modal" data-target="#teamAddModal"
                                    class="btn btn-sm btn-block btn-outline-primary float-right">Create A Team</button>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped projects" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Lead</th>
                                    <th>Members</th>
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

<div class="modal fade" id="teamAddModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="addTeamForm" action="../Controller/TeamController.php" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="tname" name="tname" type="text" class="form-control"
                                        placeholder="Enter Team Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Select Team Members</label>

                                    <div class="select2-purple">
                                        <select class="select2" multiple="multiple" id="memselect" name="memselect"
                                            data-placeholder="Select Members For This Team" style="width: 100%;"
                                            required></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Select Team Lead</label>
                                    <select id="leadselect" name="leadselect"
                                        data-placeholder="Select Lead For This Team" class="form-control custom-select"
                                        style="width: 100%;" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Team Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="tavatar" id="tavatar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div> -->
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
                url: '../Controller/TeamController.php?getTeams=true',
                method: "GET"
            },
            columns: [
                { "data": "TeamId" },
                { "data" : "TeamName" },
                {
                    "title": "Avatar",
                    "render": function (data, type, row, meta) {
                        return '<img style="height: 50px;border-radius: 30px;" alt="Avatar" class="table-avatar" src=".'+ row.TeamAvatar+'">';
                    }
                },
                {
                    "title": "Lead",
                    "render": function (data, type, row, meta) {
                        return '<img style="height: 50px;border-radius: 30px;" alt="Avatar" class="table-avatar" src=".'+ row.leadAvatar+'">';
                    }
                },
                {
                    "title": "Members",
                    "render": function (data, type, row, meta) {
                        var teamMembers = "";
                        row.members.forEach(function(item){
                            teamMembers = teamMembers + '<li class="list-inline-item"><img alt="Avatar" class="table-avatar" src="./'+item.userAvatar+'"></li>';
                        });
                        console.log(teamMembers);
                        return '<ul class="list-inline">' + teamMembers  +'</ul>';
                    }
                },

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
                { className: 'text-center', targets: [0, 1, 2, 3, 4,5] }
            ],
        });


        $.get("../Controller/MemberController.php?selectMember=true", function (data, status) {
            $('#memselect').select2({
                data: JSON.parse(data)
            });
        });

        $.get("../Controller/MemberController.php?leadselect=true", function (data, status) {
            $('#leadselect').select2({
                data: JSON.parse(data)
            });
        });

    });


    function getSelectedMembersId()
    {
        var ids = [];
        var membersSelected = $('#memselect').select2("data");

        membersSelected.forEach(function(item){
            ids.push(item.id);
        });
        return ids;
    }

    $('#addTeamForm').validate({ // initialize the plugin
        rules: {
            tname: {
                required: true,
                minlength: 5
            },
            tavatar: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp"
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            if (element.prop("type") === "file") {
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
                teamAdd: {
                    name: $('#tname').val(),
                    avatar: imageurl,
                    members: getSelectedMembersId(),
                    lead : $('#leadselect').val()
                }
            }
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                success: function (response) {
                    if (response == "success") {
                        Toast.fire({ type: 'success', title: "Member Added !" });
                        $('#teamAddModal').modal('toggle');
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



    $(function () {
        $('#tavatar').change(function () {
            var file = this.files[0];

            // do your validation here

            var formData = new FormData();
            formData.append('photo-img', file); // append the file to form data

            var xhr = false;
            if (typeof XMLHttpRequest !== 'undefined') {
                xhr = new XMLHttpRequest();
            }
            else {
                var versions = ["MSXML2.XmlHttp.5.0", "MSXML2.XmlHttp.4.0", "MSXML2.XmlHttp.3.0", "MSXML2.XmlHttp.2.0", "Microsoft.XmlHttp"];
                for (var i = 0, len = versions.length; i < len; i++) {
                    try {
                        xhr = new ActiveXObject(versions[i]);
                        break;
                    }
                    catch (e) { }
                }
            }
            if (xhr) {
                // replace test.php with your own upload script url
                xhr.open("POST", "ImageUpload.php", true);
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status == 200) {
                        var response = this.response || this.responseText;
                        console.log(response);
                        /** Do Something with the reponse **/
                        response = $.parseJSON(response);
                        if (response && response.message) {

                            if (response.error == 0) {
                                Toast.fire({
                                    type: 'success',
                                    title: response.message
                                })
                                imageurl = response.dir;
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: response.message
                                })
                            }
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: 'Error Occurred'
                            })
                        }
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'Unknown Error Occurred'
                        })
                    }
                }
                // now send the formData to server
                xhr.send(formData);
            }
        });
    });

</script>


<?php include("includes/content_footer.php");?>