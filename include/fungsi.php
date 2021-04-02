<?php
    function TanggalIndo($date){
        $ex = explode("-",$date);
        $tanggal = $ex[0];
        $bulan = $ex[1];
        $tahun = $ex[2];
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $result = $tanggal." ".$BulanIndo[(int)$bulan-1]." ".$tahun;
        return($result);
    }
    
    function BulanIndo($date){
        $ex = explode("-",$date);
        $bulan = $ex[0];
        $tahun = $ex[1];
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $result = $BulanIndo[(int)$bulan-1].' '.$tahun;
        return($result);
    }
?>