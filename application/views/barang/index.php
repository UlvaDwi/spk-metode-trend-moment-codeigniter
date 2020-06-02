    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>Tambah Data Barang</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataBarang') ?>/validation_form" method="post">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">stok</label>
              <input type="number" class="form-control" id="exampleInputEmail1" name="stok">
              <small class="form-text text-danger"><?php echo form_error('stok'); ?></small>
            </div>
            <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
          </form>
          <table class="mt-2 table tabel-bordered .table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              if (empty($barang)) { ?>
                <tr>
                  <td colspan="6" style="text-align: center;"><b> TIDAK ADA DATA</b></td>
                </tr>
                <?php
              }
              foreach ($barang as $key => $value): ?>
                <tr>
                  <td><?php echo ++$no ?></td>
                  <td><?php echo $value->nama_barang ?></td>
                  <td><?php echo $value->stok ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('DataBarang') ?>/hapus/<?php echo $value->id_barang ?>" >Hapus</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo base_url('DataBarang') ?>/ubah/<?php echo $value->id_barang ?>" >Update</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

