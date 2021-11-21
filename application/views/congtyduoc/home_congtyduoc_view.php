<div class="row ml-5 mr-5 mt-5">
    <div class="col-lg-12">
        <div class="bg-white shadow">
            <div class="row p-3">
                <div class="col-xl-12" style="text-align: center;">
                    <h3 class="heading-title text-info">Các nhãn hàng</h3>
                </div>
            </div>
            <div class="row">
                <?php   for($i = 0; $i < count($data); $i++) { ?>
                    <div class="col-xl-4">
                        <div class="p-5">
                            <a href="../<?= $data[$i]['WebSite']?>">
                                <img onclick="dentrangcongtyduoc('<?= $data[$i]['WebSite']?>')" style="width: 100%; height: 100px;" src="../public/image/congtyduoc/<?= $data[$i]['AnhDaiDien']?>" alt="photo">
                            </a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row mt-5">
    <div class="col-lg-12">
        <div class="row section section-lg section-shaped">
            <div class="col-xl-12 shape shape-style-1 shape-primary" style="text-align: center;">
                <h3 class="heading-title text-white">Các nhãn hàng</h3>
            </div>
        </div>
    </div>
</div> -->
<script>
    function dentrangcongtyduoc(Website)
	{
		// window.location.assign(Website);
        // exit();
	}
</script>