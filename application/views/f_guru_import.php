<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Data Guru</h3>
                    </div>
                    <div class="card-body">
                        <form name="f_siswa" action="<?php echo base_url('import/guru'); ?>" id="f_siswa"
                            enctype="multipart/form-data" method="post">
                            <div class='form-group'>
                                <input type="hidden" name="id" id="id" value="0">
                                <label for='import_excel'>File</label>
                                <input type="file" class="form-control col-md-3" name="import_excel" required
                                    id='import_excel'>
                            </div>
                            <div class='form-group'>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                    Simpan</button>
                                <a href="<?php echo base_url('adm/m_siswa'); ?>" class="btn btn-default"><i
                                        class="fa fa-minus-circle"></i>
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>