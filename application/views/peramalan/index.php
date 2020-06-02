    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>DATA PENJUALAN</h5>
          <hr>

          <table class="mt-2 table tabel-bordered .table-hover">
            <thead>
              <tr>

                <th>Tahun</th>
                <th>Bulan</th>
                <th>Penjualan(y)</th>
                <th>Waktu(x)</th>
                <th>x*y</th>
                <th>x^2</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $x = 0;
              $jumlahx = 0;
              $jumlahy = 0;
              $jumlahxy = 0;
              $jumlahx2 = 0;
              
              
              foreach ($tampil_hitung as $key => $value): 
                
                $jumlahy += $value->hasil;
                $jumlahx += $x;
                $jumlahxy += ($value->hasil)*$x;
                $jumlahx2 += pow($x,2);?>
                

                <tr>
                  <td><?php echo $value->tahun ?></td>
                  <td><?php echo $value->bulan ?></td>
                  <td><?php echo $value->hasil ?></td>
                  <td><?php echo $x++ ?></td>
                  <td><?php echo ($value->hasil)*$x ?></td>
                  <td><?php echo pow($x,2) ?></td>
                </tr>
              <?php endforeach ?>
              <tr>
                <th colspan="2">Jumlah</th>
                <td><?php echo $jumlahy ?></td>
                <td><?php echo $jumlahx ?></td>
                <td><?php echo $jumlahxy ?></td>
                <td><?php echo $jumlahx2 ?></td>
              </tr>
              <tr>
                <th colspan="2">Rata-rata</th>
                <td><?php echo $jumlahy/$x ?> </td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

            </tbody>
          </table>
          <hr>
          <h5>---Ramal Data Penjualan---</h5>
          <hr>


          <form class="form mb-2" action="<?php echo base_url('DataPeramalan') ?>/validation_form" method="post">
            <div class="row">
              <div class="form-group col-6">
                <label for="exampleInputEmail1">Bulan</label>
                <select name="bulan" class="form-control" >
                  <?php 
                  $no = 1;
                  foreach ($bulan as $value): ?>
                    <option value="<?php echo $no++ ?>"><?php echo $value ?></option>}
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group col-6">
                <label for="exampleInputEmail1">Tahun</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="tahun">
                <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
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
                <th>Hasil Peramalan(barang)</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              if (empty($peramalan)) { ?>
                <tr>
                  <td colspan="6" style="text-align: center;"><b>TIDAK ADA DATA</b></td>
                </tr>
                <?php
              }
              foreach ($peramalan as $key => $value): ?>
                <tr>
                  <td><?php echo ++$no ?></td>
                  <td><?php echo $bulan[$value->bulan-1] ?></td>
                  <td><?php echo $value->tahun ?></td>
                  <td><?php echo $value->hasil ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('DataPeramalan') ?>/hapus/<?php echo $value->id_peramalan ?>" >Hapus</a>
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

