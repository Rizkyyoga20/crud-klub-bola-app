<?php 	
error_reporting(0);
include('koneksi.php');
class klub extends Database{ 

public function add_klub(){

if(isset($_POST['klub'])){


	$data = "SELECT max(id_klub) as maxKode FROM klub";
	$h = $this->mysqli->query($data);
	$ha = mysqli_fetch_array($h);
	$id = $ha['maxKode'];

	
	$id_klub=$_POST['id_klub'];		
	$nama_klub=$_POST['nama_klub'];		
	$asal_kota=$_POST['asal_kota'];

	$a = COUNT($id_klub);
	$c = COUNT($nama_klub);
	$d = COUNT($asal_kota);

	for($x=0; $x<$a; $x++) for($x=0; $x<$c; $x++) for($x=0; $x<$d; $x++) {


		$data1 = "SELECT * FROM klub";
		$hasil1 = $this->mysqli->query($data1);
					while ($d1 = mysqli_fetch_array($hasil1)){

		if($nama_klub[$x] == $d1['nama_klub'])
			:
		echo "<script>alert('Data gagal disimpan, klub sudah terdaftar');location.href='index.php';</script>";
		exit();
		endif;
		}

		$idd = $id_klub[$x]+$id;

		$save="INSERT INTO klub SET id_klub='$idd',nama_klub='$nama_klub[$x]',asal_kota='$asal_kota[$x]'";
		$hasil=$this->mysqli->query($save);
	}

	if($save)
		:
	echo "<script>alert('Berhasil simpan data klub');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data klub gagal di simpan');location.href='index.php';</script>";
	endif;

	}

}


public function list_klub(){
	$data = "SELECT * FROM klub";
	$hasil = $this->mysqli->query($data);
				while ($d = mysqli_fetch_array($hasil)){
		$result[] = $d;
	}

	if($result)
		:
	return $result;
	else
		:
	echo "List kosong..!!";
	endif;

}

public function poin_klub(){
	$data = "SELECT * FROM klub ORDER BY poin DESC";
	$hasil = $this->mysqli->query($data);
				while ($d = mysqli_fetch_array($hasil)){
		$result[] = $d;
	}

	if($result)
		:
	return $result;
	else
		:
	echo "list kosong..!!";
	endif;
}


public function Update_Klub(){

if(isset($_POST['uk'])){

	$idk=$_POST['idk'];
	$nama_klub=$_POST['nama_klub'];
	$asal_kota=$_POST['asal_kota'];

	$b = COUNT($idk);
	$c = COUNT($nama_klub);
	$d = COUNT($asal_kota);


	for($x=0; $x<$b; $x++) for($x=0; $x<$c; $x++) for($x=0; $x<$d; $x++) {

		$update_data_klub="UPDATE klub SET nama_klub='$nama_klub[$x]',asal_kota='$asal_kota[$x]' WHERE id_klub='$idk[$x]'";
		$hasil=$this->mysqli->query($update_data_klub);
	}


	if($update_data_klub)
		:
	echo "<script>alert('Berhasil update data klub');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data klub gagal di update');location.href='index.php';</script>";
	endif;


	}
}



public function Delete_klub(){

if(isset($_POST['dk'])){

	$id_klub=$_POST['id_klub'];
	$b = COUNT($id_klub);

	for($x=0; $x<$b; $x++) {

		$delete_data_klub="DELETE FROM klub WHERE id_klub='$id_klub[$x]'";
		$hasil=$this->mysqli->query($delete_data_klub);
	}


	if($delete_data_klub)
		:
	echo "<script>alert('Berhasil delete data klub');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data klub gagal di delete, silakan centang checkbok terlebih dahulu jika ingin delete data');location.href='index.php';</script>";
	endif;	



	}

}


public function add_jadwal(){

if(isset($_POST['jadwal'])){

	$data = "SELECT max(id_jadwal) as maxKode FROM jadwal";
	$h = $this->mysqli->query($data);
	$ha = mysqli_fetch_array($h);
	$id = $ha['maxKode'];
	
	$idj=$_POST['idj'];
	$nama_klub_1=$_POST['nama_klub_1'];		
	$nama_klub_2=$_POST['nama_klub_2'];			
	$tanggal=$_POST['tanggal'];		
	$gol=$_POST['gol'];					

	$a = COUNT($nama_klub_1);
	$b = COUNT($nama_klub_2);
	$c = COUNT($tanggal);
	$d = COUNT($gol);
	$e = COUNT($idj);


	for($x=0; $x<$a; $x++) for($x=0; $x<$b; $x++) for($x=0; $x<$c; $x++) for($x=0; $x<$d; $x++) for($x=0; $x<$e; $x++){



		if($nama_klub_1[$x] == $nama_klub_2[$x])
			:
		echo "<script>alert('Data gagal disimpan, nama klub tidak boleh sama');location.href='index.php';</script>";
		exit();
		endif;


		$data1 = "SELECT * FROM jadwal";
		$hasil1 = $this->mysqli->query($data1);
					while ($d1 = mysqli_fetch_array($hasil1)){

		if($nama_klub_1[$x] == $d1['nama_klub_1'] AND $nama_klub_2[$x] == $d1['nama_klub_2'])
			:
		echo "<script>alert('Data gagal disimpan, jadwal sudah pernah dibuat');location.href='index.php';</script>";
		exit();
		endif;
		}


		$idd = $idj[$x]+$id;

		$save_jadwal="INSERT INTO jadwal SET id_jadwal='$idd',nama_klub_1='$nama_klub_1[$x]',nama_klub_2='$nama_klub_2[$x]',gol_klub_1='$gol[$x]',gol_klub_2='$gol[$x]',tanggal='$tanggal[$x]'";
		$hasil=$this->mysqli->query($save_jadwal);

	}

	if($save_jadwal)
		:
	echo "<script>alert('Berhasil simpan data jadwal');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data jadwal gagal di simpan');location.href='index.php';</script>";
	endif;

	}

}


public function list_jadwal(){
	$data1 = "SELECT * FROM jadwal";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){

		$result[] = $d1;

	}

