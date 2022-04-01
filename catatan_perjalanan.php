<div class="card" id="invoice">
    <div class="card-header">
        <a href="user.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a> 
        <a href="javascript:void()" id="print" class="btn btn-danger py-1 font-16"><i class="fas fa-fw fa-book"></i><i class="mdi mdi-file-document-box-outline mr-2"></i>Print</a>
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
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    $data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik'] . "|" . $_SESSION['nama_lengkap'];
                    foreach ($data as $value) {
                        $pecah = explode("|", $value);
                        @$key = $pecah['1'] . "|" . $pecah['2'];
                        if ($key == $user) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pecah['3']; ?></td>
                                <td><?= $pecah['4']; ?></td>
                                <td><?= $pecah['5']; ?></td>
                                <td><?= $pecah['6']; ?></td>
                                <td>
                                    <a href="?url=edit_catatan&id_catatan=<?= $pecah['0']?>" class="btn btn-warning">
                                    <i class="fa fa-pen"></i> Edit
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
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
