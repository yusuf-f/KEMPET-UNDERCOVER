<?php
require_once 'models/Pegawai.php';
//ciptakan objek dari class pegawai
$obj = new Pegawai();
//panggil method & tampilkan data
$rs = $obj->dataPegawai();
?>

<h3 style="margin-bottom: 10px;">Data Pegawai</h3>
<?php
if (isset($member)) {
?>
    <a href="index.php?hal=formPegawai" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fas fa-plus-circle"></i> Tambahkan Data</a>
<?php } ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Agama</th>
            <th scope="col">Bidang</th>
            <th scope="col">Foto</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($rs as $pawai) {
        ?>
            <tr>

                <td><?= $no; ?></td>
                <td><?= $pawai['nip']; ?></td>
                <td><?= $pawai['nama']; ?></td>
                <td><?= $pawai['email']; ?></td>
                <td><?= $pawai['agama']; ?></td>
                <td><?= $pawai['bidang']; ?></td>
                <td><?= $pawai['foto']; ?></td>
                <td>
                    <form method="POST" action="controllers/pegawaiController.php">
                        <a href="index.php?hal=detailPegawai&id=<?= $pawai['id']; ?>" class="btn btn-info" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i></a>
                        <?php
                        $role = $member['role'];
                        if (isset($member)) {
                        ?>
                            <a href="index.php?hal=formEditPegawai&id=<?= $pawai['id']; ?>" class="btn btn-warning" title="klik untuk mengedit data"><i class="fas fa-user-edit"></i></a>
                            <?php
                            if ($role != 'staff') {
                            ?>
                                <button name="proses" value="delete" onclick="return confirm('Menghapus Datanya Nih Yakin?')" class="btn btn-danger" title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i></button>
                            <?php } ?>
                            <input type="hidden" name="edi" value="<?= $pawai['id']; ?>">
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>

    </tbody>
</table>