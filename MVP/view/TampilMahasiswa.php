<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampilTabel()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
			<td>
        <a href='index.php?edit_id=" . $this->prosesmahasiswa->getId($i) .  "' class='btn btn-warning''>Edit</a>
        <a href='index.php?hapus=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger''>Hapus</a>
      </td> </tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function tampilCreate(){
		$data = null;

		$data .= "<div class='card'>
          <div class='card-header bg-primary text-white text-center'>
            <h4>FORM INPUT DATA MAHASISWA</h4>
          </div>
          <div class='card-body'>
            <form action='index.php' method='POST'>
              <div class='form-group row'>
                <label for='nim' class='col-sm-3 col-form-label'>NIM</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='nim' name='nim' placeholder='Masukkan NIM' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='nama' class='col-sm-3 col-form-label'>NAMA</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan Nama Lengkap' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='tempat' class='col-sm-3 col-form-label'>TEMPAT</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='tempat' name='tempat' placeholder='Masukkan Tempat Lahir' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='tanggal_lahir' class='col-sm-3 col-form-label'>TANGGAL LAHIR</label>
                <div class='col-sm-9'>
                  <input type='date' class='form-control' id='tanggal_lahir' name='tanggal_lahir' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='gender' class='col-sm-3 col-form-label'>GENDER</label>
                <div class='col-sm-9'>
                  <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' id='laki-laki' value='Laki-laki' required>
                    <label class='form-check-label' for='laki-laki'>Laki-laki</label>
                  </div>
                  <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' id='perempuan' value='Perempuan'>
                    <label class='form-check-label' for='perempuan'>Perempuan</label>
                  </div>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='email' class='col-sm-3 col-form-label'>EMAIL</label>
                <div class='col-sm-9'>
                  <input type='email' class='form-control' id='email' name='email' placeholder='Masukkan Email' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='telp' class='col-sm-3 col-form-label'>TELP</label>
                <div class='col-sm-9'>
                  <input type='tel' class='form-control' id='telp' name='telp' placeholder='Masukkan Nomor Telepon' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <div class='col-sm-12 text-center'>
                  <button class='btn btn-success' type='submit' name='add'>Submit</button><br>
                  <a class='btn btn-info' href='index.php'>Cancel</a><br>
                </div>
              </div>
            </form>
          </div>
        </div>";

		$this->tpl = new Template("templates/skinForm.html");
		$this->tpl->replace("FORM", $data);
		$this->tpl->write();
	}
  function inputCreate($data){
    $this->prosesmahasiswa->inputCreate($data);
  }

  function tampilUpdate($id){

    $data = null;
    $mahasiswa = $this->prosesmahasiswa->prosesDataMahasiswaId($id);
		$data .= "<div class='card'>
          <div class='card-header bg-primary text-white text-center'>
            <h4>FORM INPUT DATA MAHASISWA</h4>
          </div>
          <div class='card-body'>
            <form action='index.php' method='POST'>
              <input type='hidden' name='id' value='". $id ."'>
              <div class='form-group row'>
                <label for='nim' class='col-sm-3 col-form-label'>NIM</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='nim' name='nim' placeholder='Masukkan NIM' value='". $mahasiswa->getNim() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='nama' class='col-sm-3 col-form-label'>NAMA</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='nama' name='nama' placeholder='Masukkan Nama Lengkap' value='". $mahasiswa->getNama() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='tempat' class='col-sm-3 col-form-label'>TEMPAT</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='tempat' name='tempat' placeholder='Masukkan Tempat Lahir' value='". $mahasiswa->getTempat() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='tanggal_lahir' class='col-sm-3 col-form-label'>TANGGAL LAHIR</label>
                <div class='col-sm-9'>
                  <input type='date' class='form-control' id='tanggal_lahir' name='tanggal_lahir' value='". $mahasiswa->getTl() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='gender' class='col-sm-3 col-form-label'>GENDER</label>
                <div class='col-sm-9'>
                  <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' id='laki-laki' value='Laki-laki' " . ($mahasiswa->getGender() == 'Laki-laki' ? 'checked' : '') . " required>
                    <label class='form-check-label' for='laki-laki'>Laki-laki</label>
                  </div>
                  <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='gender' id='perempuan' value='Perempuan' " . ($mahasiswa->getGender() == 'Perempuan' ? 'checked' : '') . ">
                    <label class='form-check-label' for='perempuan'>Perempuan</label>
                  </div>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='email' class='col-sm-3 col-form-label'>EMAIL</label>
                <div class='col-sm-9'>
                  <input type='email' class='form-control' id='email' name='email' placeholder='Masukkan Email' value='". $mahasiswa->getEmail() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <label for='telp' class='col-sm-3 col-form-label'>TELP</label>
                <div class='col-sm-9'>
                  <input type='tel' class='form-control' id='telp' name='telp' placeholder='Masukkan Nomor Telepon' value='". $mahasiswa->getTelp() ."' required>
                </div>
              </div>
              
              <div class='form-group row'>
                <div class='col-sm-12 text-center'>
                  <button class='btn btn-success' type='submit' name='edit'>Submit</button><br>
                  <a class='btn btn-info' href='index.php'>Cancel</a><br>
                </div>
              </div>
            </form>
          </div>
        </div>";
        $this->tpl = new Template("templates/skinForm.html");
        $this->tpl->replace("FORM", $data);
        $this->tpl->write();
  }
  function inputUpdate($data){
    $this->prosesmahasiswa->inputUpdate($data);
  }

  function delete($id){
    $this->prosesmahasiswa->delete($id);
  }

}
