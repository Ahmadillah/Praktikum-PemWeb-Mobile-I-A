<?php
    include 'koneksi.php';
    if (isset($_POST['kirim'])){
        $vote = $_POST['vote'];
        $id = $_POST['id'];
        
        $select_id = mysqli_query($koneksi,"select * from vote where id_user = '$id'");
        $cek_id = mysqli_num_rows($select_id);
        if ($cek_id <= 0){
            $sql = mysqli_query($koneksi,"insert into vote(id_user, pilihan) value ('$id','$vote')");
            if($sql){
                ?>
                <script type="text/javascript">
                    alert("Vote Telah Diterima");
                    window.location.href = "index.html";
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Id telah digunakan");
                window.location.href = "index.html";
            </script>
            <?php
        }
    }
?>


