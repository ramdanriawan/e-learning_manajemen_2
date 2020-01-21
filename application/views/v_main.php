<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Siswa</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"><canvas
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"
                                width="67" height="30"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span
                            class="counter text-success">
                                <?php echo count($siswas); ?>
                            </span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Guru / Dosen</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"><canvas
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"
                                width="67" height="30"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                            class="counter text-purple"><?php echo count($gurus); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Mapel</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"><canvas
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"
                                width="67" height="30"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                            class="counter text-purple"><?php echo count($mapels); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Soal</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash4"><canvas
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"
                                width="67" height="30"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                            class="counter text-info"><?php echo count($soals); ?></span></li>
                </ul>
            </div>
        </div>
    </div>