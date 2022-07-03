<?php
    if(isset($_GET['path']))
        $path = $_GET['path'];
    else
        $path = "uploads/";
?>

<!doctype html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>File Upload</title>
        <script src="script/sortable.js"></script>
        <link rel="icon" type="image/x-icon" href="fei.png">
        <link rel = "stylesheet" href = "css/style.css">
    </head>
<body>

    <h1>File upload</h1>

    <table class="sortable">
        <thead>
            <tr>
                <th>Nazov</th>
                <th>Velkost</th>
                <th>Datum</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (scandir($path) as $file){
                ?>
                <tr>

                    <?php
                        if(is_dir($path.$file)){
                            if(($file == "..") && (realpath($_GET['path']) == "/var/www/site76.webte.fei.stuba.sk/zad1/uploads")) {
                                continue;
                            }
                            if(($file == "..") && (realpath($_GET['path']) == "/var/www/site76.webte.fei.stuba.sk/zad1")) {
                                continue;
                            }
                            echo "<td><a href='?path=$path$file/'>$file</a></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                        }
                        else {
                            echo "<td>$file</td>";
                            echo "<td class='center'>".round(filesize($path.$file) / 1024)." kB"."</td>";
                            echo "<td class='center'>".date("m.d.Y h:i:s", filemtime($path.$file))."</td>";
                        }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <hr>

    <!-- Prevzate od pana Mateja Rabeka -->
    <div class="form">
        <h2>Upload formular</h2>
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <div class="margin">
                <label for="title">Nazov suboru</label>
                <input id="title" name="title" type="text">
            </div>
            <div class="margin">
                <label for="file">Vyberte subor</label>
                <input id="file" name="fileToUpload" type="file">
            </div>
            <button class="margin" type="submit">Upload</button>
        </form>
    </div>

</body>
</html>
