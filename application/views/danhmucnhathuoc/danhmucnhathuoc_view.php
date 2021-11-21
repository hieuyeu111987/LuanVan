<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Danh mục</h3>
                    </div>
                    <div class="col-4 text-right">
                        <button onclick="viewthemdanhmuc()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="data-table" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên danh mục nhà thuốc</th>
                            <th scope="col">Tên danh mục tổng quát</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php   for($i = 0; $i < count($data); $i++) { ?>
                            <tr>
                                <td><?=$i + 1?></td>
                                <td><?=$data[$i]['TenDanhMucNhaThuoc']?></td>
                                <td><?=$data[$i]['TenDanhMucTongQuat']?></td>
                                <td style="text-align: center;">
                                    <button onclick="chitietdanhmuc(<?=$data[$i]['IDDanhMucNhaThuoc']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                    <button onclick="xoadanhmuc(<?=$data[$i]['IDDanhMucNhaThuoc']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
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

<div id="chitietdanhmuc"></div>
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function chitietdanhmuc(IDDanhMuc) {
        $.get("ajax.php?controller=cdanhmucnhathuoc&action=getchitietdanhmucnhathuoc", {
            "iddanhmuc" : IDDanhMuc
        },function(data){
            $("#chitietdanhmuc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function viewthemdanhmuc() {
        $.get("ajax.php?controller=cdanhmucnhathuoc&action=adddanhmucnhathuoc", {},function(data){
            $("#chitietdanhmuc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $('.alert').alert();
    }
    function xoadanhmuc(IDDanhMuc) {
        $.get("ajax.php?controller=cdanhmucnhathuoc&action=deletedanhmucnhathuoc", {
            "iddanhmuc" : IDDanhMuc
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>