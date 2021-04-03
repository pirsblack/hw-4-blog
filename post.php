<?php 
  include 'header.php';
?>
<div class="container">
  <div class="section">
    <div class="box">
    <?php

      include "db.php";

      $current_url = substr($_SERVER['REQUEST_URI'], 1);
      $base_url = basename($current_url);

      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }else {
        $sql = 'SELECT * FROM posts WHERE url = "' . $base_url . '"';
        
        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_array($result)) {
          echo("
                <div class=\"media\">
                  <figure class=\"image\">
                    <img class=\"media-left\" src='/admin/uploads/" .$row['imagename'] . "' alt='".$row['title']."'>
                  </figure>
                </div>
                <div class=\"meida-content\">
                  <div class=\"content\">
                    <h1 class=\"is-size-3 mt-3 has-text-white\">
                      ".$row['title'] ."
                    </h1>
                    <h2 class=\"is-size-6 has-text-white\">
                      ".$row['titlelang'] ."
                    </h2>
                    <div class=\"box box-color\">  
                      <p>
                       ".$row['article'] ."
                      </p>
                    </div>
                  </div>
                </div>
            ");
        }
      }

    ?>
    </div>
  </div>
</div>
<?php 
  include 'footer.php';
?>
