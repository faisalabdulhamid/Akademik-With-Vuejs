<template>
    <div>
        <section class="panel panel-default">
            <aside class="panel-heading">
                <h4 class="panel-title">Kelas</h4>
            </aside>
            <aside class="panel-heading">
                <a class="btn btn-default btn-sm" data-tgl="tooltip" data-placement="top" title="Tambah" v-on:click="create"><i class="fa fa-user-plus"></i> </a>

                <div class="pull-right control-table">
                    <div class="form-group form-group-sm">
                        <select class="form-control" v-model="model.input.length" v-on:change="fetchKelas">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
            </aside>

            <aside class="panel-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in model.data">
                        <td>{{ parseInt(model.input.start)+index+1 }}</td>
                        <td>{{ item.kelas }}</td>
                        <td>{{ item.wali_kelas }}</td>
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
                    <li><button v-on:click="kembali"><i class="fa fa-arrow-left"></i> </button></li>
                    <li><button v-on:click="lanjut"><i class="fa fa-arrow-right"></i> </button></li>
                </ul>
                <div class="clearfix"></div>
            </aside>
        </section>

        <create :form="kelas" :source="source" :method="fetchKelas"></create>
        <!--<show :kelas="kelas"></show>-->
        <!--<edit :kelas="kelas"></edit>-->
        <!--<destroy :kelas="kelas"></destroy>-->

    </div>
</template>

<script>
    export default {
        name: 'SiswaIndex',
        data: function(){
            return {
                model: {
                    data: [],
                    input: {
                        start: 0,
                        length: 10
                    }
                },
                kelas: {
                    'id' : '',
                    'kelas' : '',
                    'nip_wali' : '',
                },
                source: 'kelas',
            }
        },
        mounted: function() {
            $('a[data-tgl="tooltip"]').tooltip();
            if(this.result){
                this.fetchKelas();
            }
        },
        beforeMount: function(){
            this.fetchKelas();
        },
        methods: {
            fetchKelas: function(){
                var vm = this;
                axios.get(this.buildURL())
                        .then(function(res){
                            Vue.set(vm.$data, 'model', res.data);
                        })
                        .catch(function(e){
                            console.log(e);
                        })

            },
            kembali: function(){
                if(parseInt(this.model.input.start) > 0){
                    this.model.input.start = parseInt(this.model.input.start) - parseInt(this.model.input.length);
                    this.fetchKelas();
                }
            },
            lanjut: function(){
                if((parseInt(this.model.input.start) + parseInt(this.model.input.length)) < parseInt(this.model.recordsTotal)){
                    this.model.input.start = parseInt(this.model.input.start) + parseInt(this.model.input.length);
                    this.fetchKelas();
                }

            },
            buildURL: function(){
                return `${this.source}?start=${this.model.input.start}&length=${this.model.input.length}`;
            },

            //------------------------------------------------------------------------------------------
            create: function(){
                var vm = this;
                axios.get(this.source+'/create').then(function(res){
                    Vue.set(vm.$data, 'kelas', res.data.data);
                    $("#form-create").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
            show: function(nis){
                var vm = this;
                axios.get(this.source+'/'+nis).then(function(res){
                    Vue.set(vm.$data, 'kelas', res.data.data);
                    $("#form-show").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
            edit: function(nis){
                var vm = this;
                axios.get(this.source+'/'+nis).then(function(res){
                    Vue.set(vm.$data, 'kelas', res.data.data);
                    $("#form-edit").modal("show");
                }).catch(function(e){
                    console.log(e);
                });

            },
            destroy: function(nis){
                var vm = this;
                axios.get(this.source+'/'+nis).then(function(res){
                    Vue.set(vm.$data, 'kelas', res.data.data);
                    $("#form-destroy").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
        }
    }
</script>