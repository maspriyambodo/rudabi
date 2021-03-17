<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Change Password
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('Auth/Security/Save/'); ?>" method="post">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" id="old_pwd" name="old_pwd" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" id="new_pwd" name="new_pwd" class="form-control" required="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cnf_pwd" class="form-control" required="" autocomplete="off" onfocusout="Check()"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">Change Password</button>
            </div>
            <div class="modal" id="staticBackdrop" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center text-uppercase">Confirm Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-info">
                                anda yakin ingin merubah kata sandi?
                            </p>
                            <small class="text-warning">* setelah ini anda akan diarahkan ke halaman login, harap mengingat kata sandi!</small>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center">
                                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                                    <button type="submit" class="btn btn-success text-uppercase">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<input type="hidden" name="gagal" readonly="" value="<?php echo $this->session->flashdata('gagal'); ?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    window.onload = function () {
        toastr.options = {closeButton: true, debug: false, newestOnTop: false, progressBar: false, positionClass: "toast-top-full-width", preventDuplicates: false, onclick: null, showDuration: "300", hideDuration: "1000", timeOut: "5000", extendedTimeOut: "1000", showEasing: "swing", hideEasing: "linear", showMethod: "fadeIn", hideMethod: "fadeOut"};
        var a = $('input[name="gagal"]').val();
        if (a === "") {
            return true;
        } else {
            toastr.error(a);
        }
    };
    function Check() {
        var a, b;
        a = $('input[name=new_pwd]').val();
        b = $('input[name=cnf_pwd]').val();
        if (b !== a) {
            $('input[name=new_pwd]').val("");
            $('input[name=cnf_pwd]').val("");
            toastr.error("Mohon masukkan kata sandi baru dengan benar!");
        } else {
            return true;
        }

    }
</script>