<div class="row">
    <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Đổi mật khẩu</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="ajax.php?controller=cnguoidung&action=doeditnguoidung" method="POST" enctype="multipart/form-data">
                        <div class="pl-lg-4">

                            <div class="row">

                                <div class="col-lg-12">
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-tentaikhoan">Tên tài khoản</label>
                                            <input type="text" id="input-tentaikhoan" name="input-tentaikhoan" class="form-control" value="<?= $data[0]["TaiKhoan"]?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-matkhaumoi">Mật khẩu mới</label>
                                            <input type="password" id="input-matkhaumoi" name="input-matkhaumoi" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-matkhaunhaplai">Nhập lại mật khẩu mới</label>
                                                <input type="password" id="input-matkhaunhaplai" name="input-matkhaunhaplai" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <button onclick="capnhatmatkhaumoi(<?= $data[0]['IDNguoiDung']?>)" class="btn btn-sm btn-info" type="button">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function UpImg() {
        $("#anhdaidien").attr("src",URL.createObjectURL(event.target.files[0]));
    }
    function capnhatmatkhaumoi(IDNguoiDung) {
        var tentaikhoan = $('#input-tentaikhoan').val();
        var matkhaumoi = $('#input-matkhaumoi').val();
        var matkhaunhaplai = $('#input-matkhaunhaplai').val();
        if(matkhaumoi == matkhaunhaplai){
            $.post("ajax.php?controller=cnguoidung&action=dodoimatkhau", {
                'idnguoidung' : IDNguoiDung,
                'matkhaumoi' : matkhaumoi
            },function(data){
                $("#divload").html(data);
            });
        }else{
            alert("Mật khẩu nhập lại không trùng khớp!");
        }
    }
</script>
