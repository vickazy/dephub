<script type="text/javascript">
    $().ready(function() {    
        var container = $('div.alert');
        var validator = $("#form1").validate({
            errorLabelContainer: container,
            errorContainer: $(container),
            rules: {
                name: "required",
                tahun_program: "required"
            },
            messages: {
                name: "Nama wajib diisi!",
                tahun_program: "Tahun program wajib diisi!"
            }

        });
        $(".cancel").click(function() {
            validator.resetForm();
        });
    });
    $(function(){
        $('#tgl_mulai').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#tgl_akhir').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>
<form method="post" id="form1" action="perencanaan/diklat/insert_diklat" class="form-horizontal">
    <fieldset>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#tujuan" data-toggle="tab">Tujuan dan Indikator</a></li>
            <li><a href="#pelaksanaan" data-toggle="tab">Pelaksanaan</a></li>
            <li><a href="#peserta" data-toggle="tab">Peserta</a></li>
            <li><a href="#pelaksana" data-toggle="tab">Pelaksana dan Fasilitator</a></li>
            <li><a href="#materi" data-toggle="tab">Materi</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Nama Program</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" title="Anda belum memasukkan nama" name="name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input02">Tahun Program</label>
                    <div class="controls">
                        <input type="text" class="input-mini" id="input02" name="tahun_program" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="kategori">Kategori Program</label>
                    <div class="controls">
                        <?php echo form_dropdown('kategori', $pil_kategori) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="deskripsi">Deskripsi Singkat</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('deskripsi') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tujuan">
                <div class="control-group">
                    <label class="control-label">Tujuan Kurikuler</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tujuan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Indikator Keluaran</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('indikator') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksanaan">
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_mulai"  placeholder="Tahun-Bulan-Tanggal" id="tgl_mulai"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_akhir">Tanggal Selesai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_akhir" placeholder="Tahun-Bulan-Tanggal" id="tgl_akhir"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lama Pendidikan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('lama_pendidikan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara Pelaksanaan Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksanaan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pelaksanaan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tempat') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="peserta">
                <div class="control-group">
                    <label class="control-label" for="jml_pes">Jumlah Peserta</label>
                    <div class="controls">
                        <div class="input-append">
                            <input type="text" class="input-mini" id="jml_pes" name="jumlah_peserta"><span class="add-on">orang</span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Pesyaratan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pesyaratan') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div class="control-group">
                    <label class="control-label">Pelaksana Penanggung Jawab Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksana') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fasilitator</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('fasilitator') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="materi">
                <div class="control-group">
                    <label class="control-label">Materi Diklat</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('materi') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn cancel">Ulangi</button>
        </div>
    </fieldset>
</form>
