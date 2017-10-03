<template>
    <section class="modal" role="dialog" id="form-create" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="clearData"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="closeModal()"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>

                <div class="modal-body">
                    <form-wizard @on-complete="simpan"
                                 color="#636b6f"
                                 title="FORM PESERTA DIDIK"
                                 subtitle=""
                                 finish-button-text="Simpan"
                                 back-button-text="Kembali"
                                 next-button-text="Lanjut">
                        <tab-content title="IDENTITAS PESERTA DIDIK" icon="fa fa-graduation-cap" :before-change="validateDataDiri">
                            <form-siswa :model="model" ref="dataDiri"></form-siswa>
                        </tab-content>
                        <tab-content title="IDENTITAS SEKOLAH" icon="fa fa-university" :before-change="validateDataSekolah">
                            <form-sekolah :model="model" ref="dataSekolah"></form-sekolah>
                        </tab-content>
                        <tab-content title="IDENTITAS WALI" icon="fa fa-user" :before-change="validateDataWali">
                            <form-wali :model="model" ref="dataWali"></form-wali>
                        </tab-content>
                        <tab-content title="INFORMASI LAIN" icon="fa fa-file-text">
                            <form-informasi :model="model" ref="dataInformasi"></form-informasi>
                        </tab-content>
                    </form-wizard>
                </div>

            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    import form_siswa from './form-data-siswa.vue';
    import form_sekolah from './form-data-sekolah.vue';
    import form_wali from './form-data-wali.vue';
    import form_informasi from './form-informasi.vue';

    export default {
        name: 'SiswaCreate',
        props: ['siswa'],
        data: function(){
            return {
                model : {

                },
                //Loading
                color: '#000',
                size: '40px',
                radius: '100%',
                loading: false,
            }
        },
        methods: {
            getSiswa: function(){
                var vm = this;
                vm.$parent.$store.dispatch('setLoadingTrue');
                axios.get('siswa/create').then(function(res){
                    vm.$parent.$store.dispatch('setSiswa', res.data.data);
                    vm.$set(vm.$data, 'model', res.data);
                    vm.$parent.$store.dispatch('setLoadingFalse');
                }).catch(function(w){
                    vm.$parent.$store.dispatch('setLoadingFalse');
                    toastr.error(w);
                });
            },
            validateDataDiri: function(){
                return this.$refs.dataDiri.validate();
            },
            validateDataSekolah: function(){
                return this.$refs.dataSekolah.validate();
            },
            validateDataWali: function(){
                this.$refs.dataInformasi.getDataPrestasi()
                this.$refs.dataInformasi.getDataBeasiswa()
                return this.$refs.dataWali.validate();
            },
            simpan: function(){
                let $data = this.$parent.$store.getters.siswa;
                var vm = this;
                vm.$parent.$store.dispatch('setLoadingTrue');
                axios.post('siswa', $data).then(function(res){
                    if(res.data.info){
                        vm.$parent.$store.dispatch('setLoadingFalse');
                        toastr.success(res.data.message);
                        vm.closeModal();
                    }
                }).catch(function(e){
                    vm.$parent.$store.dispatch('setLoadingFalse');
                    toastr.error(e);
                });
            },
            clearData: function(){
                this.$refs.dataDiri.clearData()
                this.$refs.dataDiri.clearErrors()
            },
            closeModal: function(){
                this.$router.go(-1);
                this.$parent.$store.dispatch('setSiswaNull');
                let backdrop = $(document.body).find('div.loading-backdrop');
                console.log(backdrop)
            }
        },
        beforeMount: function(){
            this.getSiswa();
        },
        components: {
            'form-siswa': form_siswa,
            'form-wali': form_wali,
            'form-sekolah': form_sekolah,
            'form-informasi': form_informasi,
        },
        ready: function(){

        },
        mounted: function(){
            $("#form-create").modal("show");
        }
    }
</script>