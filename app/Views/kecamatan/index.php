<!-- Modal -->
<div class="modal fade" id="modalDaftarBengkel" tabindex="-1" aria-labelledby="modalDaftarBengkelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarBengkelLabel">Daftar Bengkel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Isi modal disini -->
        <p>Isi dari daftar bengkel dapat ditampilkan di sini.</p>

        <!-- Input untuk pencarian -->
        <div class="mb-3">
          <input type="text" id="searchInput" class="form-control" placeholder="Cari nama bengkel...">
        </div>

        <!-- Daftar bengkel dengan fitur pencarian -->
        <div id="bengkelList" class="list-group">
          <?php foreach ($bengkel as $data): ?>
            <a href="#" class="list-group-item list-group-item-action" onclick="panToMarker(<?= $data['latitude'] ?>, <?= $data['longitude'] ?>); return false;">
              <?= htmlspecialchars($data['nama_bengkel'], ENT_QUOTES) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    // Fungsi untuk menangani pencarian nama bengkel
    function searchBengkel() {
        var input, filter, bengkelList, a, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        bengkelList = document.getElementById('bengkelList');
        a = bengkelList.getElementsByTagName('a');

        // Loop through all list items, and hide those who don't match the search query
        for (var i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    // Event listener untuk memanggil fungsi searchBengkel() ketika input berubah
    document.getElementById('searchInput').addEventListener('input', searchBengkel);
</script>

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Login -->
                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <!-- Tombol lainnya jika diperlukan -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data Bengkel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

            </div>
            <form action="/kecamatan/create" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_bengkel">Nama Bengkel</label>
                        <input type="text" class="form-control" id="nama_bengkel" name="nama_bengkel" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="polygon_geojson">Polygon GeoJSON</label>
                        <textarea class="form-control" id="polygon_geojson" name="polygon_geojson"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <select class="form-control" id="warna" name="warna">
                            <option value="black">Black</option>
                            <option value="red">Red</option>
                            <option value="yellow">Yellow</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pentolan">Marker</label>
                        <input type="file" class="form-control" id="pentolan" name="pentolan" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto Bengkel</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Data Bengkel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kecamatan/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nama_bengkel">Nama Bengkel</label>
                        <input type="text" class="form-control" id="edit_nama_bengkel" name="nama_bengkel" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_latitude">Latitude</label>
                        <input type="text" class="form-control" id="edit_latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_longitude">Longitude</label>
                        <input type="text" class="form-control" id="edit_longitude" name="longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_polygon_geojson">Polygon GeoJSON</label>
                        <textarea class="form-control" id="edit_polygon_geojson" name="polygon_geojson"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_warna">Warna</label>
                        <select class="form-control" id="edit_warna" name="warna">
                            <option value="black">Black</option>
                            <option value="red">Red</option>
                            <option value="yellow">Yellow</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_keterangan">Keterangan</label>
                        <textarea class="form-control" id="edit_keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_pentolan">Marker (jika ingin mengganti)</label>
                        <input type="file" class="form-control" id="edit_pentolan" name="pentolan">
                    </div>
                    <div class="form-group">
                        <label for="edit_gambar">Foto Bengkel (jika ingin mengganti)</label>
                        <input type="file" class="form-control" id="edit_gambar" name="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
