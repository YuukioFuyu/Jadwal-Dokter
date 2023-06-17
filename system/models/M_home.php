<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_home extends RAST_Model {

    function get_list() {
    	$hari = $this->namahari();
    
        $query = $this->db->query
                ('
                    SELECT
                    	j.id
                        , d.nama
                        , j.hari
                        , j.jam_mulai
                        , j.jam_selesai
                        , p.nama AS nama_poli
                    FROM
                    	jadwal j
                        , dokter d
                        , poli p
                    WHERE
                        j.dokter = d.id
                        AND j.poli = p.id
                        AND d.status = 1
                        AND j.hari = ' . "'" . $hari . "'" . '
                    ORDER BY
                        j.poli ASC
                        , j.jam_mulai ASC
		');

        return $query->result_array();
    }

    function get_list_all() {
        $query = $this->db->query
                ('
                    SELECT
                    	j.id
                        , d.nama
                        , j.hari
                        , j.jam_mulai
                        , j.jam_selesai
                        , p.nama AS nama_poli
                    FROM
                    	jadwal j
                        , dokter d
                        , poli p
                    WHERE
                        j.dokter = d.id
                        AND j.poli = p.id
                        AND d.status = 1
                    ORDER BY
                        j.poli ASC
                        , j.jam_mulai ASC
		');

        return $query->result_array();
    }

    function get_list_poli() {
        $query = $this->db->query
                ('
                    SELECT
                    	*
                    FROM
                        poli
                    WHERE
                        status = 1
		');

        return $query->result_array();
    }

    function get_list_dokter() {
        $query = $this->db->query
                ('
                    SELECT
                    	*
                    FROM
                        dokter
                    WHERE
                        status = 1
		');

        return $query->result_array();
    }

	function namahari() {
		$tanggal = date('Y-m-d');
	
		$tgl=substr($tanggal, 8, 2);
		$bln=substr($tanggal, 5, 2);
		$thn=substr($tanggal, 0, 4);
 
		$info=date('w', mktime(0, 0, 0, $bln, $tgl, $thn));
	
		switch($info){
			case '0': return "Minggu"; break;
			case '1': return "Senin"; break;
			case '2': return "Selasa"; break;
			case '3': return "Rabu"; break;
			case '4': return "Kamis"; break;
			case '5': return "Jumat"; break;
			case '6': return "Sabtu"; break;
		};   
	}

    function get_isi($a) {
        $query = $this->db->query
                ('
					SELECT
						*
					FROM
						jadwal
					WHERE
						id = ' . $a
        );

        return $query->result_array();
    }

    function get_isi_dokter($a) {
        $query = $this->db->query
                ('
					SELECT
						*
					FROM
						dokter
					WHERE
						id = ' . $a
        );

        return $query->result_array();
    }
    
    function get_isi_poli($a) {
        $query = $this->db->query
                ('
					SELECT
						*
					FROM
						poli
					WHERE
						id = ' . $a
        );

        return $query->result_array();
    }

    function process($a) {
        $query = FALSE;
        $deskripsi="";
        if ($a['jadwal_id'] == '') {
            $query = $this->db->query
                    ('
                        INSERT INTO jadwal VALUES
                        (
                            ' . "'" . "'" . '
                            , ' . $a['poli_id'] . '
                            , ' . $a['dokter_id'] . '
                            , ' . "'" . $a['hari'] . "'" . '
                            , ' . "'" . $a['jam_mulai'] . "'" . '
                            , ' . "'" . $a['jam_selesai'] . "'" . '
                            , 1
                        )
                    ');
        } else {
            $query = $this->db->query
                    ('
						UPDATE jadwal SET
                            poli = ' . $a['poli_id'] . '
                            , dokter = ' . $a['dokter_id'] . '
                            , hari = ' . "'" . $a['hari'] . "'" . '
                            , jam_mulai = ' . "'" . $a['jam_mulai'] . "'" . '
                            , jam_selesai = ' . "'" . $a['jam_selesai'] . "'" . '
						WHERE
							id = ' . $a['jadwal_id']
            );
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function process_dokter($a) {
        $query = FALSE;
        $deskripsi="";
        if ($a['id'] == '') {
            $query = $this->db->query
                    ('
                        INSERT INTO dokter VALUES
                        (
                            ' . "'" . "'" . '
                            , ' . "'" . $a['nama'] . "'" . '
                            , 1
                        )
                    ');
        } else {
            $query = $this->db->query
                    ('
						UPDATE dokter SET
                            nama = ' . "'" . $a['nama'] . "'" . '
						WHERE
							id = ' . $a['id']
            );
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete($a) {
        $query = $this->db->query
                ('
                    DELETE FROM jadwal
                    WHERE
                        id = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete_dokter($a) {
        $query = $this->db->query
                ('
                    UPDATE dokter SET
                        status = 0
                    WHERE
                        id = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
        function process_poli($a) {
        $query = FALSE;
        $deskripsi="";
        if ($a['id'] == '') {
            $query = $this->db->query
                    ('
                        INSERT INTO poli VALUES
                        (
                            ' . "'" . "'" . '
                            , ' . "'" . $a['nama'] . "'" . '
                            , 1
                        )
                    ');
        } else {
            $query = $this->db->query
                    ('
						UPDATE poli SET
                            nama = ' . "'" . $a['nama'] . "'" . '
						WHERE
							id = ' . $a['id']
            );
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete_poli($a) {
        $query = $this->db->query
                ('
                    UPDATE poli SET
                        status = 0
                    WHERE
                        id = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


