<?php
/**
 * Created by PhpStorm.
 * User: l_mar
 * Date: 04-01-2017
 * Time: 18:36
 */?>
<h2>Estimado/a <?= $user['full_name']?>:</h2>
<p>Se ha creado el nuevo evento, <?=$event->nombre?> que tendra lugar el día <?=$event->fecha_inicio?>.
    Te invitamos a participar de esta grata experiencia.</p>
<p>Puede revisar la descripción completa del evento en el siguiente link <a href="<?=$url?>">EVENTO</a>.</p>
<p>Saluda atte<br>Kenpo Martinez</p>
