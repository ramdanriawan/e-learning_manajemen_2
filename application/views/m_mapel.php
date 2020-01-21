<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Mata Pelajaran</h3>
                    </div>
                    <div class="card-body">
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                        <a class="btn btn-success btn-sm tombol-kanan" href="#" onclick="return m_mapel_e(0);"><i
                                class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Tambah</a>
                        <?php endif;?>
                        <table class="table table-bordered" id="datatabel">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="75%">Nama</th>
                                    <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                                    <th width="20%">Aksi</th>
                                    <?php endif;?>

                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="m_mapel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="myModalLabel">Data Mata Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="f_mapel" id="f_mapel" onsubmit="return m_mapel_s();">
                            <input type="hidden" name="id" id="id" value="0">
                            <table class="table table-form">
                                <tr>
                                    <td style="width: 25%">Nama</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="nama" id="nama"
                                            required></td>
                                </tr>
                                <!-- <tr>
                            <td style="width: 25%">Detail</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="detail" id="detail"
                                    required></td>
                        </!-->
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i>
                            Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>