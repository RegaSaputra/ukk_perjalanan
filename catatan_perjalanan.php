<div class="card" id="invoice">
    <div class="card-header">
        <a href="user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>



    <div class="card-body" Z>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    $data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik'] . "|" . $_SESSION['nama_lengkap'];
                    foreach ($data as $value) {
                        $pecah = explode("|", $value);
                        @$key = $pecah['0'] . "|" . $pecah['1'];
                        if ($key == $user) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pecah['2']; ?></td>
                                <td><?= $pecah['3']; ?></td>
                                <td><?= $pecah['4']; ?></td>
                                <td><?= $pecah['5']; ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-12 mb-2">
        <a href="javascript:void()" id="print" class="btn btn-danger py-1 font-16"><i class="mdi mdi-file-document-box-outline mr-2"></i>Print</a>
    </div>
    <script>
                document.getElementById('print').addEventListener('click', function() {
                    var printContents = document.getElementById('invoice').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                });
    </script>      
