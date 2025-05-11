# Janji
Saya Muhammad Alvinza dengan NIM 2304879 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.  

## Desain Program
![image](https://github.com/user-attachments/assets/97158241-cb0b-4c67-ab0f-8b04bb761bd5)
Program ini dirancang dengan struktur MVP (Model View Presenter) untuk dapat melakukan CRUD (Create Read Update Delete) terhadap database bertemakan Mahasiswa.  

### MVC (Model View Presenter)
Desain dibagi menjadi 3, Model untuk koneksi ke database, View untuk manipulasi tampilan GUI website, dan Presenter yang menghubungkan Model dengan View.  

## Alur Program
Alur dibagi menjadi 4, Create, Read, Update, Delete.  

### Read
Kita dapat menampilkan seluruh data mahasiswa pada index.  
![image](https://github.com/user-attachments/assets/05bbe58b-e16b-44a8-b6c1-8ab95fa7dd24)  
Alur:  
Routing oleh index.php -> Tampil Tabel oleh View TampilMahasiswa.php yang menampilkan tabel dan template -> Data dari prosesDataMahasiswa oleh Presenter ProsesMahasiswa.php untuk mengset data dari model class Mahasiswa  
Kita dapat melakukan Add, Update, dan Delete pada laman ini.  

### Create (Add)
Kita dapat menambahkan data dengan fitur add ini. Dengan mengklik "Add". Data akan tersimpan pada database.  
![image](https://github.com/user-attachments/assets/9edb504e-4887-4690-bf6c-818c099c16b6)
Routing oleh index.php -> Tampilkan form oleh View -> Menerima Routing POST oleh index.php -> Menerima data dari index.php oleh View -> Menerima data dari View oleh Presenter -> Membuat query berdasarkan data oleh Model yang didapat dari presenter. Return ke index.php  

### Update
Kita dapat mengupdate Data dengan mengklik tombol "Update" pada suatu baris. Ketika kita selesai mengisi kolom dan mengupdatenya, data akan langsung diubah pada database.    
![image](https://github.com/user-attachments/assets/cd9514ea-6383-492a-94bf-1dd3cc5acfe0)
Routing oleh index.php -> tampilkan form oleh View, yang mengambil data terlebih dahulu dari id ke Presenter, yang diambil dari model -> Menerima routing POST oleh index.php -> menerima data dari index.php oleh View ->  Menerima data dari View oleh Presenter -> Membuat query berdasarkan data oleh Model yang didapat dari presenter. Return ke index.php  


### Delete
Ketika kita tidak membutuhkan data suatu baris, kita dapat menghapusnya dengan tombol "Delete". Data akan terhapus dari database. 

