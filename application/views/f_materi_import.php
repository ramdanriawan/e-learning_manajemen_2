<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="card">
                    <form name="f_materi" action="<?php echo base_url(); ?>import/materi" id="f_materi"
                        enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" id="id" value="0">
                        <table class="table table-form">
                            <tr>
                                <td style="width: 25%">Guru</td>
                                <td style="width: 75%">
                                    <?php echo form_dropdown('id_guru', $p_guru, '', 'class="form-control" id="id_guru" required'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Mapel</td>
                                <td><?php echo form_dropdown('id_mapel', $p_mapel, '', 'class="form-control" id="id_mapel" required'); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Materi</td>
                                <td><input class="form-control" name="import_excel" type='file'>
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