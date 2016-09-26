<div class="col-md-offset-1">
    <h2><?= h($evento->nombre) ?></h2>
    <div class="col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información General</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($evento->nombre) ?></td>
                </tr>
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
                    <td><?= h($evento->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripción') ?></th>
                    <td><?= h($evento->descripcion) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Ubicación</strong></div>
            <div class="panel-body" id="map">
                <script>
                    $("#map").css("width", 490).css("height", 380);
                    function initMap() {
                        var geocoder = new google.maps.Geocoder();
                        var uluru = {lat: -25.363, lng: 131.044};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 16,
                            center: uluru
                        });
                        geocoder.geocode({'address': <?= json_encode($evento->FullAddress)?>}, function(results, status) {
                            if (status === google.maps.GeocoderStatus.OK) {
                                map.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: results[0].geometry.location
                                });
                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= \Cake\Core\Configure::read('google_maps_key')?>&callback=initMap"></script>
</div>
