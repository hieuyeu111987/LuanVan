<?php
require_once __DIR__.'/../config/path.php';
class Route {
    public function view($folder, $viewDetail, $data = null){
        //include_once views.'layouts/main_layout.php';
        require_once views. $folder.'/'.$viewDetail.'.php';
       // include_once views.'layouts/footer.php';
    }
    
    public function viewTab($folder, $subFolder, $viewDetail, $data = null){
        include_once views.'layouts/main_layout.php';
        require_once views.'pages/'. $folder.'/'.$subFolder.'/' .$viewDetail.'.php';
        include_once views.'layouts/footer.php';
    }
    
    public function viewLogin(){
        require_once views.'pages/dang_nhap/index.php';
    }
}
?>