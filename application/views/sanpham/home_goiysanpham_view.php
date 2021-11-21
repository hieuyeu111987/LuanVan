<div class="row ml-5 mr-5 mt-5">
    <div class="col-lg-12">
        <div class="form-group bg-white shadow">
            <div class="row p-2">
                <div class="col-lg-5">
                    <p class="heading-title text-info">Sản phẩm gợi ý</p>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-lg-12">
                    <?php for($i = 0; $i < count($data); $i++) { ?>
                        <div class="col-lg-2">
                            <div class="form-group bg-white">
                                <div>
                                    <button onclick="homechitietsanpham(<?= $data[$i]['IDSanPham']?>)" class="btn btn-outline-secondary btn-round"  style="width: 100%; height:100%"  type="button">
                                        <img style="width: 100%;" src="../public/image/sanpham/<?= $data[$i]["HinhAnh"]?>" alt="sanpham">
                                        <p class="text-info mb-0 fs-90"><?= $data[$i]["TenSanPham"]?></p>
                                        <p class="text-success mb-0 fs-90">Giá : <?= $data[$i]["Gia"]?></p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
