<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tin tức</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button onclick="viewthemsanpham()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><img style="width: 50px; height: 50px;" src="../public/image/sanpham/<?=$data[$i]['IDHinhAnh']?>" alt="image"></td>
                                    <td><?=$data[$i]['TenSanPham']?></td>
                                    <td><?=$data[$i]['IDDanhMucNhaThuoc']?></td>
                                    <td><?=$data[$i]['Mota']?></td>
                                    <td style="text-align: center;">
                                        <button onclick="chitietsanpham(<?=$data[$i]['IDSanPham']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                        <button onclick="xoasanpham(<?=$data[$i]['IDSanPham']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="chitiet"></div>

<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function chitietsanpham(IDSanPham) {
        $.get("ajax.php?controller=csanpham&action=getchitietsanpham", {
            "idsanpham" : IDSanPham
        },function(data){
            $("#chitiet").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function viewthemsanpham() {
        $.get("ajax.php?controller=csanpham&action=addsanpham", {},function(data){
            $("#chitiet").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Thêm tin tức");
    }
    function xoasanpham(IDSanPham) {
        $.get("ajax.php?controller=csanpham&action=dodeletesanpham", {
            "idsanpham" : IDSanPham
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>