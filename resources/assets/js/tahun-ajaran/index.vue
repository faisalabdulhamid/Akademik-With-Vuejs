<template>
    <div>
        <section class="panel panel-default">
            <aside class="panel-heading">
                <h4 class="panel-title">Tahun Ajaran</h4>
            </aside>
            <aside class="panel-heading">
                <a class="btn btn-default btn-sm" data-tgl="tooltip" data-placement="top" title="Tambah" v-on:click="create"><i class="fa fa-user-plus"></i> </a>
            </aside>

            <aside class="panel-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in model.data">
                        <td>{{ index+1 }}</td>
                        <td>{{ item.tahun_ajaran }}</td>
                        <td>
                            <a v-bind:class="classActive(item.status)" data-tgl="tooltip" data-placement="top" title="Aktif" v-on:click="edit(item.id)"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </aside>
        </section>
        <create :source="source"></create>
    </div>
</template>

<script>
    export default {
        name: 'TahunAjaranIndex',
        data: function(){
            return {
                model: {
                    data: []
                },
                tahun_ajaran: {
                    'id' : '',
                    'tahun_ajaran' : '',
                },
                source: 'tahun-ajaran'
            }
        },
        mounted: function() {
            $('[data-tgl="tooltip"]').tooltip();
        },
        beforeMount: function(){
            this.fetchTahun();
        },
        methods: {
            classActive: function(status){
                return (status == 1)? 'btn btn-default btn-sm btn-success': 'btn btn-default btn-sm btn-danger';
            },
            fetchTahun: function(){
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
            buildURL: function(){
                return `${this.source}`;
            },
            create: function(){
                var vm = this;
                axios.get(`${this.source}`+'/create').then(function(res){
                    Vue.set(vm.$data, 'tahun_ajaran', res.data.data);
                    $("#form-create").modal("show");
                }).catch(function(e){
                    console.log(e);
                });
            },
            edit: function(id){
                var vm = this;
                axios.get(`${this.source}`+'/'+id).then(function(res){
                    Vue.set(vm.$data, 'tahun_ajaran', res.data.data);
                    axios.put('tahun-ajaran/'+id)
                            .then(function(res){
                                if(res.data.saved){
                                    vm.fetchTahun();
                                }
                            })
                            .catch(function(e){
                                console.log(e);
                            });
                }).catch(function(e){
                    console.log(e);
                });

            },
        }
    }
</script>