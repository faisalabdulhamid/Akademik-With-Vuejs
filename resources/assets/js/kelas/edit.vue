<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-edit" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Form Ubah Siswa</h4>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="modal-body">

                    </div>
                </form>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>

    export default {
        name: 'KelasEdit',
        props: ['kelas'],
        data: function(){
            return {
                model:{
                    kelas:'',
                    wali_kelas:'',
                },
                formOptions: {
                    validationErrorClass: "has-error",
                    validationSuccessClass: "has-success",
                    validateAfterChanged: true
                },
            }
        },
        mounted: function(){

        },
        methods: {
            simpan: function(){
                this.$validator.validateAll().then((result)=>{
                    if(result){
                        toastr.success(result);
                    }

                });
                toastr.error("Data Ada Yang Kosng");
            },
        },
    }
</script>