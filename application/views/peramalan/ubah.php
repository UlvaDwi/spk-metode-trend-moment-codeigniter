    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>Ubah Data</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataPeramalan') ?>/ubah/<?php echo $ubah['id_penjualan'] ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Bulan</label>
              <select name="bulan" class="form-control" >
                <?php foreach ($bulan as $value): ?>
                  <?php if ($ubah['bulan'] == $value){ ?>
                    <option value="<?php echo $value ?>" selected><?php echo $value ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                  <?php } ?>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="tahun" value="<?php echo $ubah['tahun'] ?>">
              <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Hasil Penjualan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="hasil_penjualan" value="<?php echo $ubah['hasil_penjualan'] ?>">
              <span class="error invalid-feedback"> </span>
              <small class="form-text text-danger"><?php echo form_error('hasil_penjualan'); ?></small>


            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="waktu" value="<?php echo $ubah['waktu'] ?>">
              <small class="form-text text-danger"><?php echo form_error('waktu'); ?></small>
            </div>
            <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
          </form>
        </div>
      </div>     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

