<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView{
	public function tampilTabel();
	public function tampilCreate();
	public function inputCreate($data);
	public function tampilUpdate($id);
	public function inputUpdate($data);

}
?>