<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getMahasiswaById($id)
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa WHERE id = '". $id ."'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	function addMahasiswa($data){
		$query = "INSERT INTO mahasiswa VALUES ('', 
                '" . $data['nim'] . "', 
                '" . $data['nama'] . "', 
                '" . $data['tempat'] . "', 
                '" . $data['tanggal_lahir'] . "',
                '" . $data['gender'] . "',
                '" . $data['email'] . "',
                '" . $data['telp'] . "')";
        // Mengeksekusi query
        return $this->execute($query);
	}
	function updateMahasiswa($data){
		$query = "UPDATE mahasiswa SET 
		nim = '". $data['nim'] ."',
		nama = '". $data['nama'] ."',
		tempat = '". $data['tempat'] ."',
		tl = '". $data['tanggal_lahir'] ."',
		gender = '". $data['gender'] ."',
		email = '". $data['email'] ."',
		telp = '". $data['telp'] ."'
		WHERE id = '". $data['id'] ."';
		";
        // Mengeksekusi query
        return $this->execute($query);
	}
	function delete($id){
		$query = "DELETE FROM mahasiswa
		WHERE id = '". $id ."';
		";

		return $this->execute($query);
	}
}
