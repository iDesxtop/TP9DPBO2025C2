<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi email
				$mahasiswa->setTelp($row['telp']); // mengisi gender

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}
	function prosesDataMahasiswaId($id){
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->getMahasiswaById($id);
        $row = $this->tabelmahasiswa->getResult();
		$student = new Mahasiswa();
		$student->setId($row['id']);
		$student->setNim($row['nim']);
		$student->setNama($row['nama']);
		$student->setTempat($row['tempat']);
		$student->setTl($row['tl']);
		$student->setGender($row['gender']);
		$student->setEmail($row['email']);
		$student->setTelp($row['telp']);
		$this->tabelmahasiswa->close();
        return $student;
	}
	function inputCreate($data){
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->addMahasiswa($data);
		$this->tabelmahasiswa->close();

		header("location:index.php");
	}
	function inputUpdate($data){
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->updateMahasiswa($data);
		$this->tabelmahasiswa->close();

		header("location:index.php");
	}
	function delete($id){
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->delete($id);
		$this->tabelmahasiswa->close();

		header("location:index.php");
	}
	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
	{
		return $this->data[$i]->email;
	}
	function getTelp($i)
	{
		return $this->data[$i]->telp;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
