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

    .customBadge
    {
        font-size: 90%;
        margin: 4px;
    }

</style>


<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Members </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Members</li>
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
                                <button id="addMember" type="button" data-toggle="modal" data-target="#memberaddmodal"
                                    class="btn btn-sm btn-block btn-outline-primary float-right">Add Member</button>
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
                                    <th>Avatar</th>
                                    <th>Position</th>
                                    <th>Skills</th>
                                    <th>Education</th>
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
                <h4 class="modal-title">Add Member</h4>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="addMemberForm" action="../Controller/MemberController.php" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" value="0" id="Id" />
                                    <input name="mname" id="mname" type="text" class="form-control"
                                        placeholder="Enter Members Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Role</label>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary1" name="mrole" data-role='lead'>
                                        <label for="radioPrimary1"> Team Lead
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary2" name="mrole" data-role='dev'>
                                        <label for="radioPrimary2"> Developer
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary3" name="mrole" value="sysadmin"
                                            data-role='sysd'>
                                        <label for="radioPrimary3"> Sys Admin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="memail" class="form-control" id="memail"
                                        placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Skills </label>
                                <div class="form-group">
                                    <input name="mskills" class="form-control" id="mskills" data-role="tagsinput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="mpassword" type="password" class="form-control" id="mpassword"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Education</label>
                                    <input name="meducation" type="text" class="form-control" id="meducation"
                                        placeholder="Education">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="mavatar" type="file" class="custom-file-input" id="mavatar">
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
                url: '../Controller/MemberController.php?getMembers=true',
                method: "GET"
            },
            columns: [
                { "data": "UserId" },
                { "data": "Name" },
                {
                    "title": "Avatar",
                    "render": function (data, type, row, meta) {
                        return '<img style="height: 50px;border-radius: 30px;" alt="Avatar" class="table-avatar" src=".'+ row.Avatar+'">';
                    }
                },
                {
                    "title": "Designation",
                    "render": function (data, type, row, meta) {
                        if(row.UserType === "dev")
                        {
                            return 'Developer';
                        }else if(row.UserType === "lead")
                        {
                            return 'Project Lead';
                        }else
                        {
                            return 'Sysadmin';
                        }
                    }
                },
                {
                    "title": "Skills",
                    "render": function (data, type, row, meta) {
                        var skills = row.Skills.split(',');
                        console.log(skills);
                        var skillString = "";
                        var col = ["bg-info", "bg-success", "bg-danger"];
                        skills.forEach(function(data)
                        {
                            skillString += '<span class="badge customBadge '+col.pop(getRandomInt(3))+'">'+ data +'</span>';
                        });
                        return skillString;
                    }
                },
                { "data": "Education" },
                {
                    "title": "Action",
                    "render": function (data, type, row, meta) {
                        return '<a class="btn btn-primary btn-sm update fivepxspacer" href="#"><i class="fas fa-folder onepxspacer"></i>View </a>' +
                            '<a class="btn btn-info btn-sm  fivepxspacer" href="#"><i class="fas fa-pencil-alt onepxspacer"></i>Edit </a>' +
                            '<a class="btn btn-danger btn-sm  fivepxspacer delete" href="#" data-group-id=' + row.UserId + '><i class="fas fa-trash onepxspacer"></i>Delete </a>';
                    }
                },

            ],
            columnDefs: [
                { className: 'text-center', targets: [0, 1, 2, 3, 4] }
            ],
            
        });
    });

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }


    $(function () {
        $('#example tbody').on('click', '.update', function () {
            var v = $(this).parent().parent();
            var rowData = oTable.row(v).data();
            update(rowData);
            $('#memberaddmodal').modal("toggle");
        });
    });

    function update(valueArr) {
        $('#Id').val(valueArr.UserId);
        $('#mname').val(valueArr.Name);
        $('#memail').val(valueArr.Email);
        $('#meducation').val(valueArr.Education);
        $('#mskills').tagsinput('removeAll');
        valueArr.Skills.split(",").forEach(function(value) {
            $('#mskills').tagsinput('add', value);
        });
        $('#mpassword').val(valueArr.Password);
        $("input[name=mrole][data-role='"+valueArr.UserType+"']").prop("checked",true);   
    }


        function clear() {
            $('#Id').val('');
            $('#mname').val('');
            $('#memail').val('');
            $('#meducation').val('');
            $('#mskills').tagsinput('removeAll');
            $('#mpassword').val('');
            $('#mavatar').val('');  
        }

        $( "#addMember" ).click(function() {
            clear();
        });
    

    $('#addMemberForm').validate({ // initialize the plugin
        rules: {
            mname: {
                required: true,
                minlength: 5
            },
            memail: {
                required: true,
                email: true
            },
            mpassword: {
                required: true,
                minlength: 5
            },
            meducation: {
                required: true,
                minlength: 2
            },
            mrole: {
                required: true
            },
            mavatar: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp"
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
                memberAdd: {
                    name: $('#mname').val(),
                    email: $('#memail').val(),
                    password: $('#mpassword').val(),
                    education: $('#meducation').val(),
                    role: $("input[name='mrole']:checked").attr("data-role"),
                    avatar: imageurl,
                    skills: $('#mskills').val(),
                }
            }

            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                success: function (response) {
                    console.log(response);
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


    $(function () {
        $('#mavatar').change(function () {
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



    var datagroup;
    $(function () {
        $('#example tbody').on('click', '.delete', function () {
            datagroup = 0;
            console.log(datagroup);
            datagroup = $(this).attr('data-group-id');
            destroy();
        });
    });

    var destroy = function () {
        $.get("../Controller/MemberController.php?deleteMember="+datagroup, function (data, status) {
            if(data == "success")
            {
                Toast.fire({ type: 'success', title: "Member Deleted !" });
                oTable.ajax.reload();
                $("#example").fadeOut();
                $("#example").fadeIn();
            }
        });
    }

</script>


<?php include("includes/content_footer.php");?>