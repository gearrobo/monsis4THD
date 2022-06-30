<?php
  function getMataAngin($arah) {
    $array_mata_angin = array(
        "1" => "Utara",
        "2" => 'Timur Laut',
        "3" => 'Timur',
        "4" => 'Tenggara',
        "5" => 'Selatan',
        "6" => 'Barat Daya',
        "7" => 'Barat',
        "8" => 'Barat Laut',
    );
    $mata_angin =  $array_mata_angin[$arah];
    return $mata_angin ;
    }


?>
