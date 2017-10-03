<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-show" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="$router.go(-1)"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Data Diri Peserta Didik</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="show-siswa">
                        <tbody>
                        <tr>
                            <td class="no">1.</td>
                            <td>Nama Peserta Didik</td>
                            <td class="no">:</td>
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
                            <td>{{ siswa.telepon }}</td>
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
                        <tr>
                            <td>12</td>
                            <td>Catatan Prestasi</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Prestasi</th>
                                        <th>Tingkat</th>
                                        <th>Nama Prestasi</th>
                                        <th>Tahun</th>
                                        <th>Penyelenggara</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item, idx) in prestasi">
                                        <td>{{ idx+1 }}</td>
                                        <td>{{ item.jenis_prestasi }}</td>
                                        <td>{{ item.tingkat}}</td>
                                        <td>{{ item.nama }}</td>
                                        <td>{{ item.tahun }}</td>
                                        <td>{{ item.penyelenggara }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Beasiswa</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Penyelenggara / Sumber</th>
                                        <th>Tahun Mulai</th>
                                        <th>Tahun Selesai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item, idx) in beasiswa">
                                        <td>{{ idx+1 }}</td>
                                        <td>item.jenis</td>
                                        <td>{{ item.penyelenggara }}</td>
                                        <td>{{ item.tahun_mulai }}</td>
                                        <td>{{ item.tahun_selesai }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
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
        data: function(){
            return {
                siswa: {},
                prestasi: [],
                beasiswa: []
            }
        },
        methods: {
            getDataSiswa: function(){
                var vm = this;
                vm.$parent.$store.dispatch('setLoadingTrue');
                axios.get('siswa/'+this.$route.params.siswaId).then(function(res){
                    vm.$parent.$store.dispatch('setLoadingFalse');
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    let prestasiObj = JSON.parse(res.data.data.prestasi);
                    Vue.set(vm.$data, 'prestasi', prestasiObj);
                    let beasiswaObj = JSON.parse(res.data.data.beasiswa);
                    Vue.set(vm.$data, 'beasiswa', beasiswaObj);
                }).catch(function(e){
                    vm.$parent.$store.dispatch('setLoadingFalse');
                    toastr.error(e);
                });
            }
        },
        beforeMount: function(){
            this.getDataSiswa();
        },
        mounted: function(){
            $('#form-show').modal('show');
        }
    }
</script>

<style lang="scss">
    $bg: #1b1b1b;
    $color: #d1d1d1;

    table#show-siswa{
        tr{
            td:nth-child(1), td:nth-child(3){
                width: 30px;
            }
            td:nth-child(2){
                width: 30%;
            }
        }
    }
</style>