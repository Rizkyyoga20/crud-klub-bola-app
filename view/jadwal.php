<form method="POST" action="" style="margin-bottom:50px;"> 
<table class="col-md-12 m-1">
    <thead style="font-size:12px;">
        <tr>
            <th valign="top" style="text-align:center; width:50px;">Check</th>
            <th valign="top" style="text-align:center;">Nama Klub 1</th>
            <th valign="top" style="text-align:center; width:40px;">Gol</th>
            <th valign="top" style="text-align:center;">Nama Klub 2</th>
            <th valign="top" style="text-align:center; width:40px;">Gol</th>
            <th valign="top" style="text-align:center;">Tanggal</th>
        </tr>
    </thead>

    <tbody>

            <?php
                include("../model/action.php");
                $klub = new klub();
                $no=1; 
                foreach ($klub->list_jadwal() as $list) {  


            ?>

        <tr>
                <td align="center">
                    <input type="checkbox" name="idp[]" value="<?php echo $list['id_jadwal']; ?>">
                    <input type="hidden" name="idjadwal[]" value="<?php echo $list['id_jadwal']; ?>">
                </td>   
                
                <td>
                    <select name="nama_klub_1[]" required style="width:100%; font-size:14px; margin:1px; padding:3px 10px;">
                        <option value="<?php echo $list['nama_klub_1']; ?>"><?php echo $list['nama_klub_1']; ?></option>
                    </select> 

                </td>

                <td>
					<input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="text" name="gol_klub_1[]" value="<?php echo $list['gol_klub_1']; ?>" required>
                </td>

				<td>
					<select name="nama_klub_2[]" required style="width:100%; font-size:14px; margin:1px; padding:3px 10px;">
						<option value="<?php echo $list['nama_klub_2']; ?>"><?php echo $list['nama_klub_2']; ?></option>
					</select> 
                </td>
                
                <td>
					<input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="text" name="gol_klub_2[]" value="<?php echo $list['gol_klub_2']; ?>" required>
                </td>

                <td style="width:50px;">
					<input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="date" name="tanggal[]" value="<?php echo $list['tanggal']; ?>" required>
                </td>
            
        </tr>

            <?php
                }
            ?>

        <tr>
            <td colspan="6">

                <button type="submit" name="uj" class="btn btn-primary">Update</button>
                <button type="submit" name="dj" class="btn btn-primary">Delete</button>

            </td>
        </tr>
    
    </tbody>
</table>
</form>

