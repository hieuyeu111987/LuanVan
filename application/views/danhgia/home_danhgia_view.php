<?php for($i = 0; $i < count($data); $i++){ ?>
<div class="row mb-2">
    <div class="col-lg-1">
        <img class="navbar-brand-img" style="width: 54px; height: 54px;" src="../public/image/account/<?= $data[$i]['AnhDaiDien']?>" alt="image">
    </div>
    <div class="col-lg-11">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-black mb-0">
                    <span class="fa fa-star <?= $data[$i]['SoSao'] >= 1 ? 'checked' : 'text-secondary' ?>"></span>
                    <span class="fa fa-star <?= $data[$i]['SoSao'] >= 2 ? 'checked' : 'text-secondary' ?>"></span>
                    <span class="fa fa-star <?= $data[$i]['SoSao'] >= 3 ? 'checked' : 'text-secondary' ?>"></span>
                    <span class="fa fa-star <?= $data[$i]['SoSao'] >= 4 ? 'checked' : 'text-secondary' ?>"></span>
                    <span class="fa fa-star <?= $data[$i]['SoSao'] >= 5 ? 'checked' : 'text-secondary' ?>"></span>
                    <?= $data[$i]['TenNguoiDung']?>
                    <?php if(isset($_SESSION['user_id'])){ 
                            if($_SESSION['user_id'] == $data[$i]['IDNguoiDung']){ ?>
                                <button onclick="xoadanhgia(<?= $data[$i]['IDDanhGiaSanPham'] ?>)" class="btn btn-sm btn-danger" type="button">Xóa</button>
                        <?php }else{}
                    }else{}?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-black mb-0"><?= $data[$i]['MoTa']?></p>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
    function xoadanhgia(IDDanhGiaSanPham) {
        var idsanpham = '<?= $data[0]['IDSanPham'] ?>';
        $.get("ajax.php?controller=cdanhgia&action=xoadanhgia", {
            "iddanhgiasanpham" : IDDanhGiaSanPham,
            "idsanpham" : idsanpham
        },function(data){
            $("#sanpham-danhsachdanhgia").html(data);
        });
    }
</script>