	if($result)
		:
	return $result;
	else
		:
	echo "List kosong..!!";
	endif;
}


public function Update_Jadwal(){

if(isset($_POST['uj'])){


	$idjadwal=$_POST['idjadwal'];
	$nama_klub_1=$_POST['nama_klub_1'];		
	$nama_klub_2=$_POST['nama_klub_2'];	
	$gol_klub_1=$_POST['gol_klub_1'];		
	$gol_klub_2=$_POST['gol_klub_2'];			
	$tanggal=$_POST['tanggal'];						

	$a = COUNT($idjadwal);
	$b = COUNT($nama_klub_1);
	$c = COUNT($nama_klub_2);	
	$d = COUNT($gol_klub_1);
	$e = COUNT($gol_klub_2);
	$f = COUNT($tanggal);



	for($x=0; $x<$a; $x++) for($x=0; $x<$b; $x++) for($x=0; $x<$c; $x++) for($x=0; $x<$d; $x++) for($x=0; $x<$e; $x++) for($x=0; $x<$f; $x++){



		if($nama_klub_1[$x] == $nama_klub_2[$x])
			:
		echo "<script>alert('Data gagal disimpan, nama klub tidak boleh sama');location.href='index.php';</script>";
		exit();
		endif;



		$update_data_jadwal="UPDATE jadwal SET nama_klub_1='$nama_klub_1[$x]',nama_klub_2='$nama_klub_2[$x]',gol_klub_1='$gol_klub_1[$x]',gol_klub_2='$gol_klub_2[$x]',tanggal='$tanggal[$x]' WHERE id_jadwal='$idjadwal[$x]'";
		$hasil=$this->mysqli->query($update_data_jadwal);

	}

	if($update_data_jadwal)
		:
	echo "<script>alert('Berhasil update data jadwal');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data jadwal gagal di update');location.href='index.php';</script>";
	endif;

	}


}


public function Delete_Jadwal(){

if(isset($_POST['dj'])){

	$idp=$_POST['idp'];
	$b = COUNT($idp);

	for($x=0; $x<$b; $x++) {

		$delete_data_jadwal="DELETE FROM jadwal WHERE id_jadwal='$idp[$x]'";
		$hasil=$this->mysqli->query($delete_data_jadwal);
	}


	if($delete_data_jadwal)
		:
	echo "<script>alert('Berhasil delete data jadwal');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Data jadwal gagal di delete, silakan centang checkbok terlebih dahulu jika ingin delete data');location.href='index.php';</script>";
	endif;	



	}

}


