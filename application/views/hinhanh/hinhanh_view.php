<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Hình ảnh</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button onclick="viewthemhinhanh()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td>
                                    <img data-toggle="modal" data-target="#modal-default" style="width: 50px; height: 50px;" src="../public/image/sanpham/<?=$data[$i]['HinhAnh']?>" alt="image">
                                    
                                    <div class="modal fade " id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                            <img src="../public/image/sanpham/<?=$data[$i]['HinhAnh']?>" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <!-- <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-default"><i class="fas fa-info"></i></button> -->
                                        <button onclick="xoahinhanh(<?=$data[$i]['IDHinhAnh']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
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
    // function showhinh(hinh) {
    //     $.get("ajax.php?controller=chinhanh&action=showhinh", {
    //         "hinh" : hinh
    //     },function(data){
    //         $("#modal-default").html(data);
    //     });
    // }
    function viewthemhinhanh() {
        $.get("ajax.php?controller=chinhanh&action=addhinhanh", {},function(data){
            $("#chitiet").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Thêm tin tức");
    }
    function xoahinhanh(IDHinhAnh) {
        $.get("ajax.php?controller=chinhanh&action=dodeletehinhanh", {
            "idhinhanh" : IDHinhAnh
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>