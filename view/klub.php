<form method="POST" action="" style="margin-bottom:50px;"> 
<table class="col-md-12 m-1">
    <thead style="font-size:12px;">
        <tr>
            <th valign="top" style="text-align:center; width:50px;">Check</th>
            <th valign="top" style="text-align:center;">ID Klub</th>
            <th valign="top" style="text-align:center;">Nama Klub</th>
            <th valign="top" style="text-align:center;">Asal Klub</th>
        </tr>
    </thead>

    <tbody>

            <?php
                include("../model/action.php");
                $klub = new klub();
                $no1=1; 
                foreach ($klub->list_klub() as $show) {       

            ?>


        <tr>
                <td align="center">
                    <input type="checkbox" name="id_klub[]" value="<?php echo $show['id_klub']; ?>">
                </td>   
                <td style="width:60px;">
                    <input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="hidden" name="idk[]" value="<?php echo $show['id_klub']; ?>">
                    <input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="text" disabled value="<?php echo $show['id_klub']; ?>">
                </td>    
                <td>
                    <input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="text" id="klub" name="nama_klub[]" placeholder="Nama Klub" required value="<?php echo $show['nama_klub']; ?>">
                </td>
                <td>
                    <input style="width:100%; font-size:14px; margin:1px; padding:3px 10px;" type="text" id="klub"  name="asal_kota[]" placeholder="Asal Kota" required value="<?php echo $show['asal_kota']; ?>">
                </td> 
            
        </tr>

            <?php
                } 

            ?>

        <tr>
            <td colspan="4">

                <button type="submit" name="uk" class="btn btn-primary">Update</button>
                <button type="submit" name="dk" class="btn btn-primary">Delete</button>

            </td>
        </tr>
    
    </tbody>
</table>
</form>

