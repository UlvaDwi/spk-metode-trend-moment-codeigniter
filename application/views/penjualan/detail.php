    <!-- content -->
    <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
          <h5>Detail Data Penjualan</h5>
          <table>
            <tr>
              <th>Id Penjualan</th>
              <td>:</td>
              <td><?php echo $detail ['id_penjualan'] ?></td>
            </tr>
            <tr>
              <th>Bulan/Tahun</th>
              <td>:</td>
              <td><?php echo $bulan[$detail ['bulan']-1].'/'.$detail ['tahun'] ?></td>
            </tr>
          </table>
          <table class="table">
            <tr>
              <th>no</th>
              <th>barang</th>
              <th>Jumlah</th>
            </tr>
            <?php 
            $no = 1;
            foreach ($detail_data as $key => $value): ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value->nama_barang ?></td>
                <td><?php echo $value->jumlah ?></td>
              </tr>
            <?php endforeach ?>
          </table>
        </div>
      </div>     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

