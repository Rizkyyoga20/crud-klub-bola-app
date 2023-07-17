<form action="" method="POST">
<p>Klasmen Sementara !!</p>
<table class="col-md-12 m-1" border="1">
    <thead style="font-size:12px;">
        <tr>
            <th valign="top" style="text-align:center;">No</th>
            <th valign="top" style="text-align:center;">Nama Klub</th>
            <th valign="top" style="text-align:center;">Main</th>
            <th valign="top" style="text-align:center;">Menang</th>
            <th valign="top" style="text-align:center;">Kalah</th>
            <th valign="top" style="text-align:center;">Seri</th>
            <th valign="top" style="text-align:center;">Gol</th>
            <th valign="top" style="text-align:center;">Kemasukan</th>
            <th valign="top" style="text-align:center;">Produktifitas</th>
            <th valign="top" style="text-align:center;">Poin</th>
        </tr>
    </thead>

    <tbody>
            <?php
                include("../model/action.php");
                $klub = new klub();
                $no=1; 
                foreach ($klub->poin_klub() as $show) {       

            ?>


        <tr>
                <td valign="top"><?php echo $no++; ?></td>   
                <td valign="top"><?php echo $show['nama_klub']; ?></td>   
                <td valign="top" align="center"><?php $jum_main = $klub->jumlah_main($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_menang = $klub->jumlah_menang($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_kalah = $klub->jumlah_kalah($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_seri = $klub->jumlah_seri($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_gol = $klub->jumlah_gol($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_kebobolan = $klub->jumlah_kebobolan($show['nama_klub']); ?></td>    
                <td valign="top" align="center"><?php $jum_kebobolan = $klub->Produktifitas($show['nama_klub']); ?></td>    
                <td valign="top" align="center">
                	<?php echo $show['poin']; ?>
                	<input type="hidden" name="id[]" value="<?php echo $show['id_klub']; ?>">
                	<input type="hidden" name="poin[]" value="<?php $poin = $klub->jumlah_poin($show['nama_klub']); ?>">
                </td>    
        </tr>


            <?php
                } 

            ?>
    	<tr>
    		<td colspan="10">
    			<h5 style="font-size:12px;">Note: Silakan update klasmen jika melakukan update jadwal tanding..!!</h5>
    			<button type="submit" name="p" class="btn btn-primary" style="float:right; font-size:12px; padding:3px; border-radius:0px;">Update Klasmen</button>
    		</td>
    	</tr>
    </tbody>
</table>
</form>

