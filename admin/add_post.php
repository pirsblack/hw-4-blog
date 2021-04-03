<?php 
	include '../header.php';
?>

<div class="container is-max-desktop my-3">
    <div class="box">
      <form method="POST" action="/admin/upload.php"  enctype="multipart/form-data">
        <h1 class="contact-form__title has-text-white">Add Posts BD and TELEGRAM</h1>
        <p class="contact-form__message"></p>
          <div class="field">
            <label class="label has-text-white">Title:</label>
              <div class="control has-icons-left">
                <input class="input" type="text" name="title" placeholder="title">
                <span class="icon is-left">
                  <i class="fas fa-newspaper"></i>
                </span>
              </div>
          </div>
          <div class="field">
            <label class="label has-text-white"> Title in another language:</label>
              <div class="control has-icons-left">
                <input class="input" type="text" name="titlelang" placeholder="title language">
                <span class="icon is-left">
                  <i class="far fa-newspaper"></i>
                </span>
              </div>
          </div>
          <div class="field">
            <label class="label has-text-white">Short article: <span class="tag is-light">ограничение 220 символов</span></label>
              <div id="short-article-loading" class="control">
                <textarea class="textarea" type="text" name="shortarticle" onkeyup='charLimit(this, 220);' placeholder="short article"></textarea>
              </div>
          </div>
          <div class="field">
            <label class="label has-text-white">Article:</label>
              <div id="article-loading" class="control">
                <textarea class="textarea" type="text" name="article" placeholder="article"></textarea>
              </div>
          </div>
          <div id="file-js-example" class="file has-name is-white my-3">
                <label class="file-label">
                    <input class="file-input" type="file" name="file" id="contact-form__input_file" >
                    <span class="file-cta is-radiusless">
                        <span class="file-icon">
                        <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label has-text-black">
                            Choose a file…
                        </span>
                    </span>
                    <span class="file-name has-text-white">
                                No file uploaded
                    </span>
                </label>
            </div>
            <div class="field has-addons">
                <div class="control">
                    <button class="button is-white is-radiusless " onclick="loading(this)" type="submit" name="button">
                            <span class="icon is-small">
                              <i class="fas fa-check"></i>
                          </span>
                        <span>Submit</span>
                    </button>
                </div>
            </div>
            
            <script>
              const fileInput = document.querySelector('#file-js-example input[type=file]');
                fileInput.onchange = () => {
                if (fileInput.files.length > 0) {
                  const fileName = document.querySelector('#file-js-example .file-name');
                  fileName.textContent = fileInput.files[0].name;
                }
              }
            </script>
            <script src="../js/is-loading.js"></script>
            <div class="notification">
               Ссылка на telegram channel <a target="_blank" href="https://t.me/joinchat/9OYYQu4RX8NmZmIy">(link)</a>. В telegram выводятся: file, title, short article, link post.
            </div>
      </form>
    </div>
</div>
</div>


    <?php
    	include '../footer.php';
    ?>