    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>Tambah Data Penjualan</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataPenjualan') ?>/validation_form" method="post">
            <div class="form-group">
              <label for="id">Id Penjualan</label>
              <input type="text" class="form-control" id="id" name="id_penjualan" value="<?= $data = (empty($lastId->id_penjualan))? 1 : $lastId->id_penjualan+1 ?>" readonly>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Bulan</label>
                  <select name="bulan" class="form-control" >
                    <?php 
                    $no = 1;
                    foreach ($bulan as $value): ?>
                      <option value="<?php echo $no++ ?>"><?php echo $value ?></option>}
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-6">
               <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun">
                <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <div class="row">
                  <div class="col-12">
                    <label>Barang yang Dibeli</label>
                    <a class="mb-2 btn btn-sm btn-secondary float-right add_field_button">Tambah Penjualan</a>
                  </div>
                </div>
                <div class="barang">
                  <div class="row mt-2 col-12 input_fields_wrap">
                    <select class="form-control col-5" name="id_barang[]">
                      <?php foreach ($barang as $key => $value): ?>
                        <option value="<?php echo $value->id_barang ?>"><?php echo $value->nama_barang ?></option>
                      <?php endforeach ?>
                    </select>
                    <input class="ml-2 form-control col-6" type="number" name="jumlah[]" placeholder="Jumlah">
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
        </form>

        <table class="mt-2 table tabel-bordered .table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Bulan</th>
              <th>Tahun</th>
              <th>Hasil Penjualan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            if (empty($penjualan)) { ?>
              <tr>
                <td colspan="6" style="text-align: center;"><b> TIDAK ADA DATA</b></td>
              </tr>
              <?php
            }
            foreach ($penjualan as $key => $value): ?>
              <tr>
                <td><?php echo ++$no ?></td>
                <td><?php echo $bulan[$value->bulan-1] ?></td>
                <td><?php echo $value->tahun ?></td>
                <td><?php echo $value->hasil_penjualan ?></td>
                <td>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url('DataPenjualan') ?>/hapus/<?php echo $value->id_penjualan ?>" >Hapus</a>
                  <!-- <a class="btn btn-sm btn-warning" href="<?ph p echo base_url('DataPenjualan') ?>/ubah/<?php echo $value->id_penjualan ?>" >Update</a> -->
                  <a class="btn btn-sm btn-success" href="<?php echo base_url('DataPenjualan') ?>/detail/<?php echo $value->id_penjualan ?>" >Detail</a>
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