public function jumlah_main($nama_klub){

	$data1 = "SELECT count(nama_klub_1) FROM jadwal WHERE nama_klub_1='$nama_klub'";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$m=$d1['count(nama_klub_1)'];
				$main1[]=$m;

	}

	$data2 = "SELECT count(nama_klub_2) FROM jadwal WHERE nama_klub_2='$nama_klub'";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$m=$d2['count(nama_klub_2)'];
				$main2[]=$m;

	}


	$data3 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 = '-'";
	$hasil3 = $this->mysqli->query($data3);
				while ($d3 = mysqli_fetch_array($hasil3)){
				$b=$d3['count(nama_klub_1)'];
				$belum1[]=$b;

	}

	$data4 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_2 = '-'";
	$hasil4 = $this->mysqli->query($data4);
				while ($d4 = mysqli_fetch_array($hasil4)){
				$b=$d4['count(nama_klub_2)'];
				$belum2[]=$b;

	}


	$m1 = array_sum($main1);
	$m2 = array_sum($main2);
	$b1 = array_sum($belum1);
	$b2 = array_sum($belum2);
	$total = ($m1+$m2)-($b1+$b2);

	echo $total;

}

public function jumlah_menang($nama_klub){

	$data1 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 > gol_klub_2";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$m=$d1['count(nama_klub_1)'];
				$menang1[]=$m;

	}

	$data2 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_1 < gol_klub_2";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$m=$d2['count(nama_klub_2)'];
				$menang2[]=$m;

	}

	$m1 = array_sum($menang1);
	$m2 = array_sum($menang2);
	$total = $m1+$m2;
	echo $total;

}

public function jumlah_kalah($nama_klub){

	$data1 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 < gol_klub_2";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$k=$d1['count(nama_klub_1)'];
				$kalah1[]=$k;

	}

	$data2 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_1 > gol_klub_2";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$k=$d2['count(nama_klub_2)'];
				$kalah2[]=$k;

	}

	$k1 = array_sum($kalah1);
	$k2 = array_sum($kalah2);
	$total = $k1+$k2;
	echo $total;

}


public function jumlah_seri($nama_klub){

	$data1 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 = gol_klub_2";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$s=$d1['count(nama_klub_1)'];
				$seri1[]=$s;

	}

	$data2 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_1 = gol_klub_2";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$s=$d2['count(nama_klub_2)'];
				$seri2[]=$s;

	}

	$data3 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 = '-'";
	$hasil3 = $this->mysqli->query($data3);
				while ($d3 = mysqli_fetch_array($hasil3)){
				$b=$d3['count(nama_klub_1)'];
				$belum1[]=$b;

	}

	$data4 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_2 = '-'";
	$hasil4 = $this->mysqli->query($data4);
				while ($d4 = mysqli_fetch_array($hasil4)){
				$b=$d4['count(nama_klub_2)'];
				$belum2[]=$b;

	}

	$s1 = array_sum($seri1);
	$s2 = array_sum($seri2);
	$b1 = array_sum($belum1);
	$b2 = array_sum($belum2);
	$total = ($s1+$s2)-($b1+$b2);

	echo $total;

}


public function jumlah_gol($nama_klub){

	$data1 = "SELECT sum(gol_klub_1) FROM jadwal WHERE nama_klub_1='$nama_klub'";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$g=$d1['sum(gol_klub_1)'];
				$gol1[]=$g;

	}

	$data2 = "SELECT sum(gol_klub_2) FROM jadwal WHERE nama_klub_2='$nama_klub'";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$g=$d2['sum(gol_klub_2)'];
				$gol2[]=$g;

	}

	$g1 = array_sum($gol1);
	$g2 = array_sum($gol2);
	$total = $g1+$g2;

	echo $total;

}

public function jumlah_kebobolan($nama_klub){

	$data1 = "SELECT sum(gol_klub_2) FROM jadwal WHERE nama_klub_1='$nama_klub'";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$k=$d1['sum(gol_klub_2)'];
				$kebobolan1[]=$k;

	}

	$data2 = "SELECT sum(gol_klub_1) FROM jadwal WHERE nama_klub_2='$nama_klub'";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$k=$d2['sum(gol_klub_1)'];
				$kebobolan2[]=$k;

	}

	$k1 = array_sum($kebobolan1);
	$k2 = array_sum($kebobolan2);
	$total = $k1+$k2;

	echo $total;

}

