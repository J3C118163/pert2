<?php
    if ($_GET['aksi']=="Edit"){
        echo "<h2>Form Edit</h2>";
		?>
        <form>
            <input type="text" name="nm" value="<?php echo $_GET['nm'] ?>">
            <input type="submit" name="sub" value="Simpan Perubahan">
            <input type="submit" name="sub" value="Kembali ke Tampil Data">
			<input type="hidden" name="aksi" value="Edit">
			<input type="hidden" name="idupdate" value="<?php 
                                                        if (isset($_GET['nimupdate']))
                                                            echo $_GET['nimupdate']; 
                                                        else
                                                            echo $_GET['nim'];
                                                        ?>">
			
		</form>	
		<?php
        if (isset($_GET['sub'])){
            if ($_GET['sub']=="Kembali ke Tampil Data"){
                header("location:01_tampildata.php");
            }
            else {
                if (strlen($_GET['nm'])){
                    if (strlen($_GET['nm'])){
						include "koneksi.php";
						mysqli_query($kon,"UPDATE `mahasiswa` SET `nama` = '".$_GET['nm']."' WHERE `mahasiswa`.`nim` = ".$_GET['idupdate']);
						echo "<br>Nama Baru ".$_GET['nm']." Telah Disimpan";
					}
                }
            }
        }
     }

    else {
        echo "<h2>Konfirmasi Penghapusan Data</h2>";
        ?>
        <form>
            Anda yakin akan menghapus data <b><?php echo $_GET['nm']; ?></b>?
            <input type="submit" name="sub" value="iya">
            <input type="submit" name="sub" value="tidak">
            <input type="hidden" name="nim" value="<?php echo $_GET["nim"]; ?>">
            <input type="hidden" name="aksi" value="<?php echo "Delete"; ?>">
            <input type="hidden" name="nm" value="<?php echo $_GET['nm']; ?>">
        <?php
        if (isset($_GET['sub'])){
          if($_GET['sub']=="tidak"){
            header("location:01_tampildata.php");
            }
          else{
            include "koneksi.php";
            mysqli_query($kon,"DELETE FROM `mahasiswa` WHERE `nim` = ".$_GET['nim']);
            header("location:01_tampildata.php");
          }
        }
     }
?>