<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Guru</h3>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success btn-sm tombol-kanan" href="#" onclick="return m_guru_e(0);"><i
                                class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Tambah</a></a>
                        <a class="btn btn-warning btn-sm tombol-kanan"
                            href="<?php echo base_url(); ?>upload/format_import_guru.xlsx"><i class="fa fa-download"
                                aria-hidden="true"></i> &nbsp;&nbsp;Download Format Import</a>
                        <a class="btn btn-info btn-sm tombol-kanan" href="<?php echo base_url(); ?>adm/m_guru/import"><i
                                class="fas fa-file-import"></i> &nbsp;&nbsp;Import</a>
                        <a href="<?php echo base_url('adm/aktifkan_semua_guru'); ?>"
                            onclick="return confirm('yakin akan mengaktifkan semua guru?');"
                            class="btn btn-info btn-sm"><i class="fa fa-users"></i> Aktifkan semua guru</a>
                        <table class="table table-bordered" id="datatabel">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="40%">Nama</th>
                                    <th width="20%">NIP/Username</th>
                                    <th width="35%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="m_guru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="myModalLabel">Data Guru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="f_guru" id="f_guru" onsubmit="return m_guru_s();">
                            <input type="hidden" name="id" id="id" value="0">
                            <table class="table table-form">
                                <tr>
                                    <td style="width: 25%">NIP</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="nip" id="nip"
                                            required>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Nama</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="nama" id="nama"
                                            required></td>
                                </tr>
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