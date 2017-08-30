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
                        <form-wizard @on-complete="simpan" >
                            <tab-content title="Data Diri" icon="fa fa-graduation-cap">
                                <div :class="{ 'form-group form-group-sm': true, 'has-error': errors.has('nis') }">
                                    <label class="control-label col-md-3">
                                        NIS
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.nis" name="nis" v-validate="'required|numeric'" data-vv-delay="500">
                                        <span v-show="errors.has('nis')" class="help-block">{{ errors.first('nis') }}</span>
                                    </div>
                                </div>
                                <div :class="{ 'form-group form-group-sm': true, 'has-error': errors.has('nis') }">
                                    <label class="control-label col-md-3">
                                        NISN
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.nisn" name="nis" v-validate="'required|numeric'" data-vv-delay="500">
                                        <span v-show="errors.has('nis')" class="help-block">{{ errors.first('nis') }}</span>
                                    </div>
                                </div>
                                <div :class="{ 'form-group form-group-sm': true, 'has-error': errors.has('nama') }">
                                    <label class="control-label col-md-3">
                                        Nama Peserta Didik
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.nama"  name="nama" v-validate="'required'" data-vv-delay="500">
                                        <span v-show="errors.has('nama')" class="help-block">{{ errors.first('nama') }}</span>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Jenis Kelamin
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="siswa.jenis_kelamin" name="jenis_kelamin">
                                            <option value="">Pilih</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Tempat Lahir
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.tempat_lahir" name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Tanggal Lahir
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.tanggal_lahir" name="tanggal_lahir" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Agama
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="siswa.agama" name="agama">
                                            <option value="">Pilih</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Khatolik">Khatolik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Anak Ke
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.anak_ke" name="anak_ke">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Status Keluarga
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="siswa.status_keluarga" name="status_keluarga">
                                            <option value="">Pilih</option>
                                            <option value="Anak Kandung">Anak Kandung</option>
                                            <option value="Anak Angkat">Anak Angkat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Alamat
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" v-model="siswa.alamat">
                                        </textarea>
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Data Sekolah" icon="fa fa-university">
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Diterima Grade
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="siswa.diterima_grade">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Diterima Tanggal
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.diterima_tanggal" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Asal Sekolah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.asal_sekolah" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Tahun Ijazah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.tahun_ijazah">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nomor Ijazah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.nomor_ijazah">
                                    </div>
                                </div>
                            </tab-content>
                            <tab-content title="Data Wali" icon="fa fa-user">
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama Ayah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.ayah">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Pekerjaan Ayah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.pekerjaan_ayah">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Telepon Ayah
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.telepon_ayah">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama Ibu
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.ibu">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Pekerjaan Ibu
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.pekerjaan_ibu">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Telepon Ibu
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.telepon_ibu">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Alamat
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" v-model="siswa.alamat_orang_tua"></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama Wali
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.wali">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Pekerjaan Wali
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.pekerjaan_wali">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Telepon Wali
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" v-model="siswa.telepon_wali">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Alamat Wali
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" v-model="siswa.alamat_wali"></textarea>
                                    </div>
                                </div>
                            </tab-content>
                        </form-wizard>
                    </div>
                </form>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    import {FormWizard, TabContent} from 'vue-form-wizard';
    import 'vue-form-wizard/dist/vue-form-wizard.min.css';


    export default {
        name: 'SiswaEdit',
        props: ['siswa'],
        data: function(){
            return {
                model:{
                    nis:'',
                    nama:'',
                    jenis_kelamin:'',
                },
                formOptions: {
                    validationErrorClass: "has-error",
                    validationSuccessClass: "has-success",
                    validateAfterChanged: true
                },
            }
        },
        mounted: function(){
            $('.wizard-header').hide();
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
        components: {
            FormWizard, TabContent,
        }
    }
</script>