
<?php
      
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = "1773558017:AAEWFgqw0PD3xDx9BM8TmxzuGijVOXDnBpk";
    $chat_id = "-529726884";

    if (!empty($_POST['title']) && !empty($_POST['shortarticle'])){
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $urlForPhoto = $bot_url . "sendPhoto?chat_id=" . $chat_id;

        if(!empty($_FILES['file']['tmp_name'])) {

            // Путь загрузки файлов
            $path = $_SERVER['DOCUMENT_ROOT'] . '/admin/uploads/';

            // Массив допустимых значений типа файла
            $types = array('image/gif', 'image/png', 'image/jpeg');

            // Максимальный размер файла
            $size = 1024000;

            // Проверяем тип файла
             if (!in_array($_FILES['file']['type'], $types)) {
                 $msgs['err'] = 'Запрещённый тип файла.';
                echo json_encode($msgs);
                die();
             }

             // Проверяем размер файла
             if ($_FILES['file']['size'] > $size) {
                 $msgs['err'] = 'Слишком большой размер файла.';
                echo json_encode($msgs);
                die('Слишком большой размер файла.');
             }

             // Загрузка файла и вывод сообщения
             if (!@copy($_FILES['file']['tmp_name'], $path . $_FILES['file']['name'])) {
                 $msgs['err'] = 'Что-то пошло не так. Файл не отправлен!';
                 echo json_encode($msgs);
             } else {
                $filePath = $path . $_FILES['file']['name'];
                $post_fields = array('chat_id' => $chat_id, 'photo' => new CURLFile(realpath($filePath)) );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type:multipart/form-data" ));
                curl_setopt($ch, CURLOPT_URL, $urlForPhoto);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
                $output = curl_exec($ch);
                unlink($filePath);
             }
        }
        $a = random_int(1, 10000);

        $bt = 'https://php.solusone.info/post.php?' . $urlt;
        $ct = $bt . $a;
        $urlt = $ct;

        if (isset($_POST['urlt'])) {
          if (!empty($_POST['urlt'])){
            $urlt = "Url: " . strip_tags($_POST['urlt']) . "%0A";
          }
        }

        if (isset($_POST['title'])) {
          if (!empty($_POST['title'])){
            $title = "Title: " . strip_tags($_POST['title']) . "%0A";
          }
        }

        if (isset($_POST['shortarticle'])) {
          if (!empty($_POST['shortarticle'])){
            $shortarticle = "Short Article: " . strip_tags($_POST['shortarticle']) . "%0A";
          }
        }
        // Формируем текст сообщения
        $txt =  $title . $shortarticle . $urlt;

        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        if ($output && $sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
          return true;
        } else {
            $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
            echo json_encode($msgs);
            die('Ошибка. Сообщение не отправлено!');
        }

    } else {
        $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
        echo json_encode($msgs);;
    }
} else {
  header ("Location: /");
}




        $servername     = "localhost";
        $username = "sasha_bot";
        $password = "I0g9P0m0";
        $db     = "user20145191_sasha";
        
        // $url = $_POST['url'];
        $title = $_POST['title'];
        $titlelang = $_POST['titlelang'];
        $shortarticle = $_POST['shortarticle'];
        $article = $_POST['article'];


        // $razreshenniye_simvoli = 'abcdefghijklmnopqrstuvwxyz';
        // $a = substr(str_shuffle($razreshenniye_simvoli), 0, 15);
        // $a = random_int(1, 10000);

        $b = 'post.php?' . $url;
        $c = $b . $a;
        $url = $c;

        $current_path = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
        $new_path = dirname(__FILE__) . '/uploads/' . $filename;

        $imagename = $filename;

        move_uploaded_file($current_path, $new_path);

        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        } else{
            echo "Сonnected!";
        }
        $sql = "INSERT INTO posts (url, title, titlelang, shortarticle, article, imagename, file) VALUES ('$url', '$title', '$titlelang', '$shortarticle', '$article', '$imagename', '$new_path')";
        if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
        header ("Location: /");
        mysqli_close($conn);
        ?>
