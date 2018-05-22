<!-- monitoring  -->
    <?php  
        include 'config/connection.php';
        $sql = mysqli_query($koneksidb,"SELECT * FROM menu");
        while ($qry = mysqli_fetch_array($sql)) :
    ?>
    <div class="col-md-3">
        <a href="media.php?page=<?php echo $qry['link'] ?>">
            <div class="white-box waves-effect">
                <h3 class="box-title text-center"><i class="<?php echo $qry['icon'] ?> h3"></i> <br> <?php echo $qry['nama_menu'] ?></h3>
            </div>
        </a>
    </div>
    <?php endwhile; ?>