<div class="row mb-5">
    <div class="col-lg-12">
        <div class="row">

            <?php for($i = 0; $i < count($data['trungbay']); $i++) {?>
            <?php if($data['trungbay'][$i]['NoiDung'] == 'AnhDaiDien') {?>

                <div class="col-xl-<?= $data['trungbay'][$i]['KichThuoc'] ?> bg-<?= $data['trungbay'][$i]['MauSac'] ?>">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 order-lg-12">
                            <div class="card-profile-image">
                                <img style="width: 100%; height: 100%;" src="../public/image/nhathuoc/<?= $data['nhathuoc'][0]["AnhDaiDien"]?>" class="rounded-circle">
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else if ($data['trungbay'][$i]['NoiDung'] == 'TenNhaThuoc') { ?>

                <div class="col-xl-<?= $data['trungbay'][$i]['KichThuoc'] ?> bg-<?= $data['trungbay'][$i]['MauSac'] ?>">
                    <h1 class="text-white"><?= $data['nhathuoc'][0]["TenNhaThuoc"]?></h1>
                </div>

            <?php } else if ($data['trungbay'][$i]['NoiDung'] == 'DanhMucNhaThuoc') { ?>
                <div class="col-xl-<?= $data['trungbay'][$i]['KichThuoc'] ?> bg-<?= $data['trungbay'][$i]['MauSac'] ?>">
                    <div class="row">
                        <?php for($j = 0; $j < count($data['danhmucnhathuoc']); $j++) {?>
                        <div class="col-xl-2 bg-info ">
                            <button class="btn-block btn btn-secondary"><?= $data['danhmucnhathuoc'][$j]['TenDanhMucNhaThuoc']?></button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else if ($data['trungbay'][$i]['NoiDung'] == 'DanhSachSanPham') { ?>
                <div class="col-xl-<?= $data['trungbay'][$i]['KichThuoc'] ?> bg-<?= $data['trungbay'][$i]['MauSac'] ?>">
                    <div class="row">
                        <?php for($j = 0; $j < count($data['sanpham']); $j++) {?>
                        <div class="col-xl-2 bg-white ">
                            <button onclick="homechitietsanpham(<?= $data['sanpham'][$j]['IDSanPham']?>)" class="btn btn-outline-secondary btn-round"  style="width: 100%; height:100%"  type="button">
                                <img style="width: 100%;" src="../public/image/sanpham/<?= $data['sanpham'][$j]["HinhAnh"]?>" alt="sanpham">
                                <p class="text-info mb-0 fs-90"><?= $data['sanpham'][$j]["TenSanPham"]?></p>
                                <p class="text-success mb-0 fs-90">Giá : <?= $data['sanpham'][$j]["Gia"]?></p>
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else if ($data['trungbay'][$i]['NoiDung'] == 'Trong') { ?>
            
                <div class="col-xl-<?= $data['trungbay'][$i]['KichThuoc'] ?> bg-<?= $data['trungbay'][$i]['MauSac'] ?>" style="min-height: 20px;"></div>
            
            <?php } else{} ?>
            <?php } ?>

        </div>
    </div>
</div>

