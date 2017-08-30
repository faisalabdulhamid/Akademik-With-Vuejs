<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-create" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <h4 class="modal-title">Form Tambah Kelas</h4>
                </div>
                <form class="form-horizontal" role="form" @submit.prevent="simpan">
                    <div class="modal-body">
                        <div :class="{ 'form-group form-group-sm': true, 'has-error': errors.has('kelas') }">
                            <label class="control-label col-md-3">Kelas</label>
                            <div class="col-md-9">
                                <input class="form-control" v-model="form.kelas" name="kelas" v-validate="'required'">
                                <span v-show="errors.has('kelas')" class="help-block">{{ errors.first('kelas') }}</span>
                            </div>
                        </div>
                        <div :class="{ 'form-group form-group-sm': true, 'has-error': errors.has('wali_kelas') }">
                            <label class="control-label col-md-3">Wali Kelas</label>
                            <div class="col-md-9">
                                <select class="form-control js-example-basic-single" v-model="form.wali_kelas" name="wali_kelas" id="wali_kelas" v-validate="'required'">
                                    <option value="">Pilih</option>
                                    <option v-for="item in waliKelas.data" :value="item.nip">{{ item.nama }}</option>
                                </select>
                                <span v-show="errors.has('wali_kelas')" class="help-block">{{ errors.first('wali_kelas') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'KelasCreate',
        props: ['form', 'source', 'method'],
        data: function(){
            return {
                kelas: {
                    data: []
                },
                waliKelas: {
                    data: []
                },

            }
        },
        mounted: function(){
//            Belum Jalan
//            $('#wali_kelas').select2();
        },
        created: function(){

        },
        beforeMount: function(){
            this.fetchWalikelas();
        },
        methods: {
            fetchWalikelas: function(){
                var vm = this;
                axios.get('wali-kelas')
                        .then(function(res){
                            Vue.set(vm.$data, 'waliKelas', res.data);
                        })
                        .catch(function(e){
                            toastr.error(e);
                        });
            },
            simpan: function(){
                this.$validator.validateAll().then((result)=>{
                    if(result){
                        var vm = this;
                        axios.post(this.source, this.form)
                                .then(function(res){
                                    if(res.data.saved){
                                        $('#form-create').modal('hide');
                                        toastr.success(res.data.message);
                                        vm.method();
                                    }

                                })
                                .catch(function(e){
                                    toastr.error(e);
                                });
                    }
                });
            },
        },
    }


</script>