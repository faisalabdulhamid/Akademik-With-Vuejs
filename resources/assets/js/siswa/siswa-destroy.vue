<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-destroy" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="$router.go(-1)"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Hapus Peserta Didik</h4>
                </div>
                <div class="modal-body">
                    Apakah Yakin Akan Dihapus Peserta Didik ini?
                </div>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'SiswaDestroy',
        data: function(){
            return {
                siswa: {}
            }
        },
        mounted: function(){
            $('#form-destroy').modal('show');
        }
    }
</script>