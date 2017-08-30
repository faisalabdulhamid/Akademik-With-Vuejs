<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-create" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Form Tambah Tahun Ajaran</h4>
                </div>
                <form class="form-horizontal" role="form" @submit.prevent="simpan">
                    <div class="modal-body">
                        <div class="form-group form-group-sm">
                            <label class="control-label col-md-3">
                                Tahun Ajaran
                            </label>
                            <div class="col-md-9">
                                <input class="form-control" v-model="form.tahun_ajaran">
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
        name: 'TahunAjaranCreate',
        props: ['source'],
        data: function(){
            return {
                form: {
                    'tahun_ajaran' : ''
                }
            };
        },
        methods: {
            simpan: function(){
                axios.post(this.source, this.form).then(function(res){
                    console.log(res);
                }).catch(function(e){
                    console.log(e);
                });
                console.log(this.source)
            }
        }
    }
</script>