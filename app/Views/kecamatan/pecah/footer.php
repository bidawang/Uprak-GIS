 <!-- Include Required Scripts -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Custom Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Deklarasi var
            var view = <?= json_encode($view[0]); ?>;
            var map = L.map('map').setView([view.lat, view.lng], view.zoom);

            // Dasar
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Gambar
            <?php foreach ($bengkel as $data): ?>
                var customIcon = L.icon({
                    iconUrl: 'data:image/png;base64,<?= base64_encode($data['pentolan']) ?>',
                    iconSize: [32, 32],
                    iconAnchor: [16, 32],
                    popupAnchor: [0, -32]
                });

                // Add marker
                var marker = L.marker([<?= $data['latitude'] ?>, <?= $data['longitude'] ?>], { icon: customIcon })
                    .addTo(map)
                    .bindPopup(`
        <div class="popup-content">
            <b><?= htmlspecialchars($data['nama_bengkel'], ENT_QUOTES) ?></b><br>
            <?php if (!empty($data['gambar'])): ?>
                <img src="data:image/png;base64,<?= base64_encode($data['gambar']) ?>" alt="Gambar Bengkel" style="max-width: 100%; height: auto;"><br><br>
            <?php endif; ?>
                            <?php if(session()->get('username')): ?>
            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data['id'] ?>">Delete</button>
            <button type="button" class="btn btn-warning btn-sm edit-btn"
                data-toggle="modal" data-target="#modalEdit"
                onclick="populateEditModal('<?= $data['id'] ?>', '<?= htmlspecialchars($data['nama_bengkel'], ENT_QUOTES) ?>', '<?= $data['latitude'] ?>', '<?= $data['longitude'] ?>', '<?= htmlspecialchars(json_encode(json_decode($data['polygon_geojson'])), ENT_QUOTES) ?>', '<?= $data['warna'] ?>', '<?= htmlspecialchars($data['keterangan'], ENT_QUOTES) ?>')"
            >Edit</button><br>
            <?php endif;?>
            <?= htmlspecialchars($data['keterangan'], ENT_QUOTES) ?>
        </div>
    `);

                // Add polygon if exists
                <?php if (!empty($data['polygon_geojson'])): ?>
                    var polygonGeojson = <?= $data['polygon_geojson'] ?>;
                    var polygon;
                    try {
                        polygon = L.geoJSON(polygonGeojson, {
                            style: { color: '<?= $data['warna'] ?>' }
                        }).addTo(map);

                        // Bind the same popup content to the polygon
                        polygon.bindPopup(`
                <div class="popup-content">
                    <b><?= htmlspecialchars($data['nama_bengkel'], ENT_QUOTES) ?></b><br>
                    <?php if (!empty($data['gambar'])): ?>
                <img src="data:image/png;base64,<?= base64_encode($data['gambar']) ?>" alt="Gambar Bengkel" style="max-width: 100%; height: auto;"><br><br>
            <?php endif; ?>
                            <?php if(session()->get('username')): ?>
            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data['id'] ?>">Delete</button>
            <button type="button" class="btn btn-warning btn-sm edit-btn"
                data-toggle="modal" data-target="#modalEdit"
                onclick="populateEditModal('<?= $data['id'] ?>', '<?= htmlspecialchars($data['nama_bengkel'], ENT_QUOTES) ?>', '<?= $data['latitude'] ?>', '<?= $data['longitude'] ?>', '<?= htmlspecialchars(json_encode(json_decode($data['polygon_geojson'])), ENT_QUOTES) ?>', '<?= $data['warna'] ?>', '<?= htmlspecialchars($data['keterangan'], ENT_QUOTES) ?>')"
            >Edit</button><br>
            <?php endif;?>
                    <?= htmlspecialchars($data['keterangan'], ENT_QUOTES) ?>
                </div>
            `);
                    } catch (error) {
                        console.error('Error parsing polygonGeojson:', error);
                    }
                <?php endif; ?>

            <?php endforeach; ?>

            // Function to pan to a marker when a workshop name link is clicked
            window.panToMarker = function(lat, lng) {
                map.panTo(new L.LatLng(lat, lng));
            };

            // Event listener to handle deletion
            map.on('popupopen', function(e) {
                document.querySelectorAll('.delete-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var id = btn.getAttribute('data-id');
                        if (confirm('Are you sure you want to delete this data?')) {
                            window.location.href = '/kecamatan/delete/' + id;
                        }
                    });
                });
            });

            // Handle window resize to adjust map size
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });
        });

        function populateEditModal(id, nama, latitude, longitude, polygon_geojson, warna, keterangan) {
            // Isi form edit dengan data yang sesuai
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama_bengkel').value = nama;
            document.getElementById('edit_latitude').value = latitude;
            document.getElementById('edit_longitude').value = longitude;
            document.getElementById('edit_warna').value = warna;
            document.getElementById('edit_keterangan').value = keterangan;

            // Handle polygon_geojson
            try {
                var parsedGeoJson = JSON.parse(polygon_geojson);
                document.getElementById('edit_polygon_geojson').value = JSON.stringify(parsedGeoJson);
            } catch (error) {
                console.error('Error parsing JSON:', error);
                document.getElementById('edit_polygon_geojson').value = '';
                // Set to empty if parsing fails
            }
        }
    </script>

    <!-- Load Additional JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Asets/lib/wow/wow.min.js"></script>
    <script src="../Asets/lib/easing/easing.min.js"></script>
    <script src="../Asets/lib/waypoints/waypoints.min.js"></script>
    <script src="../Asets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Asets/js/main.js"></script>
</body>
</html>