<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 19-06-2016
 * Time: 16:56
 */
?>

<h2>Estimado/a <?= $user['full_name']?>:</h2>
<p>Te damos la bienvenida a Kenpo Martinez, para poder activar tu cuenta en la intranet haz click en el siguiente link </p>
<p><strong>Usuario:</strong> <?=$user['username']?></p>
<a href="<?= $url ?>">INTRANET</a>
<p>Saluda atte<br>Kenpo Martinez</p>
