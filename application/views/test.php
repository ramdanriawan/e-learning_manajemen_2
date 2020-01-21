<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($siswas as $key => $siswa): ?>
                <tr>
                    <td><?php echo $no = $key + 1; ?></td>
                    <td><?php echo $siswa->nama; ?></td>
                    <td><?php echo $siswa->nim; ?></td>
                    <td><?php echo $siswa->jurusan; ?></td>
                    <td>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script>
    var locationHrefHapusSemua = "<?php echo base_url('permohonan/hapus_semua'); ?>";
    var locationHrefCreate = "<?php echo base_url('permohonan/create'); ?>";
    var urlSearch = "<?php echo base_url('permohonan'); ?>";
    var q = "<?php echo base_url($_GET['q'] ?? ""); ?>";
    var placeholder = "cari nama instansi";
    var columnOrders = [4];
    var tampilkan_buttons = true;
    var button_manual = false;
</script>