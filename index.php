<?php
include 'header.php';
?>
<section class="section">
<div class="venue-showcase is-dark">
  <div class="columns is-multiline">
  <?php 
                  include 'db.php';
                  
                  $sql = "SELECT * FROM posts ORDER BY id DESC";
                  $result = mysqli_query($db, $sql);
                  
                  while ($row = mysqli_fetch_array($result)) {
                  echo ("
                    <div class=\"column is-12-mobile is-6-tablet is-3-desktop\">
                      <div class=\"card is-shadowless is-slightly-rounded\">
                          <div class=\"card-image\">
                            <a href='" . $row['url'] . "'>
                              <figure class=\"image\">
                                <img src='/admin/uploads/".$row['imagename']."' alt='".$row['title']."'>
                              </figure>
                            </a>
                          </div>
                        <div class=\"card-content\">
                          <div class=\"content\">
                            <p>
                              <span class=\"title is-4 is-capitalized\">
                                <a href='" . $row['url'] . "' class=\"has-text-black\">".$row['title']."</a>
                              </span>
                              <br>
                              <span class=\"m-t-tiny block\">".$row['titlelang']."</span>
                            </p>
                            <p class=\"venue-data-sm\">".$row['shortarticle']."</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    ");
                   }
                ?> 
</div>
</div>
</section>
<?php
include 'footer.php';
?>