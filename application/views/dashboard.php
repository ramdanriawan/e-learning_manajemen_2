<!-- Main content -->
<section class="content">

    <div class='container'>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo count($siswas); ?></h3>

                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo base_url('adm/m_siswa'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo count($gurus); ?></h3>

                        <p>Guru / Dosen</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="<?php echo base_url('adm/m_guru'); ?>"  class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo count($mapels); ?></h3>

                        <p>Mapel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <a href="<?php echo base_url('adm/m_mapel'); ?>"  class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo count($soals); ?></h3>

                        <p>Soal</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </div>
                    <a href="<?php echo base_url('adm/m_soal'); ?>"  class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

</section>
<!-- /.content -->