public function Produktifitas($nama_klub){

	$data1 = "SELECT sum(gol_klub_1) FROM jadwal WHERE nama_klub_1='$nama_klub'";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$g=$d1['sum(gol_klub_1)'];
				$gol1[]=$g;

	}

	$data2 = "SELECT sum(gol_klub_2) FROM jadwal WHERE nama_klub_2='$nama_klub'";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$g=$d2['sum(gol_klub_2)'];
				$gol2[]=$g;

	}


	$data3 = "SELECT sum(gol_klub_2) FROM jadwal WHERE nama_klub_1='$nama_klub'";
	$hasil3 = $this->mysqli->query($data3);
				while ($d1 = mysqli_fetch_array($hasil3)){
				$k=$d1['sum(gol_klub_2)'];
				$kebobolan1[]=$k;

	}

	$data4 = "SELECT sum(gol_klub_1) FROM jadwal WHERE nama_klub_2='$nama_klub'";
	$hasil4 = $this->mysqli->query($data4);
				while ($d2 = mysqli_fetch_array($hasil4)){
				$k=$d2['sum(gol_klub_1)'];
				$kebobolan2[]=$k;

	}

	$g1 = array_sum($gol1);
	$g2 = array_sum($gol2);
	$k1 = array_sum($kebobolan1);
	$k2 = array_sum($kebobolan2);

	$total = ($g1+$g2)-($k1+$k2);

	echo $total;
}


public function jumlah_poin($nama_klub){

	$data1 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 > gol_klub_2";
	$hasil1 = $this->mysqli->query($data1);
				while ($d1 = mysqli_fetch_array($hasil1)){
				$m=$d1['count(nama_klub_1)'];
				$menang1[]=$m;

	}

	$data2 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_1 < gol_klub_2";
	$hasil2 = $this->mysqli->query($data2);
				while ($d2 = mysqli_fetch_array($hasil2)){
				$m=$d2['count(nama_klub_2)'];
				$menang2[]=$m;

	}

	$data3 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 = gol_klub_2";
	$hasil3 = $this->mysqli->query($data3);
				while ($d1 = mysqli_fetch_array($hasil3)){
				$s=$d1['count(nama_klub_1)'];
				$seri1[]=$s;

	}

	$data4 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_1 = gol_klub_2";
	$hasil4 = $this->mysqli->query($data4);
				while ($d2 = mysqli_fetch_array($hasil4)){
				$s=$d2['count(nama_klub_2)'];
				$seri2[]=$s;

	}

	$data5 = "SELECT count(nama_klub_1),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_1='$nama_klub' AND gol_klub_1 = '-'";
	$hasil5 = $this->mysqli->query($data5);
				while ($d3 = mysqli_fetch_array($hasil5)){
				$b=$d3['count(nama_klub_1)'];
				$belum1[]=$b;

	}

	$data6 = "SELECT count(nama_klub_2),gol_klub_1,gol_klub_2 FROM jadwal WHERE nama_klub_2='$nama_klub' AND gol_klub_2 = '-'";
	$hasil6 = $this->mysqli->query($data6);
				while ($d4 = mysqli_fetch_array($hasil6)){
				$b=$d4['count(nama_klub_2)'];
				$belum2[]=$b;

	}


	$m1 = array_sum($menang1);
	$m2 = array_sum($menang2);
	$s1 = array_sum($seri1);
	$s2 = array_sum($seri2);
	$b1 = array_sum($belum1);
	$b2 = array_sum($belum2);
	$total = (($m1+$m2)*3)+($s1+$s2)-($b1+$b2);

	echo $total;



}


public function update_klasmen(){

if(isset($_POST['p'])){

	$id=$_POST['id'];
	$poin=$_POST['poin'];

	$b = COUNT($id);
	$c = COUNT($poin);


	for($x=0; $x<$b; $x++) for($x=0; $x<$c; $x++) {

		$update_poin="UPDATE klub SET poin='$poin[$x]' WHERE id_klub='$id[$x]'";
		$hasil=$this->mysqli->query($update_poin);
	}


	if($update_poin)
		:
	echo "<script>alert('Berhasil update klasmen');location.href='index.php';</script>";
	else
		:
	echo "<script>alert('Gagal update klasmen');location.href='index.php';</script>";
	endif;


	}

}


}


?>