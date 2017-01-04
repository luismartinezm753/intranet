<div class="col-md-offset-1">
    <div class="col-lg-7">
        <h3><?= h($evento->nombre) ?></h3>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <div class="panel-body"><?= $this->Text->autoParagraph(h($evento->descripcion)); ?></div>
                    <tr>
                        <th><?= __('Fecha Inicio') ?></th>
                        <td><?= h($evento->fecha_inicio) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Fecha Termino') ?></th>
                        <td><?= h($evento->fecha_termino) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Precio') ?></th>
                        <td><?= h($evento->fecha_termino) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Ubicación</strong></div>
            <div class="panel-body"><?= h($evento->FullAddress); ?></div>
            <div id="map" style="height:350px;width:565px"></div>
        </div>
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
        var address = "<?= h($evento->FullAddress)?>"
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
