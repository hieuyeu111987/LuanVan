
<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <div class="form-group bg-white shadow">
            <div class="row p-2">
                <div class="col-lg-5">
                    <p class="heading-title text-info">Sản phẩm</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="home-item"></div>



<script>
    $(document).ready( function () {
        $.get("ajax.php?controller=csanpham&action=getitemtohome", {
            'soluong': 6
        },function(data){
            $("#home-item").html(data);
        });
        var danhmuctongquat = "";
    } );
    function UpImg() {
        var danhmuctongquat = $('#input-danhmuctongquat').val();
        $.get("ajax.php?controller=csanpham&action=getoptiondanhmucnhathuoctohome", {
            "iddanhmuctongquat" : danhmuctongquat
        },function(data){
            $("#home-danhmucnhathuoc-option").html(data);
        });
    }
    function timkiemsanpham() {
        var tukhoa = $('#input-search').val();
        $.get("ajax.php?controller=csanpham&action=getitemtohome", {
            'soluong': 6,
            'tukhoa' : tukhoa
        },function(data){
            $("#home-item").html(data);
        });
    }
</script>