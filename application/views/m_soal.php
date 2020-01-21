<?php
$uri4 = $this->uri->segment(4);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Soal <?= ucwords($this->uri->segment(3)); ?> </h3>
                    </div>
                    <div class="card-body">
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>adm/m_soal/latihan"><i
                            class="fa fa-eye" aria-hidden="true"></i> &nbsp;&nbsp;Data Soal Latihan</a>

                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>adm/m_soal/ujian"><i
                            class="fa fa-eye" aria-hidden="true"></i> &nbsp;&nbsp;Data Soal Ujian</a>

                        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>adm/m_soal/edit/0"><i
                                class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Tambah Data</a>
                        <a class="btn btn-warning btn-sm tombol-kanan"
                            href="<?php echo base_url(); ?>upload/format_soal_download.xlsx"><i class="fa fa-download"
                                aria-hidden="true"></i> &nbsp;&nbsp;Download Format Import</a>
                        <a class="btn btn-info btn-sm tombol-kanan" href="<?php echo base_url(); ?>adm/m_soal/import"><i
                                class="fas fa-file-import    "></i> &nbsp;&nbsp;Import</a>
                        <a href='<?php echo base_url(); ?>adm/m_soal/cetak/<?php echo $uri4; ?>'
                            class='btn btn-info btn-sm' target='_blank'><i class="fa fa-print" aria-hidden="true"></i>
                            Cetak</a>
                        <?php endif;?>
                        <table class="table table-bordered" id="datatabel">
                            <thead>
                                <tr>
                                    <td width="5%">No</td>
                                    <td width="50%">Soal</td>
                                    <td width="15%">Mapel/Guru</td>
                                    <td width="15%">Analisa</td>
                                    <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru'])): ?>
                                    <td width="15%">Aksi</td>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>