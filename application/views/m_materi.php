<?php
$uri4 = $this->uri->segment(4);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Materi</h3>
                    </div>
                    <div class="tombol-kanan">
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>adm/m_materi/edit/0"><i
                                class="glyphicon glyphicon-plus" style="margin-left: 0px; color: #fff"></i>
                            &nbsp;&nbsp;Tambah
                            Data</a>
                        <a class="btn btn-warning btn-sm tombol-kanan"
                            href="<?php echo base_url(); ?>upload/format_materi_download.xlsx"><i
                                class="glyphicon glyphicon-download"></i> &nbsp;&nbsp;Download Format Import</a>
                        <a class="btn btn-info btn-sm tombol-kanan"
                            href="<?php echo base_url(); ?>adm/m_materi/import"><i
                                class="glyphicon glyphicon-upload"></i> &nbsp;&nbsp;Import</a>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru', 'siswa'])): ?>
                        <a href='<?php echo base_url(); ?>adm/m_materi/cetak/<?php echo $uri4; ?>'
                            class='btn btn-info btn-sm' target='_blank'><i class='glyphicon glyphicon-print'></i>
                            Cetak</a>
                        <?php endif;?>
                    </div>
                </div>
                <div class="card-body">

                    <?php echo $this->session->flashdata('k'); ?>

                    <table class="table table-bordered" id="datatabel">
                        <thead>
                            <tr>
                                <td width="5%">No</td>
                                <td width="15%">Mapel/Guru</td>
                                <td width="50%">Materi</td>
                                <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                                <td width="15%">Aksi</td>
                                <?php endif;?>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="m_materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 id="myModalLabel">Data Materi</h4>
            </div>
            <div class="modal-body">
                <form name="f_materi" id="f_materi" onsubmit="return m_materi_s();">
                    <input type="hidden" name="id" id="id">
                    <div id="konfirmasi"></div>

                    <div class="form-group fgsoal">
                        <div class="col-md-2"><label>Mapel</label></div>
                        <div class="col-md-10">
                            <select class='form-control' id='id_mapel' name='id_mapel' required>
                                <?php
foreach ($mapels as $mapel):
    $selected = "";
    echo "<option value='$mapel[id]' >$mapel[nama]</option>";
endforeach;
?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group fgsoal">
                        <div class="col-md-2"><label>Guru</label></div>
                        <div class="col-md-10">
                            <select class='form-control' id='id_guru' name='id_guru' required>
                                <?php
foreach ($gurus as $guru):
    echo "<option value='$guru[id]' >$guru[nama]</option>";
endforeach;
?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group fgsoal">
                        <div class="col-md-2"><label>Teks Soal</label></div>
                        <div class="col-md-10">
                            <textarea class="form-control" id="editornya" style="height: 50px;"
                                name="materi"></textarea>
                        </div>
                    </div>
                    <div class="col-md-offset-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>