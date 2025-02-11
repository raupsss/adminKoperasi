<div>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <!-- <div class="card-header"> Invoice <strong><?= $tanggal->format('d-m-Y') ?></strong> <span
                        class="float-end">
                        <strong>Status:</strong> Pending</span> </div> -->
                <div class="card-body">
                    <div class="d-flex mb-5 justify-content-center">
                        <div class="d-flex align-items-center flex-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div>
                                <h6>LAPORAN PINJAMAN</h6>
                            </div>
                            <div>
                                Kotree
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Simpanan</th>
                                    <th>Pinjaman</th>
                                    <th>SHU Simpanan</th>
                                    <th>SHU Pinjaman</th>
                                    <th>Total SHU</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $users = $this->db->get('user')->result_array();

                                foreach ($users as $user) :
                                    $username = $user['username'];
                                    $query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `username` = '$username' AND keterangan = '2') AS pinjaman,
                                                    (SELECT SUM(`simpanan`) FROM `simpanan`  WHERE `username` = '$username' AND status = '2') AS simpanan
                                                    FROM `user` WHERE `username` = '$username'";
                                    $total = $this->db->query($query)->row_array()
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td class="text-center"><?= $user['username'] ?></td>
                                        <?php if ($total['simpanan'] == NULL) : ?>
                                            <td>-</td>
                                        <?php else : ?>
                                            <td><?= "Rp. " . number_format($total['simpanan'], 2, ',', '.'); ?></td>
                                        <?php endif; ?>

                                        <?php if ($total['pinjaman'] == NULL) : ?>
                                            <td>-</td>
                                        <?php else : ?>
                                            <td><?= "Rp. " . number_format($total['pinjaman'], 2, ',', '.'); ?></td>
                                        <?php endif; ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"> </div>
                        <div class="col-lg-4 col-sm-5 ms-auto">
                            <table class="table table-clear">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
        Scripts
    ***********************************-->

<!-- Required vendors -->
<script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
<!-- Datatable -->
<script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js">
</script>
<script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"></script>

<script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dlabnav-init.js"></script>
<script src="<?= base_url(); ?>assets/js/demo.js"></script>

<script>
    var delayInMilliseconds = 1000; //1 second

    setTimeout(function() {
        window.print();
    }, delayInMilliseconds);
</script>
</body>

</html>