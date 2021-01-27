<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Users Management</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Change User Login
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('Users/Manage/Save/'); ?>" method="post">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="hidden" name="userid" value="<?php echo $param[0]->id; ?>"/>
                        <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                        <input type="text" name="uname" class="form-control" autocomplete="off" value="<?php echo $param[0]->uname; ?>" required=""/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="pwdtxt" id="pwdtxt" class="form-control" placeholder="input your secure password" required="">
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="showpwd()"><i class="fa fa-eye showpwd" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    function showpwd() {
        switch (document.getElementById("pwdtxt").type) {
            case "password":
                document.getElementById("pwdtxt").type = "text";
                $(".showpwd").removeClass("fa fa-eye");
                $(".showpwd").addClass("fa fa-eye-slash");
                break;
            case "text":
                document.getElementById("pwdtxt").type = "password";
                $(".showpwd").removeClass("fa fa-eye-slash");
                $(".showpwd").addClass("fa fa-eye");
        }
    }
    var a = "<?php echo $this->session->flashdata('gagal'); ?>";
    if (a === "") {
    } else {
        toastr.options = {
            closeButton: true, debug: false, newestOnTop: false, progressBar: false, positionClass: "toast-top-full-width", preventDuplicates: false, onclick: null, showDuration: "300", hideDuration: "1000", timeOut: "5000", extendedTimeOut: "1000", showEasing: "swing", hideEasing: "linear", showMethod: "fadeIn", hideMethod: "fadeOut"
        };
        toastr.error(a);
    }
</script>