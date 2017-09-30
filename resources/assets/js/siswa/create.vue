<template>
    <section class="modal" role="dialog" id="form-create" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="clearData"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>

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
                    nis: '',
                    nisn: '',
                    nama: '',
                    jenis_kelamin: '',
                    tempat_lahir: '',
                    tanggal_lahir: '',
                    agama: '',
                    anak_ke: '',
                    status_keluarga: '',
                    alamat: '',
                    telepon: '',
                    email: '',

                    diterima_grade: '',
                    diterima_tanggal: '',
                    asal_sekolah: '',
                    tahun_ijazah: '',
                    nomor_ijazah: '',

                    ayah: '',
                    telepon_ayah: '',
                    pendidikan_ayah: '',
                    pekerjaan_ayah: '',
                    ibu: '',
                    telepon_ibu: '',
                    pendidikan_ibu: '',
                    pekerjaan_ibu: '',
                    alamat_orang_tua: '',
                    telepon_wali: '',
                    wali: '',
                    pendidikan_wali: '',
                    pekerjaan_wali: '',
                    alamat_wali: '',
                }
            }
        },
        methods: {
            validateDataDiri: function(){
                return true//this.$refs.dataDiri.validate();
            },
            validateDataSekolah: function(){
                return true//this.$refs.dataSekolah.validate();
            },
            validateDataWali: function(){
                return true//this.$refs.dataWali.validate();
            },
            simpan: function(){

            },
            clearData: function(){
                this.$refs.dataDiri.clearData()
                this.$refs.dataDiri.clearErrors()
            }
        },
        components: {
            'form-siswa': form_siswa,
            'form-wali': form_wali,
            'form-sekolah': form_sekolah,
            'form-informasi': form_informasi,
        }
    }
</script>