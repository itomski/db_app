<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<body>
    <main class="container">
    <?php
    $reqMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    if($reqMethod === 'POST') {
        if(filter_has_var(INPUT_POST, 'csrf_token')) {
            $token = $_POST['csrf_token'];
            $sess_token = $_SESSION['csrf_token'] ?? '';

            if($token !== $sess_token) {
                //header($_SERVER['SERVER_PROTOCOL'].' 405 Not allowed');
                echo $_SERVER['SERVER_PROTOCOL'].' 405 Not allowed';
            }
            else {
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
            }
        }
        else {
            //header($_SERVER['SERVER_PROTOCOL'].' 405 Not allowed');
            echo $_SERVER['SERVER_PROTOCOL'].' 405 Not allowed';
        }
    }
    elseif($reqMethod === 'GET') {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(35));
        ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <div>
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="msg">Nachricht</label>
                <textarea name="msg" id="msg" required></textarea>
            </div>
            <button type="submit">Senden</button>
        </form>
        <?php
    }
    ?>  
    </main>
</body>
</html>


