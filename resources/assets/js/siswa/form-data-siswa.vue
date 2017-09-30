<template>
    <div class="form-horizontal">
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('nis')}">
            <label class="control-label col-md-3">NIS</label>
            <div class="col-md-9">
                <input type="text" name="nis" class="form-control" v-model="nis">
                <span v-show="errors.has('nis')" class="help-block">{{ errors.first('nis') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('nisn')}">
            <label class="control-label col-md-3">NISN</label>
            <div class="col-md-9">
                <input type="text" name="nisn" class="form-control" v-model="nisn">
                <span v-show="errors.has('nisn')" class="help-block">{{ errors.first('nisn') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('nama')}">
            <label class="control-label col-md-3">Nama</label>
            <div class="col-md-9">
                <input type="text" name="nama" class="form-control" v-model="nama" @input="nama=$event.target.value.toUpperCase()">
                <span v-show="errors.has('nama')" class="help-block">{{ errors.first('nama') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('jenis_kelamin')}">
            <label class="control-label col-md-3">Jenis Kelamin</label>
            <div class="col-md-9">
                <select type="text" name="jenis_kelamin" class="form-control" v-model="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <span v-show="errors.has('jenis_kelamin')" class="help-block">{{ errors.first('jenis_kelamin') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('tempat_lahir')}">
            <label class="control-label col-md-3">Tempat Lahir</label>
            <div class="col-md-9">
                <input type="text" name="tempat_lahir" class="form-control" v-model="tempat_lahir" @input="tempat_lahir=$event.target.value.toUpperCase()">
                <span v-show="errors.has('tempat_lahir')" class="help-block">{{ errors.first('tempat_lahir') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('tanggal_lahir')}">
            <label class="control-label col-md-3">Tanggal Lahir</label>
            <div class="col-md-9">
                <div class='input-group date' id="tanggal_lahir">
                    <input type='text' class="form-control" name="tanggal_lahir" v-model="tanggal_lahir"/>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
                <span v-show="errors.has('tanggal_lahir')" class="help-block">{{ errors.first('tanggal_lahir') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('agama')}">
            <label class="control-label col-md-3">Agama</label>
            <div class="col-md-9">
                <select type="text" name="agama" class="form-control" v-model="agama">
                    <option value="">Pilih</option>
                    <option value="Islam">Islam</option>
                    <option value="Khatolik">Khatolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                <span v-show="errors.has('agama')" class="help-block">{{ errors.first('agama') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('anak_ke')}">
            <label class="control-label col-md-3">Anak Ke</label>
            <div class="col-md-9">
                <input type="number" name="anak_ke" class="form-control" v-model="anak_ke">
                <span v-show="errors.has('anak_ke')" class="help-block">{{ errors.first('anak_ke') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('status_keluarga')}">
            <label class="control-label col-md-3">Status Keluarga</label>
            <div class="col-md-9">
                <select type="text" name="status_keluarga" class="form-control" v-model="status_keluarga">
                    <option value="">Pilih</option>
                    <option value="Anak Kandung">Anak Kandung</option>
                    <option value="Anak Angkat">Anak Angkat</option>
                </select>
                <span v-show="errors.has('status_keluarga')" class="help-block">{{ errors.first('status_keluarga') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('alamat')}">
            <label class="control-label col-md-3">Alamat</label>
            <div class="col-md-9">
                <input type="text" name="alamat" class="form-control" v-model="alamat" @input="alamat=$event.target.value.toUpperCase()">
                <span v-show="errors.has('alamat')" class="help-block">{{ errors.first('alamat') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('telepon')}">
            <label class="control-label col-md-3">Telepon</label>
            <div class="col-md-9">
                <input type="text" name="telepon" class="form-control" v-model="telepon">
                <span v-show="errors.has('telepon')" class="help-block">{{ errors.first('telepon') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('email')}">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control" v-model="email" @input="email=$event.target.value.toLowerCase()">
                <span v-show="errors.has('email')" class="help-block">{{ errors.first('email') }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { Validator } from 'vee-validate';

    const nisUnique = {
        getMessage(field){
            return `${field} sudah digunakan`;
        },
        validate(value){
            if(value){
                return axios.get('api/check/nis', {params: {nis: value}}).then(function(res){
                    return res.data.error;
                });
                //return true;
            }else{
                return false;
            }
        }
    }

    const nisnUnique = {
        getMessage(field){
            return `${field} sudah digunakan`;
        },
        validate(value){
            if(value){
                return axios.get('api/check/nisn', {params: {nisn: value}}).then(function(res){
                    return res.data.error;
                });
                //return true;
            }else{
                return false;
            }
        }
    }

    Validator.extend('checkNis', nisUnique);
    Validator.extend('checkNisn', nisnUnique);

    export default {
        props: ['model'],
        name: 'FormSiswa',
        data: function(){
            return {
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
                errors: null,
            };
        },
        watch: {
            nis(value) {
                this.validator.validate('nis', value);
            },
            nisn(value) {
                this.validator.validate('nisn', value);
            },
            nama(value) {
                this.validator.validate('nama', value);
            },
            jenis_kelamin(value) {
                this.validator.validate('jenis_kelamin', value);
            },
            tempat_lahir(value){
                this.validator.validate('tempat_lahir', value);
            },
            tanggal_lahir(value){
                this.validator.validate('tanggal_lahir', value);
            },
            agama(value){
                this.validator.validate('agama', value);
            },
            anak_ke(value){
                this.validator.validate('anak_ke', value);
            },
            status_keluarga(value){
                this.validator.validate('status_keluarga', value);
            },
            alamat(value){
                this.validator.validate('alamat', value);
            },
            telepon(value){
                this.validator.validate('telepon', value);
            },
            email(value){
                this.validator.validate('email', value);
            },
        },
        methods: {
            validate: function(){
                this.validator.validateAll({
                    nis: this.nis,
                    nisn: this.nisn,
                    nama: this.nama,
                    jenis_kelamin: this.jenis_kelamin,
                    tempat_lahir: this.tempat_lahir,
                    tanggal_lahir: this.tanggal_lahir,
                    agama: this.agama,
                    anak_ke: this.anak_ke,
                    status_keluarga: this.status_keluarga,
                    alamat: this.alamat,
                    telepon: this.telepon,
                    email: this.email,
                });

                this.model.nis = this.nis;
                this.model.nisn = this.nisn;
                this.model.nama = this.nama;
                this.model.jenis_kelamin = this.jenis_kelamin;
                this.model.tempat_lahir = this.tempat_lahir;
                this.model.tanggal_lahir = this.tanggal_lahir;
                this.model.agama = this.agama;
                this.model.anak_ke = this.anak_ke;
                this.model.status_keluarga = this.status_keluarga;
                this.model.alamat = this.alamat;
                this.model.telepon = this.telepon;
                this.model.email = this.email;


                let isValid = this.errors.items.length;
                if(isValid == 0)
                {
                    return true;
                }
                return false;
            },
            getData: function(){
                return {
                    nis: this.nis,
                    nisn: this.nisn,
                    nama: this.nama,
                    jenis_kelamin: this.jenis_kelamin,
                    tempat_lahir: this.tempat_lahir,
                    tanggal_lahir: this.tanggal_lahir,
                    agama: this.agama,
                    anak_ke: this.anak_ke,
                    status_keluarga: this.status_keluarga,
                    alamat: this.alamat,
                    telepon: this.telepon,
                    email: this.email,
                };
            },
            clearErrors() {
                this.errors.clear();
            },
            clearData(){
                this.nis= '';
                this.nisn= '';
                this.nama= '';
                this.jenis_kelamin= '';
                this.tempat_lahir= '';
                this.tanggal_lahir= '';
                this.agama= '';
                this.anak_ke= '';
                this.status_keluarga= '';
                this.alamat= '';
                this.telepon= '';
                this.email= '';
            }
        },
        created() {
            this.validator = new Validator({
                nis: 'required|numeric|digits:9|checkNis',
                nisn: 'required|numeric|digits:10|',
                nama: 'required|alpha_spaces',
                jenis_kelamin: 'required',
                tempat_lahir: 'required|alpha_spaces',
                tanggal_lahir: 'required|date_format:DD-MM-YYYY',
                agama: 'required',
                anak_ke: 'numeric',
                status_keluarga: '',
                alamat: '',
                telepon: 'numeric',
                email: 'email',
            });
            this.$set(this, 'errors', this.validator.errors);
        },
        ready(){
//            $('#tanggal_lahir').datetimepicker();
        },
        mounted: function(){
            var vm = this;
            $('#tanggal_lahir')
                    .datetimepicker({
                        format: 'DD-MM-YYYY'
                    })
                    .on('dp.change', function(e){
                        vm.tanggal_lahir = e.date.format('DD-MM-YYYY');
                    });
        },
        components: {
//            'tanggal-lahir':
        }
    }
</script>