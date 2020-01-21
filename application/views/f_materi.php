<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="card">
                    <div class="card-header">Input Materi</div>
                    <div class="panel-body">
                        <?php echo form_open_multipart(base_url()."adm/m_materi/simpan", "class='form-horizontal'"); ?>
                        <input type="hidden" name="id" id="id" value="<?php echo $d['id']; ?>">
                        <input type="hidden" name="mode" id="mode" value="<?php echo $d['mode']; ?>">
                        <div id="konfirmasi"></div>

                        <div class="form-group fgsoal">
                            <div class="col-md-2"><label>Mapel</label></div>
                            <div class="col-md-10">
                                <?php echo form_dropdown('id_mapel', $p_mapel, $d['id_mapel'], 'class="form-control" id="id_mapel" required'); ?>
                            </div>
                        </div>
                        <div class="form-group fgsoal">
                            <div class="col-md-2"><label>Guru</label></div>
                            <div class="col-md-10">
                                <?php echo form_dropdown('id_guru', $p_guru, $d['id_guru'], 'class="form-control" id="id_guru" required'); ?>
                            </div>
                        </div>

                        <div class="form-group fgsoal">
                            <div class="col-md-2"><label>Teks</label></div>
                            <div class="col-md-10">
                                <textarea class="form-control" id="editornya" style="height: 50px;"
                                    name="materi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-offset-2">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Simpan</button>
                            <a href="<?php echo base_url(); ?>adm/m_materi" class="btn btn-default"><i
                                    class="fa fa-minus-circle"></i> Kembali</a>
                        </div>
                    </div>
                    </form>
                </div><!-- panel body-->
            </div>
        </div>
    </div>
</div>