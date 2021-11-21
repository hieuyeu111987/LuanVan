<div class="col-lg-12">
    <div class="form-group bg-white">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="heading-title text-info mb-0 mt-3 ml-3">Địa chỉ giao hàng</h3>
                <hr class="my-3">
            </div>
        </div>
        <div class="row" style="padding: 16px;">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" id="input-hovaten" placeholder="Họ và tên">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control mt-3" type="text" id="input-sdt" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control mt-3" type="text" id="input-diachi" placeholder="Địa chỉ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-muted mb-0 mt-3">Chọn vị trí</p>
                        <div id="chonvitri" class="card-body pt-0" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button onclick="xacnhanthanhtoankhinhan()" class="btn btn-block btn-info mt-3" type="button">Xác nhận thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var x;
    var y;
    $(document).ready( function () {
        var mymap = L.map('chonvitri').setView([10.04688204348061, 105.76780486797722], 16);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGlldXlldTExMTk4NyIsImEiOiJja2oxNmlzcTIyejJkMnNuNGpiOXdhbWwyIn0.1GEBleIFpvbryFuDwMvZlw'
        }).addTo(mymap);

        var popup = L.popup();
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Đây là địa điểm bạn chọn!")
                // .setContent("Địa điểm bạn chọn: " + e.latlng.lat.toString() + " - " + e.latlng.lng.toString())
                .openOn(mymap);
                x = e.latlng.lat;
                y = e.latlng.lng;
        }
        mymap.on('click', onMapClick);
    } );
    
    function xacnhanthanhtoankhinhan() {
        if(!x || !y){
            alert("Chưa chọn vị trí!");
        }else{
            var hovaten = $('#input-hovaten').val();
            var sdt = $('#input-sdt').val();
            var email = $('#input-email').val();
            var diachi = $('#input-diachi').val();
            $.post("ajax.php?controller=choadonxuat&action=xacnhanthanhtoankhinhan", {
                'TenNguoiMua' : hovaten,
                'SDT' : sdt,
                'DiaChi' : diachi,
                'ToaDo': x + ", " + y
            },function(data){
                $("#detail-sanpham").html(data);
            });
        }
    }
</script>