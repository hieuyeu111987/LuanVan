<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Nhà thuốc</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên nhà thuốc</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Ngày đăng ký</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><?=$data[$i]['TenNhaThuoc']?></td>
                                    <td><?=$data[$i]['SDT']?></td>
                                    <td><?=$data[$i]['Email']?></td>
                                    <td><?=$data[$i]['WebSite']?></td>
                                    <td><?=$data[$i]['NgayDangKy']?></td>
                                    <td style="text-align: center;">
                                        <button onclick="doitrangthainhathuoc(<?= $data[$i]['IDNhaThuoc']?>)" class="btn btn-sm btn-<?= $data[$i]["TrangThai"] == 1 ? 'success' : 'danger' ?>" type="button"><?= $data[$i]["TrangThai"] == 1 ? '<i class="fas fa-unlock"></i>' : '<i class="fas fa-lock"></i>' ?></button>
                                    </td>
                                    <td style="text-align: center;">
                                        <button onclick="chitietnhathuoc(<?=$data[$i]['IDNhaThuoc']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-info"></i></button>
                                        <!-- <button class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button> -->
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

<div id="chitietnhathuoc"></div>
<link rel="stylesheet" type="text/css" href="../tables/datatables.min.css">
<script type="text/javascript" src="../tables/jquery.min.js"></script>
<script type="text/javascript" src="../tables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function chitietnhathuoc(IDNhaThuoc) {
        $.get("ajax.php?controller=cnhathuoc&action=getchitietnhathuoc", {
            "idnhathuoc" : IDNhaThuoc
        },function(data){
            $("#chitietnhathuoc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Chi tiết nhà thuốc");
    }
    function doitrangthainhathuoc(IDNhaThuoc) {
        $.get("ajax.php?controller=cnhathuoc&action=doitrangthainhathuoc", {
            "idnhathuoc" : IDNhaThuoc
        },function(data){
            console.log(data);
            $("#divload").html(data);
        });
    }
  </script>