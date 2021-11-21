<div class="row mt--6 ml-4 mr-4">
    <div class="col-lg-9 bg-secondary shadow">
        <div class="row">

            <?php for($i = 0; $i < count($data); $i++) {?>


                <?php if($data[$i]['NoiDung'] == 'AnhDaiDien') {?>

                    <button id='noidung-<?= $data[$i]['IDTrungBay'] ?>' onclick="chonphanedit(<?= $i ?>)" class="col-xl-<?= $data[$i]['KichThuoc'] ?> bg-<?= $data[$i]['MauSac'] ?> btn btn-link text-secondary mr-0 p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 order-lg-12">
                                <img style="width: 100%; height: 100%;" src="../public/image/nhathuoc/Logo_macdinh.png" class="rounded-circle">
                            </div>
                        </div>
                    </button>

                <?php } else if ($data[$i]['NoiDung'] == 'TenNhaThuoc') { ?>

                    <button id='noidung-<?= $data[$i]['IDTrungBay'] ?>' onclick="chonphanedit(<?= $i ?>)" class="col-xl-<?= $data[$i]['KichThuoc'] ?> bg-<?= $data[$i]['MauSac'] ?> btn btn-link text-secondary mr-0">
                        <h1 class="text-white" style="text-align: left;">Tên nhà thuốc</h1>
                    </button>

                <?php } else if ($data[$i]['NoiDung'] == 'DanhMucNhaThuoc') { ?>
                    <button id='noidung-<?= $data[$i]['IDTrungBay'] ?>' onclick="chonphanedit(<?= $i ?>)" class="col-xl-<?= $data[$i]['KichThuoc'] ?> bg-<?= $data[$i]['MauSac'] ?> btn btn-link text-secondary mr-0">
                        <div class="row">
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 1</p></div>
                            </div>
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 2</p></div>
                            </div>
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 3</p></div>
                            </div>
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 4</p></div>
                            </div>
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 5</p></div>
                            </div>
                            <div class="col-xl-2 bg-info ">
                                <div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 6</p></div>
                            </div>
                        </div>
                    </button>
                <?php } else if ($data[$i]['NoiDung'] == 'DanhSachSanPham') { ?>
                    <button id='noidung-<?= $data[$i]['IDTrungBay'] ?>' onclick="chonphanedit(<?= $i ?>)" class="col-xl-<?= $data[$i]['KichThuoc'] ?> bg-<?= $data[$i]['MauSac'] ?> btn btn-link text-secondary mr-0">
                        <div class="row">
                            <?php for($j = 0; $j < 12; $j++) {?>
                            <div class="col-xl-2 bg-<?= $data[$i]['MauSac'] ?>">
                                <div class="btn btn-outline-secondary btn-round disabled"  style="width: 100%; height:100%"  type="button">
                                    <img style="width: 100%;" src="../public/image/sanpham/HinhAnh_SanPham_MacDinh.jpg" alt="sanpham">
                                    <h6 class="text-info mb-0 fs-90">Tên sản phẩm <?= $j+1 ?></h6>
                                    <h6 class="text-success mb-0 fs-90">Giá : 0</h6>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </button>
                <?php } else if ($data[$i]['NoiDung'] == 'Trong') { ?>

                    <button id='noidung-<?= $data[$i]['IDTrungBay'] ?>' onclick="chonphanedit(<?= $i ?>)" class="col-xl-<?= $data[$i]['KichThuoc'] ?> bg-<?= $data[$i]['MauSac'] ?> btn btn-link text-secondary mr-0" style="min-height: 20px;"></button>

                <?php } else{} ?>

            <?php } ?>


        </div>
    </div>

    <div class="col-lg-3 bg-secondary shadow">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Nội dung</label>
                    <select id="input-noidung" class="form-control" onchange="thaydoinoidung()">
                        <option id="opt-trong" value="Trong">Trống</option>
                        <option id="opt-anhdaidien" value="AnhDaiDien">Ảnh đại diện</option>
                        <option id="opt-tennhathuoc" value="TenNhaThuoc">Tên nhà thuốc</option>
                        <option id="opt-danhmucnhathuoc" value="DanhMucNhaThuoc">Danh mục</option>
                        <option id="opt-danhsachsanpham" value="DanhSachSanPham">Danh sách sản phẩm</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Kích thước</label>
                    <select id="input-kichthuoc" class="form-control" onchange="thaydoikichthuoc()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Màu sắc</label>
                    <select id="input-mausac" class="form-control" onchange="thaydoimausac()">
                        <option value="info">info</option>
                        <option value="success">success</option>
                        <option value="danger">danger</option>
                        <option value="warning">warning</option>
                        <option value="primary">primary</option>
                        <option value="default">default</option>
                        <option value="secondary">secondary</option>
                        <option value="white">white</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <button onclick="luugiaodien()" class="btn btn-success btn-block">Lưu</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <button onclick="themgiaodien()" class="btn btn-info btn-block">Thêm</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <button onclick="xoagiaodien()" class="btn btn-danger btn-block">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var idgiaodien;
    var kichthuoc;
    var mausac;
    var noidung;
    var stt;
    var data = <?php echo json_encode($data); ?>;
    function chonphanedit(STT) {
        if(stt){
            $("#noidung-"+data[stt]["IDTrungBay"]).removeClass("bg-"+mausac);
            $("#noidung-"+data[stt]["IDTrungBay"]).addClass("bg-"+data[stt]["MauSac"]);
            // $("#input-noidung").val(data[stt]["NoiDung"]);
            $("#noidung-"+data[stt]["IDTrungBay"]).removeClass("col-xl-"+kichthuoc);
            $("#noidung-"+data[stt]["IDTrungBay"]).addClass("col-xl-"+data[stt]["KichThuoc"]);
            if(data[stt]["NoiDung"] == 'AnhDaiDien'){
                $("#noidung-"+data[stt]["IDTrungBay"]).html('<div class="row justify-content-center"><div class="col-lg-12 order-lg-12"><img style="width: 100%; height: 100%;" src="../public/image/nhathuoc/Logo_macdinh.png" class="rounded-circle"></div></div>');
                $("#noidung-"+data[stt]["IDTrungBay"]).addClass("p-0");
            }else if(data[stt]["NoiDung"] == 'TenNhaThuoc'){
                $("#noidung-"+data[stt]["IDTrungBay"]).html('<h1 class="text-white" style="text-align: left;">Tên nhà thuốc</h1>');
            }else if(data[stt]["NoiDung"] == 'DanhMucNhaThuoc'){
                $("#noidung-"+data[stt]["IDTrungBay"]).html('<div class="row"><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 1</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 2</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 3</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 4</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 5</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 6</p></div></div></div>');
            }else if(data[stt]["NoiDung"] == 'DanhSachSanPham'){
                var phantuhtml = '<div class="row">';
                for (let i = 0; i < 12; i++) {
                    phantuhtml += '<div class="col-xl-2 bg-'+ mausac +'"><div class="btn btn-outline-secondary btn-round disabled"  style="width: 100%; height:100%"  type="button"><img style="width: 100%;" src="../public/image/sanpham/HinhAnh_SanPham_MacDinh.jpg" alt="sanpham"><h6 class="text-info mb-0 fs-90">Tên sản phẩm '+ (i + 1) +'</h6><h6 class="text-success mb-0 fs-90">Giá : 0</h6></div></div>';
                    
                }
                phantuhtml += '</div>';
                $("#noidung-"+idgiaodien).html(phantuhtml);
            }else if(data[stt]["NoiDung"] == 'Trong'){
                $("#noidung-"+idgiaodien).html('');
            }else{}
        }else{}
        idgiaodien = data[STT]["IDTrungBay"];
        kichthuoc = data[STT]["KichThuoc"];
        mausac = data[STT]["MauSac"];
        noidung = data[STT]["NoiDung"];
        stt = STT;
        $("#noidung-"+idgiaodien).addClass("bg-"+mausac);
        $("#input-noidung").val(noidung);
        $("#input-kichthuoc").val(kichthuoc);
        $("#input-mausac").val(mausac);
    }
    function thaydoinoidung() {
        var noidungedit = $('#input-noidung').val();
        if(noidungedit == 'AnhDaiDien'){
            $("#noidung-"+idgiaodien).html('<div class="row justify-content-center"><div class="col-lg-12 order-lg-12"><img style="width: 100%; height: 100%;" src="../public/image/nhathuoc/Logo_macdinh.png" class="rounded-circle"></div></div>');
            $("#noidung-"+idgiaodien).addClass("p-0");
        }else if(noidungedit == 'TenNhaThuoc'){
            $("#noidung-"+idgiaodien).html('<h1 class="text-white" style="text-align: left;">Tên nhà thuốc</h1>');
        }else if(noidungedit == 'DanhMucNhaThuoc'){
            $("#noidung-"+idgiaodien).html('<div class="row"><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 1</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 2</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 3</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 4</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 5</p></div></div><div class="col-xl-2 bg-info "><div class="btn-block btn btn-secondary"><p style="font-size: 80%;">Danh mục 6</p></div></div></div>');
        }else if(noidungedit == 'DanhSachSanPham'){
            var phantuhtml = '<div class="row">';
            for (let i = 0; i < 12; i++) {
                phantuhtml += '<div class="col-xl-2 bg-'+ mausac +'"><div class="btn btn-outline-secondary btn-round disabled"  style="width: 100%; height:100%"  type="button"><img style="width: 100%;" src="../public/image/sanpham/HinhAnh_SanPham_MacDinh.jpg" alt="sanpham"><h6 class="text-info mb-0 fs-90">Tên sản phẩm '+ (i + 1) +'</h6><h6 class="text-success mb-0 fs-90">Giá : 0</h6></div></div>';
                
            }
            phantuhtml += '</div>';
            $("#noidung-"+idgiaodien).html(phantuhtml);
        }else if(noidungedit == 'Trong'){
            $("#noidung-"+idgiaodien).html('');
        }else{}
        noidung = noidungedit;
    }
    function thaydoikichthuoc() {
        var kichthuocedit = $('#input-kichthuoc').val();
        $("#noidung-"+idgiaodien).removeClass("col-xl-"+kichthuoc);
        $("#noidung-"+idgiaodien).addClass("col-xl-"+kichthuocedit);
        kichthuoc = kichthuocedit;
    }
    function thaydoimausac() {
        var mausacedit = $('#input-mausac').val();
        $("#noidung-"+idgiaodien).removeClass("bg-"+mausac);
        $("#noidung-"+idgiaodien).addClass("bg-"+mausacedit);
        mausac = mausacedit;
    }
    function luugiaodien() {
        if(idgiaodien && noidung && kichthuoc && mausac){
            $.post("ajax.php?controller=cnhathuoc&action=doeditgiaodien", {
                "idtrungbay" : idgiaodien,
                "noidung" : noidung,
                "kichthuoc" : kichthuoc,
                "mausac" : mausac
            },function(data){
                $("#divload").html(data);
            });
        }else{
            alert('Chưa chọn phần tử giao diện!');
        }
    }
    function themgiaodien() {
        var noidungadd = $("#input-noidung").val();
        var kichthuocadd = $("#input-kichthuoc").val();
        var mausacadd = $("#input-mausac").val();
        $.post("ajax.php?controller=cnhathuoc&action=doaddgiaodien", {
            "noidung" : noidungadd,
            "kichthuoc" : kichthuocadd,
            "mausac" : mausacadd
        },function(data){
            $("#divload").html(data);
        });
    }
    function xoagiaodien() {
        if(idgiaodien && noidung && kichthuoc && mausac){
            $.post("ajax.php?controller=cnhathuoc&action=dodeletegiaodien", {
                "idtrungbay" : idgiaodien
            },function(data){
                $("#divload").html(data);
            });
        }else{
            alert('Chưa chọn phần tử giao diện!');
        }
    }
    function thoat() {
      $("#chitietnhathuoc").html(null);
      $("#dashboards-2").text("");
    }
</script>