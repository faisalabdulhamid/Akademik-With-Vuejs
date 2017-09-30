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
                            <option v-for="item in kelas.data" :value="item.id">{{ item.kelas }}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <select class="form-control" v-model="model.input.length"  v-on:change="fetchSiswa">
                            <option>20</option>
                            <option>30</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
            </aside>

            <aside class="panel-body">

                <!--<pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>-->

                <table class="table table-responsive table-bordered" id="data-siswa">
                    <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>L/P</th>
                        <th class="action">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in model.data">
                        <td class="text-center">{{ parseInt(model.input.start)+index+1 }}</td>
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
                <b>Jumlah Data : </b>{{ model.recordsTotal }}
                <ul class="pagination pagination-sm pull-right">
                    <li><a v-on:click="kembali"><i class="fa fa-arrow-left"></i> </a></li>
                    <li><a v-on:click="lanjut"><i class="fa fa-arrow-right"></i> </a></li>
                </ul>
                <div class="clearfix"></div>
            </aside>
        </section>

        <create :siswa="siswa"></create>
        <show :siswa="siswa"></show>
        <!--<edit :siswa="siswa"></edit>-->
        <destroy :siswa="siswa"></destroy>

        <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>

    </div>
</template>
<style lang="sass">
    @import "siswa.scss";
</style>
<script>
    
    export default {
        name: 'SiswaIndex',
        data: function(){
            return {
                model: {
                    data: [],
                    input: {
                        start: 0,
                        length: 20
                    }
                },
                params: {
                    kelas: 'all'
                },
                kelas: {
                    data: ''
                },
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
                source: 'siswa',
                //Loading
                color: '#000',
                size: '40px',
                radius: '100%',
                loading: false,
            }
        },
        mounted: function() {
            $('[data-tgl="tooltip"]').tooltip();
        },
        ready(){
            $('[data-tgl="tooltip"]').tooltip();
        },
        beforeMount: function(){
            this.fetchSiswa();
            this.fetchKelas();
//            this.createBackdrop();

//            this.removeBackdrop();'
        },
        methods: {
            fetchSiswa: function(){
                var vm = this
                vm.loading = true
                axios.get(this.buildURL())
                    .then((res) => {
                        vm.loading = false
                        Vue.set(vm.$data, 'model',res.data);
                    }, (e) => {
                        vm.loading = false
                        toastr.error(e);
                    });

            },
            fetchKelas: function(){
                var vm = this;
                axios.get('api/kelas')
                    .then(function(res){
                        Vue.set(vm.$data, 'kelas', res.data);
                    })
                    .catch(function(e){
                        toastr.error(e);
                    })
            },
            kembali: function(){
                if(parseInt(this.model.input.start) > 0){
                    this.model.input.start = parseInt(this.model.input.start) - parseInt(this.model.input.length);
                    this.fetchSiswa();
                }
            },
            lanjut: function(){
                if((parseInt(this.model.input.start) + parseInt(this.model.input.length)) < parseInt(this.model.recordsTotal)){
                    this.model.input.start = parseInt(this.model.input.start) + parseInt(this.model.input.length);
                    this.fetchSiswa();
                }
            },
            buildURL: function(){
                return `${this.source}?start=${this.model.input.start}&length=${this.model.input.length}&kelas=${this.params.kelas}`;
            },
            create: function(){
                var vm = this;
                vm.loading = true;
                axios.get('siswa/create').then(function(res){
                    vm.loading = false;
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-create").modal("show");
                }).catch(function(e){
                    toastr.error(e);
                });
            },
            show: function(nis){
                var vm = this;
                axios.get('siswa/'+nis).then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-show").modal("show");
                }).catch(function(e){
                    toastr.error(e);
                });
            },
            edit: function(nis){
//                var vm = this;
//                axios.get('siswa/'+nis).then(function(res){
//                    Vue.set(vm.$data, 'siswa', res.data.data);
//                    $("#form-edit").modal("show");
//                }).catch(function(e){
//                toastr.error(e);
//                });

            },
            destroy: function(nis){
                var vm = this;
                axios.get('siswa/'+nis).then(function(res){
                    Vue.set(vm.$data, 'siswa', res.data.data);
                    $("#form-destroy").modal("show");
                }).catch(function(e){
                    toastr.error(e);
                });
            },
            updateProgress(value)
            {
                console.log(value)
            }
        },
        watch: {

        }
    }
</script>