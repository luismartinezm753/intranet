<?php
/*
 * Template/Events/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="col-md-offset-1">
    <div class="col-lg-7">
        <h3><?= h($event->title) ?></h3>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                <div class="panel-body"><?= $this->Text->autoParagraph(h($event->details)); ?></div>
                <tr>
                    <th><?= __('Tipo de Evento') ?></th>
                    <td><?= $this->Html->link($event->event_type->name, ['controller' => 'event_types', 'action' => 'view', $event->event_type->id]); ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Inicio') ?></th>
                    <td><?= h($event->start) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Termino') ?></th>
                    <td><?= h($event->end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= h($event->price) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Ubicación</strong></div>
            <div class="panel-body"><?= h($event->FullAddress); ?></div>
            <div id="map" style="height:350px;width:565px"></div>
        </div>
        <?= $this->Html->link(__('Volver'), ['controller'=>'FullCalendar','action' => 'index'],['class'=>'btn btn-primary']) ?>
        <?php if( $this->AuthUser->hasRole('instructor') || $this->AuthUser->hasRole('director')):?>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $event->id],['class'=>'btn btn-primary']) ?>
        <?php endif;?>
    </div>
</div>
<script type="text/javascript">
    function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 14
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
    }
    function geocodeAddress(geocoder, resultsMap) {
        var address = "<?= h($event->FullAddress)?>"
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1jCP7UmkIQtVdLorJ0-tpHlVX-j6skUo&callback=initMap" async defer></script>
