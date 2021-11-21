<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <p class="lead">Medicin > Bản đồ nhà thuốc</p>
            </div>
        </div>
        <div class="bg-white shadow">
            <div class="row">
                <!-- <div class="col-xl-3 pr-0">
                    <div id="map-thongtinnhathuoc"></div>
                </div> -->
                <div class="col-xl-12">
                    <div id="mapid" class="card-body pt-0" style="width: 100%; height: 450px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var x;
    var y;
    var xduocchon;
    var yduocchon;
    var danhsachnhathuoc = <?php echo json_encode($data); ?>;
    var mymap;
    var marker;
    var duongdi;
    $(document).ready( function () {
        mymap = L.map('mapid').setView([10.04688204348061, 105.76780486797722], 16);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGlldXlldTExMTk4NyIsImEiOiJja2oxNmlzcTIyejJkMnNuNGpiOXdhbWwyIn0.1GEBleIFpvbryFuDwMvZlw'
        }).addTo(mymap);

        for (var i = 0; i<danhsachnhathuoc.length; i++){
            var toado = danhsachnhathuoc[i]["ToaDo"];
            lat = toado.substr(0,toado.search(",")-1);
            lng = toado.substr(toado.search(",")+1);
            var marker = L.marker([lat,lng]).addTo(mymap);
            marker.bindPopup("<h2><b>" + danhsachnhathuoc[i]["TenNhaThuoc"] + "</b></h2>Nhà thuốc " + danhsachnhathuoc[i]["TenNhaThuoc"] + '<br><button class="btn btn-sm btn-info" onclick="chitietnhathuoc(' + danhsachnhathuoc[i]["IDNhaThuoc"] + ')">Chi tiết</button><button class="btn btn-sm btn-success" onclick="xemduongdi(' + lat + ',' + lng + ')">Đường đi</button>').openPopup();
        }

        var popup = L.popup();
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent('<button onclick="chonvitri()" class="btn btn-sm btn-info">Chọn làm vị trí của bạn!</button>')
                // .setContent("Địa điểm bạn chọn: " + e.latlng.lat.toString() + " - " + e.latlng.lng.toString())
                .openOn(mymap);
                x = e.latlng.lat;
                y = e.latlng.lng;
        }
        mymap.on('click', onMapClick);
    } );
    
    function chitietnhathuoc(IDNhaThuoc) {
        $.get("ajax.php?controller=cnhathuoc&action=loadthongtinnhathuoclenhome", {
            "idnhathuoc" : IDNhaThuoc
        },function(data){
            $("#detail-sanpham").html(data);
        });
    }

    function xemduongdi(lat,lng) {
        duongdi = L.Routing.control({
        waypoints: [
            L.latLng(xduocchon, yduocchon),
            L.latLng(lat, lng)
        ]
        }).addTo(mymap);
    }

    function chonvitri() {
        console.log(duongdi + " - " + marker);
        if(duongdi){
            mymap.removeControl(duongdi);
            duongdi = null;
        }
        if(marker){
            mymap.removeLayer(marker);
        }else{}
        marker = L.marker([x,y]).addTo(mymap);
        xduocchon = x;
        yduocchon = y;
        marker.bindPopup('<h4><b>Vị trí của bạn</b></h4><button class="btn btn-sm btn-danger" onclick="xoavitri()">Chọn vị trí khác</button>').openPopup();
    }

    function xoavitri() {
        mymap.removeLayer(marker);
        xduocchon = NULL;
        yduocchon = NULL;
    }
</script>