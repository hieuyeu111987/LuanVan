<div class="row ml-5 mr-5">
    <?php for($i = 0; $i < $data['soluong']; $i++) { ?>
    <div class="col-lg-2">
        <div class="form-group bg-white shadow">
            <div>
                <button onclick="homechitietsanpham(<?= $data['sanpham'][$i]['IDSanPham']?>)" class="btn btn-outline-secondary btn-round"  style="width: 100%; height:100%"  type="button">
                    <img style="width: 100%;" src="../public/image/sanpham/<?= $data['sanpham'][$i]["HinhAnh"]?>" alt="sanpham">
                    <p class="text-info mb-0 fs-90"><?= $data['sanpham'][$i]["TenSanPham"]?></p>
                    <p class="text-success mb-0 fs-90">Giá : <?= $data['sanpham'][$i]["Gia"]?></p>
                </button>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <button onclick="xemthem()" class="btn btn-primary btn-block" type="button">>> Xem thêm <<</button>
    </div>
</div>
<script>
    function homechitietsanpham(IDSanPham) {
        $.get("ajax.php?controller=csanpham&action=getchitietsanphamtohome", {
          "idsanpham" : IDSanPham
        },function(data){
            $("#detail-sanpham").html(data);
        });
    }
    function xemthem() {
        var soluong = 0;
        var maxsoluong = "<?= $data['maxsoluong'] ?>";
        var soluonghientai = "<?= $data['soluong'] ?>";
        var tukhoa = $('#input-search').val();
        if(maxsoluong == 1){
            alert("Đã hiển thị tất cả sản phẩm!");
        }else{
            soluong = Number(soluonghientai) + 1;
            $.get("ajax.php?controller=csanpham&action=getitemtohome", {
                'soluong': soluong,
                'tukhoa' : tukhoa
            },function(data){
                $("#home-item").html(data);
            });
        }
    }
</script>