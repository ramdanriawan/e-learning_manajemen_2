<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Input Soal</h3>
                    </div>
                    <div class="card-body">
                        <form name="f_siswa" action="<?php echo base_url(); ?>import/soal" id="f_siswa"
                            enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" id="id" value="0">
                            <table class="table table-form">
                                <tr>
                                    <td width='5%'>Guru</td>
                                    <td>
                                        <?php echo form_dropdown('id_guru', $p_guru, '', 'class="form-control" id="id_guru" required'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='5%'>Mapel</td>
                                    <td><?php echo form_dropdown('id_mapel', $p_mapel, '', 'class="form-control" id="id_mapel" required'); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td width='5%'>File</td>
                                    <td><input type="file" class="form-control col-md-3" name="import_excel" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                            Simpan</button>
                                        <a href="<?php echo base_url(); ?>adm/m_siswa" class="btn btn-default"><i
                                                class="fa fa-minus-circle"></i> Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>