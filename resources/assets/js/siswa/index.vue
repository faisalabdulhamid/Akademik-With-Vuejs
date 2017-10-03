<template>
    <div>
        <section class="panel panel-default">
            <aside class="panel-heading">
                <h4 class="panel-title">Siswa</h4>
            </aside>
            <aside class="panel-heading">
                <router-link :to="{name: 'siswa-create'}" data-tgl="tooltip" data-placement="top" title="Lihat" :class="{'btn btn-default btn-sm': true}"><i class="fa fa-user-plus"></i> </router-link>
                <div class="pull-right control-table">
                    <div class="form-group form-group-sm">
                        <select class="form-control" v-model="params.kelas" v-on:change="getDataSiswa">
                            <option value="all">Semuanya</option>
                            <option v-for="item in kelas.data" :value="item.id">{{ item.kelas }}</option>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <select class="form-control" v-model="model.input.length"  v-on:change="getDataSiswa">
                            <option>20</option>
                            <option>30</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
            </aside>

            <aside class="panel-body">
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
                            <!--<a class="btn btn-default btn-sm btn-warning"  v-on:click="siswa-show(item.nis)"><i class="fa fa-search"></i> </a>-->
                            <router-link :to="{name: 'siswa-show', params: {'siswaId': item.nis}}" data-tgl="tooltip" data-placement="top" title="Lihat" :class="{'btn btn-default btn-sm btn-info': true}"><i class="fa fa-search"></i> </router-link>
                            <router-link :to="{name: 'siswa-edit', params: {'siswaId': item.nis}}" :class="{'btn btn-default btn-sm btn-warning': true}"><i class="fa fa-edit"></i> </router-link>
                            <router-link :to="{name: 'siswa-destroy', params: {'siswaId': item.nis}}" :class="{'btn btn-default btn-sm btn-danger': true}"><i class="fa fa-user-times"></i> </router-link>
                            <!--<a class="btn btn-default btn-sm btn-info" data-tgl="tooltip" data-placement="top" title="Ubah" v-on:click="edit(item.nis)"><i class="fa fa-edit"></i></a>-->
                            <!--<a class="btn btn-default btn-sm btn-danger" data-tgl="tooltip" data-placement="top" title="Hapus" v-on:click="destroy(item.nis)"><i class="fa fa-user-times"></i> </a>-->
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

        <router-view></router-view>

        <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import store from './store/index'
    //Router
    import VueRouter from 'vue-router';
    const router = new VueRouter({
        routes: [
            {path: '/create', component: require('./siswa-create.vue'), name: 'siswa-create'},
            {path: '/show/:siswaId', component: require('./siswa-show.vue'), name: 'siswa-show', props: {loading: false}},
            {path: '/edit/:siswaId', component: require('./siswa-edit.vue'), name: 'siswa-edit', meta: {mode: 'edit'}},
            {path: '/destroy/:siswaId', component: require('./siswa-destroy.vue'), name: 'siswa-destroy'}
        ]
    });

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
//                loading: false,
            }
        },
        mounted: function() {
            $('[data-tgl="tooltip"]').tooltip();
            $('table tr td a[data-tgl="tooltip"]').tooltip();
        },
        beforeMount: function(){
            this.getDataSiswa();
            this.getDataKelas();
        },
        methods: {
            getDataSiswa: function(){
                var vm = this
                vm.$store.dispatch('setLoadingTrue')
                axios.get(this.buildURL())
                    .then((res) => {
                        vm.$store.dispatch('setLoadingFalse')
                        Vue.set(vm.$data, 'model',res.data);
                    }, (e) => {
                        vm.$store.dispatch('setLoadingFalse')
                        toastr.error(e);
                    });

            },
            getDataKelas: function(){
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
                    this.getDataSiswa();
                }
            },
            lanjut: function(){
                if((parseInt(this.model.input.start) + parseInt(this.model.input.length)) < parseInt(this.model.recordsTotal)){
                    this.model.input.start = parseInt(this.model.input.start) + parseInt(this.model.input.length);
                    this.getDataSiswa();
                }
            },
            buildURL: function(){
                return `${this.source}?start=${this.model.input.start}&length=${this.model.input.length}&kelas=${this.params.kelas}`;
            },
        },
        computed: {
            loading(){
                return this.$store.getters.loading;
            }
        },
        watch: {

        },
        router,
        store
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