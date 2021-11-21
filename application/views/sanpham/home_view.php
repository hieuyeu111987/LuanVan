<div>
    <div class="row ml-5 mr-5 mt-3 mb-3">
        <div class="col-lg-12">
            <img style="width: 100%; height: 330px;" src="../public/image/tintuc/BG.png" alt="logo">
        </div>
    </div>
</div>
<!-- <div id="tintuc" class="nav-item ml-6 mt-3 mb-3">
    <img src="../public/image/tintuc/tin01.jpg" alt="">
</div> -->

<div>
    <div class="row ml-5 mr-5">
        <div class="col-lg-12">
            <div class="form-group bg-white shadow">
                <div class="row p-2">
                    <div class="col-lg-5">
                        <p class="heading-title text-info">Danh mục</p>
                    </div>
                </div>
                <div id="div-home-danhmuctongquat"></div>
                
            </div>
        </div>
    </div>
</div>

<div>
    
    <div  id="div-home-sanpham">
        
    </div>
</div>

<script>
    $(document).ready( function () {
        $.get("ajax.php?controller=csanpham&action=getsanphamtohome", {},function(data){
            $("#div-home-sanpham").html(data);
        });
        $.get("ajax.php?controller=cdanhmuctongquat&action=getdanhmuctongquattohome", {},function(data){
            $("#div-home-danhmuctongquat").html(data);
        });
    } );
</script>