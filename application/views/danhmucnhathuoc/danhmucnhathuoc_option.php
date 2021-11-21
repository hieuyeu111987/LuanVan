<div >
    <select class="form-control" name="se" id="se">
        <option value="1">Tất cả</option>
        <?php   for($i = 0; $i < count($data); $i++) { ?>
            <option value="<?= $data[$i]["IDDanhMucNhaThuoc"]?>"><?= $data[$i]["TenDanhMucNhaThuoc"]?></option>
        <?php }?>
    </select>
</div>