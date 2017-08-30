<template>
    <div>
        <section class="panel panel-default">
            <aside class="panel-heading">
                <h4 class="panel-title">Siswa</h4>
            </aside>
            <aside class="panel-heading">
                <a class="btn btn-default btn-sm" data-tgl="tooltip" data-placement="top" title="Tambah" v-on:click="create"><i class="fa fa-user-plus"></i> </a>

                <div class="pull-right control-table">
                    <div class="form-group form-group-sm">
                        <select class="form-control" v-model="params.kelas" v-on:change="fetchSiswa">
                            <option value="all">Semuanya</option>
                            <option v-for="item in kelas">Kelas 1</option>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <select class="form-control">
                            <option>10</option>
                            <option>30</option>
                            <option>50</option>
                            <option>all</option>
                        </select>
                    </div>
                </div>
            </aside>

            <aside class="panel-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>L/P</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in model.data">
                        <td>{{ index+1 }}</td>
                        <td>{{ item.nis }}</td>
                        <td>{{ item.nama }}</td>
                        <td>{{ item.jenis_kelamin }}</td>
                        <td>
                            <a class="btn btn-default btn-sm btn-warning" data-tgl="tooltip" data-placement="top" title="Lihat" v-on:click="show(item.nis)"><i class="fa fa-search"></i> </a>
                            <a class="btn btn-default btn-sm btn-info" data-tgl="tooltip" data-placement="top" title="Ubah" v-on:click="edit(item.nis)"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-default btn-sm btn-danger" data-tgl="tooltip" data-placement="top" title="Hapus" v-on:click="destroy(item.nis)"><i class="fa fa-user-times"></i> </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </aside>

            <aside class="panel-footer">
                <ul class="pagination pagination-sm pull-right">
                    <li><a v-on:click="kembali"><i class="fa fa-arrow-left"></i> </a></li>
                    <li><a v-on:click="lanjut"><i class="fa fa-arrow-right"></i> </a></li>
                </ul>
                <div class="clearfix"></div>
            </aside>
        </section>

        <create :siswa="siswa"></create>
        <show :siswa="siswa"></show>
        <edit :siswa="siswa"></edit>
        <destroy :siswa="siswa"></destroy>

    </div>
</template>

<script>
    export default {
        name: 'SiswaIndex',
        data: function(){
            return {
                model: {
                    data: []
                },
                params: {
                   kelas: 'all',
                },
                kelas: {},
                siswa: {
                    'nis' : '',
                    'nisn' : '',
                    'nama' : '',
                    'jenis_kelamin' : '',
                    'tempat_lahir' : '',
                    'tanggal_lahir' : '',
                    'agama' : '',
                    'anak_ke' : '',
                    'status_keluarga' : '',
                    'alamat' : '',
                    'diterima_grade' : '',
                    'diterima_tanggal' : '',
                    'asal_sekolah' : '',
                    'tahun_ijazah' : '',
                    'nomor_ijazah' : '',
                    'foto' : '',
                    'status_belajar' : '',
                    'telepon' : '',
                    'email' : '',
                    'ayah': '',
                    'pekerjaan_ayah': '',
                    'telepon_ayah': '',
                    'ibu': '',
                    'pekerjaan_ibu': '',
                    'telepon_ibu': '',
                    'alamat_orang_tua': '',
                    'wali': '',
                    'pekerjaan_wali': '',
                    'telepon_wali': '',
                    'alamat_wali': '',
                },
            }
        },
        mounted: function() {
            $('[data-tgl="tooltip"]').tooltip();
        },
        beforeMount: function(){
            this.fetchSiswa();
            this.fetchKelas();
        },
        methods: {
            fetchSiswa: function(){
                var vm = this;
                axios.get(this.buildURL())
                        .then(function(res){
                            Vue.set(vm.$data, 'model', res.data);
                            toastr.error("Error");
                        })
                        .catch(function(e){
                            console.log(e);
                        })

            },
            fetchKelas: function(){
                var vm = this;
                axios.get('kelas')
                        .then(function(res){
                            console.log(res.data.data);
                            Vue.set(vm.$data, 'model', res.data);
                        })
                        .catch(function(){

                        })
            },
            kembali: function(){

            },
            lanjut: function(){

            },
            buildURL: function(){
                return `siswa`;
            },
            create: function(){
                var vm = this;
                axios.get('siswa/create').then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-create").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
            show: function(nis){
                var vm = this;
                axios.get('siswa/'+nis).then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-show").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
            edit: function(nis){
                var vm = this;
                axios.get('siswa/'+nis).then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-edit").modal("show");
                }).catch(function(e){
                    console.log(e);
                });

            },
            destroy: function(nis){
                var vm = this;
                axios.get('siswa/'+nis).then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-destroy").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            }
        }
    }
</script>