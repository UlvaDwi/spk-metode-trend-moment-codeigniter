    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>Ubah Data</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataBarang') ?>/ubah/<?php echo $ubah['id_barang'] ?>" method="post">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" value="<?php echo $ubah['nama_barang'] ?>">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">stok</label>
              <input type="number" class="form-control" id="exampleInputEmail1" name="stok" value="<?php echo $ubah['stok'] ?>">
              <small class="form-text text-danger"><?php echo form_error('stok'); ?></small>
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

