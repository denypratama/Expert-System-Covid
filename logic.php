<?php
    session_start();
    require '../../fungsi.php';
    //engko diagnosa e maen get soko select name
    // sementara static
    $dg = "DGN002";
    $user = "deny.prtm";
    $dgQuery = query("SELECT * FROM diagnosa WHERE user = '$user' AND iddiagnosa = '$dg' AND jawab = 'iya'");
    $ruleQuery = query("SELECT * FROM rule");
    $tempData = [];
    $idx = 0;
    foreach($ruleQuery as $rule){
        $status = 0;
        foreach($dgQuery as $diagnosa){
            if($rule["kodegejala"] == $diagnosa["kodegejala"]){
                $penyakit = $rule["kodepenyakit"];
                $tempData[$idx] = $penyakit;
                $status = 1;
            }
        }   
        if($status == 1){
            $idx += 1;
        }
    }
    $resultData = [[],[]];
    $penyakitQuery = query("SELECT * FROM penyakit");
    $idx = 0;
    foreach ($penyakitQuery as $penyakit) {
        $p = $penyakit["kodepenyakit"];
        $resultData[$idx][0] = $p;
        $inc = 0;
        for ($i=0; $i < sizeof($tempData); $i++) { 
            $data = $tempData[$i];
            if($p == $data){
                $inc += 1;
            }
        }
        $resultData[$idx][1] = $inc;
        $idx += 1;
    }
    array_multisort(array_map(function($element) {
        return $element[1];
    }, $resultData), SORT_DESC, $resultData);
?>
    Prediksi Penyakit
    <table>
        <tr>    
            <td>Penyakit</td>
            <td>Prediksi Sering Penyakit Keluar</td>
            <td>Solusi</td>
        </tr>
        
        <?php foreach($resultData as $hasil) : ?>
            <tr>    
                <td><?= $hasil[0] ?></td>
                <td><?= $hasil[1] ?></td>
                <?php $solusi = query("SELECT solusi FROM penyakit WHERE kodepenyakit = '$hasil[0]' ")[0];
                    $solusi = $solusi["solusi"];
                ?>
                <td><?= $solusi ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>
