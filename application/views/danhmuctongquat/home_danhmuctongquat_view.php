<div class="row">
    <?php   for($i = 0; $i < count($data); $i++) { ?>
        <div class="col-2" >
            <div class="form-group bg-white">
                <div>
                    <button onclick="timkiemsanphamtheodanhmuc(<?= $data[$i]['IDDanhMucTongQuat'] ?>)" class="btn btn-outline-secondary btn-round" style="width: 100%; height:100%" type="button">
                        <!-- <img style="width: 100%;" src="../public/image/sanpham/images (1).jpg" alt="sanpham"> -->
                        <p class="text-muted mb-0"><?= $data[$i]["TenDanhMucTongQuat"]?></p>
                    </button>
                </div>
            </div>
        </div>
    <?php }?>
    <div class="col-2" >
        <div class="form-group bg-white">
            <div>
                <button onclick="timkiemsanphamtheodanhmuc()" class="btn btn-outline-secondary btn-round"  style="width: 100%; height:100%" type="button">
                    <!-- <img style="width: 100%;" src="../public/image/sanpham/images (1).jpg" alt="sanpham"> -->
                    <p class="text-muted mb-0">Tất cả</p>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function timkiemsanphamtheodanhmuc(IDDanhMucTongQuat) {
        console.log(IDDanhMucTongQuat);
        $.get("ajax.php?controller=csanpham&action=getitemtohome", {
            'soluong': 6,
            'iddanhmuctongquat' : IDDanhMucTongQuat
        },function(data){
            $("#home-item").html(data);
        });
    }
</script>