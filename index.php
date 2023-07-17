<!DOCTYPE html>
<html>
<head>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <script src="controller/jquery.min.js"></script>
    <link rel="stylesheet" href="controller/bootstrap.min.css" />

    <link rel="icon" type="text/css" href="img/logo-produk.png">
    <title>Klub Liga 1 Indonesia</title>
</head>


 <?php 
  error_reporting(0);
  include("model/action.php");
  $klub = new klub();
  $add_klub = $klub->add_klub();
  $add_jadwal = $klub->add_jadwal();
  $update_klub = $klub->Update_Klub();
  $delete_klub = $klub->Delete_Klub();  
  $update_jadwal = $klub->Update_Jadwal();
  $delete_jadwal = $klub->Delete_Jadwal(); 
  $poinn = $klub->update_klasmen(); 
 ?>

<body style="background:#c0f0c0;">


<div class="container">
    <div class="row" style="margin-top:50px;">
        <div class="col-md-4">
            <h3>Entri data klub liga indonesia</h3>
            <p style="text-align:justify;">Aplikasi ini dibuat dengan bahasa pemrograman berbasis web yaitu, dengan menggunakan HTML, CSS, Javascript, dan php my sql, serta dengan teknologi jquery ajax, bootstrap. Aplikasi ini digunakan untuk entri data klub, update hasil perandingan serta update klasmen sementara.</p>
        </div>
        <div class="col-md-8">
            <h5 align="center">Tabel Kelasmen</h5>
                <div id="table_klasmen"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <form method="POST" action="" style="margin-bottom:50px;">
                <h5>Add Klub</h5>
                <div id="klub"></div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="klub" class="btn btn-primary">Save</button>
                        <button type="button" id="newklub" class="btn btn-primary"> + Klub</button>
                    </div>
                </div>                
            </form>
        </div>

        <div class="col-md-6">
            <h5 align="center">Daftar Klub</h5>
                <div id="table_klub"></div>
        </div>
    </div>

    <div class="row">

            <div class="col-md-4">
                <form method="POST" action="" style="margin-bottom:50px;">
                <h5>Add Jadwal</h5>
                <div id="jadwal"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" name="jadwal" class="btn btn-primary">Save</button>
                            <button type="button" id="newjadwal" class="btn btn-primary">Buat Jadwal</button>
                        </div>
                    </div>                
                </form>
            </div>

            <div class="col-md-8">
                <h5 align="center">Jadwal Tanding</h5>
                    <div id="table_jadwal"></div>
            </div> 

    </div>

</div>



<script>
$(document).ready(function(){

    let klub = 1 ;
    let jadwal = 1 ;

    $('#newklub').click(function(){
        
        let newklub = klub++;

        let html_klub = '<div class="mb-1 mt-2"><button id="cencel_klub"class="btn btn-primary" style="float:right; margin-bottom:5px; font-size:10px;">Batal</button><input type="text" class="form-control mb-1" name="nama_klub[]" required="" value="" placeholder="Nama Klub" required><input type="text" class="form-control mb-1" name="asal_kota[]" required="" value="" placeholder="Asal Klub" required></div><input type="hidden" value="'+newklub+'" name="id_klub[]">';

            $('#klub').append(html_klub);    

    });


    $('#newjadwal').click(function(){
        let newjadwal = jadwal++;

        let html_jadwal = '<div class="mb-1 mt-2"><button id="cencel_jadwal"class="btn btn-primary" style="float:right; margin-bottom:5px; font-size:10px;">Batal</button><select class="form-control mb-1" name="nama_klub_1[]" required=""><option value="">-- Pilih --</option><?php $no1=1; foreach ($klub->list_klub() as $show) {  ?><option value="<?php echo $show['nama_klub']; ?>"><?php echo $show['nama_klub']; ?></option><?php } ?></select> <select class="form-control mb-1" name="nama_klub_2[]" required=""><option value="">-- Pilih --</option><?php $no1=1; foreach ($klub->list_klub() as $show) {  ?><option value="<?php echo $show['nama_klub']; ?>"><?php echo $show['nama_klub']; ?></option><?php } ?></select><input type="date" name="tanggal[]" required class="form-control mb-1"><input type="hidden" value="'+newjadwal+'" name="idj[]"><input type="hidden" value="-" name="gol[]"></div>';

            $('#jadwal').append(html_jadwal);    

    });



$(document).on("click","#cencel_klub", function(e){
    if( klub > 1 ){
        $(this).parent('div').remove();
        klub--;
    }
});

$(document).on("click","#cencel_jadwal", function(e){
    if( jadwal > 1 ){
        $(this).parent('div').remove();
        jadwal--;
    }
});

    showKlub();
    showKlasmen();
    showJadwal();

 
});



function showKlub(){
    $.ajax({
        type: 'GET',
        url: 'view/klub.php',
        success: function(data) {
            $('#table_klub').html(data);
        }
    });
}

function showJadwal(){
    $.ajax({
        type: 'GET',
        url: 'view/jadwal.php',
        success: function(data) {
            $('#table_jadwal').html(data);
        }
    });
}

function showKlasmen(){
    $.ajax({
        type: 'GET',
        url: 'view/klasmen.php',
        success: function(data) {
            $('#table_klasmen').html(data);
        }
    });
}

</script>



</body>
</html>
