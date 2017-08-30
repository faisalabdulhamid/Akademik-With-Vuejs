<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-show" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Data Diri Peserta Didik</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Nama Peserta Didik</td>
                            <td>:</td>
                            <td>{{ siswa.nama }}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Nomor Induk</td>
                            <td>:</td>
                            <td>{{ siswa.nis }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ siswa.nisn }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ siswa.tempat_tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ siswa.jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ siswa.agama }}</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Anak Ke</td>
                            <td>:</td>
                            <td>{{ siswa.anak_ke }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Status Keluarga</td>
                            <td>:</td>
                            <td>{{ siswa.status_keluarga }}</td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Alamat Peserta Didik</td>
                            <td>:</td>
                            <td>{{ siswa.alamat }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Telepon</td>
                            <td>:</td>
                            <td>{{ siswa.alamat }}</td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td colspan="3">Diterima Disekolah ini</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Di kelas/Peminatan</td>
                            <td>:</td>
                            <td>{{ siswa.diterima_grade }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Pada Tanggal</td>
                            <td>:</td>
                            <td>{{ siswa.diterima_tanggal }}</td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td colspan="3">Sekolah Asal</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Nama Sekolah</td>
                            <td>:</td>
                            <td>{{ siswa.asal_sekolah }}</td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td colspan="3">Ijazah SMP/MTs/PaketB</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Tahun</td>
                            <td>:</td>
                            <td>{{ siswa.tahun_ijazah }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Nomor</td>
                            <td>:</td>
                            <td>{{ siswa.nomor_ijazah }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'SiswaShow',
        props: ['siswa', 'title'],
    }
</script>