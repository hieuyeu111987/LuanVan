<div class="row">
    <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Thông tin người dùng</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="ajax.php?controller=cnguoidung&action=doeditnguoidung" method="POST" enctype="multipart/form-data">
                        <div class="pl-lg-4">

                            <div class="row">

                                <div class="col-lg-6">
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-tennguoidung">Tên người dùng</label>
                                            <input type="text" id="input-tennguoidung" name="input-tennguoidung" class="form-control" value="<?= $data[0]["TenNguoiDung"]?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-sdt">Số điện thoại</label>
                                            <input type="text" id="input-sdt" name="input-sdt" class="form-control" value="<?= $data[0]["SDT"]?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-cmnd">Chứng minh nhân dân</label>
                                                <input type="text" id="input-cmnd" name="input-cmnd" class="form-control" value="<?= $data[0]["CMND"]?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email</label>
                                                <input type="text" id="input-email" name="input-email" class="form-control" value="<?= $data[0]["Email"]?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                                    <input type="file" name="input-anhdaidien" id="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                                    
                                    <img id="anhdaidien" style="max-width: 100%;" src="../public/image/account/<?= $data[0]['AnhDaiDien']?> ?>" alt="photo">
                                    
                                </div>

                            </div>

                        </div>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <button class="btn btn-sm btn-info" type="submit">Cập nhật</button>
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
</script>
