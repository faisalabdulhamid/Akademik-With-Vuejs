<template>
    <div class="form-horizontal">
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('ayah')}">
            <label class="control-label col-md-3">Ayah</label>
            <div class="col-md-9">
                <input type="text" name="ayah" class="form-control" v-model="ayah" @input="ayah=$event.target.value.toUpperCase()">
                <span v-show="errors.has('ayah')" class="help-block">{{ errors.first('ayah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('telepon_ayah')}">
            <label class="control-label col-md-3">Telepon Ayah</label>
            <div class="col-md-9">
                <input type="text" name="telepon_ayah" class="form-control" v-model="telepon_ayah">
                <span v-show="errors.has('telepon_ayah')" class="help-block">{{ errors.first('telepon_ayah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pendidikan_ayah')}">
            <label class="control-label col-md-3">Pendidikan Ayah</label>
            <div class="col-md-9">
                <select name="pendidikan_ayah" class="form-control" v-model="pendidikan_ayah" id="pendidikan_ayah" style="width: 100%">
                    <option value="">Pilih</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">Strata I (S1)</option>
                    <option value="S2">Strata II (S2)</option>
                    <option value="S3">Starta III (S3)</option>
                </select>
                <span v-show="errors.has('pendidikan_ayah')" class="help-block">{{ errors.first('pendidikan_ayah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pekerjaan_ayah')}">
            <label class="control-label col-md-3">Pekerjaan Ayah</label>
            <div class="col-md-9">
                <select name="pekerjaan_ayah" class="form-control" v-model="pekerjaan_ayah" style="width: 100%"></select>
                <span v-show="errors.has('pekerjaan_ayah')" class="help-block">{{ errors.first('pekerjaan_ayah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('ibu')}">
            <label class="control-label col-md-3">ibu</label>
            <div class="col-md-9">
                <input type="text" name="ibu" class="form-control" v-model="ibu" @input="ibu=$event.target.value.toUpperCase()">
                <span v-show="errors.has('ibu')" class="help-block">{{ errors.first('ibu') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('telepon_ibu')}">
            <label class="control-label col-md-3">Telepon Ibu</label>
            <div class="col-md-9">
                <input type="text" name="telepon_ibu" class="form-control" v-model="telepon_ibu">
                <span v-show="errors.has('telepon_ibu')" class="help-block">{{ errors.first('telepon_ibu') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pendidikan_ibu')}">
            <label class="control-label col-md-3">Pendidikan Ibu</label>
            <div class="col-md-9">
                <select name="pendidikan_ibu" class="form-control" v-model="pendidikan_ibu" style="width: 100%">
                    <option value="">Pilih</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">Strata I (S1)</option>
                    <option value="S2">Strata II (S2)</option>
                    <option value="S3">Starta III (S3)</option>
                </select>
                <span v-show="errors.has('pendidikan_ibu')" class="help-block">{{ errors.first('pendidikan_ibu') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pekerjaan_ibu')}">
            <label class="control-label col-md-3">Pekerjaan Ibu</label>
            <div class="col-md-9">
                <select name="pekerjaan_ibu" class="form-control" v-model="pekerjaan_ibu" style="width: 100%"></select>
                <span v-show="errors.has('pekerjaan_ibu')" class="help-block">{{ errors.first('pekerjaan_ibu') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('alamat_orang_tua')}">
            <label class="control-label col-md-3">Alamat Orang Tua</label>
            <div class="col-md-9">
                <textarea type="text" name="alamat_orang_tua" class="form-control" v-model="alamat_orang_tua" @input="alamat_orang_tua=$event.target.value.toUpperCase()"></textarea>
                <span v-show="errors.has('alamat_orang_tua')" class="help-block">{{ errors.first('alamat_orang_tua') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('wali')}">
            <label class="control-label col-md-3">Wali</label>
            <div class="col-md-9">
                <input type="text" name="wali" class="form-control" v-model="wali" @input="wali=$event.target.value.toUpperCase()">
                <span v-show="errors.has('wali')" class="help-block">{{ errors.first('wali') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('telepon_wali')}">
            <label class="control-label col-md-3">Telepon Wali</label>
            <div class="col-md-9">
                <input type="text" name="telepon_wali" class="form-control" v-model="telepon_wali">
                <span v-show="errors.has('telepon_wali')" class="help-block">{{ errors.first('telepon_wali') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pendidikan_wali')}">
            <label class="control-label col-md-3">Pendidikan Wali</label>
            <div class="col-md-9">
                <select name="pendidikan_wali" class="form-control" v-model="pendidikan_wali" style="width: 100%">
                    <option value="">Pilih</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">Strata I (S1)</option>
                    <option value="S2">Strata II (S2)</option>
                    <option value="S3">Starta III (S3)</option>
                </select>
                <span v-show="errors.has('pendidikan_wali')" class="help-block">{{ errors.first('pendidikan_wali') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('pekerjaan_wali')}">
            <label class="control-label col-md-3">Pekerjaan Wali</label>
            <div class="col-md-9">
                <select name="pekerjaan_wali" class="form-control" v-model="pekerjaan_wali" style="width: 100%"></select>
                <span v-show="errors.has('pekerjaan_wali')" class="help-block">{{ errors.first('pekerjaan_wali') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('alamat_wali')}">
            <label class="control-label col-md-3">Alamat Wali</label>
            <div class="col-md-9">
                <textarea type="text" name="alamat_wali" class="form-control" v-model="alamat_wali" @input="alamat_wali=$event.target.value.toUpperCase()"></textarea>
                <span v-show="errors.has('alamat_wali')" class="help-block">{{ errors.first('alamat_wali') }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { Validator } from 'vee-validate';

    export default {
        props: ['model'],
        name: "FormWali",
        data: function(){
            return{
//                ayah: '',
//                telepon_ayah: '',
//                pendidikan_ayah: '',
//                pekerjaan_ayah: '',
//                ibu: '',
//                telepon_ibu: '',
//                pendidikan_ibu: '',
//                pekerjaan_ibu: '',
//                alamat_orang_tua: '',
//                telepon_wali: '',
//                wali: '',
//                pendidikan_wali: '',
//                pekerjaan_wali: '',
//                alamat_wali: '',
                errors: null,
            }
        },
        computed: {
            ayah: {
                get: function(){
                    return this.$store.state.Siswa.siswa.ayah
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'ayah', value})
                }
            },
            telepon_ayah: {
                get: function(){
                    return this.$store.state.Siswa.siswa.telepon_ayah
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'telepon_ayah', value})
                }
            },
            pendidikan_ayah: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pendidikan_ayah
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pendidikan_ayah', value})
                }
            },
            pekerjaan_ayah: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pekerjaan_ayah
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pekerjaan_ayah', value})
                }
            },
            ibu: {
                get: function(){
                    return this.$store.state.Siswa.siswa.ibu
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'ibu', value})
                }
            },
            telepon_ibu: {
                get: function(){
                    return this.$store.state.Siswa.siswa.telepon_ibu
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'telepon_ibu', value})
                }
            },
            pendidikan_ibu: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pendidikan_ibu
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pendidikan_ibu', value})
                }
            },
            pekerjaan_ibu: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pekerjaan_ibu
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pekerjaan_ibu', value})
                }
            },
            alamat_orang_tua: {
                get: function(){
                    return this.$store.state.Siswa.siswa.alamat_orang_tua
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'alamat_orang_tua', value})
                }
            },
            wali: {
                get: function(){
                    return this.$store.state.Siswa.siswa.wali
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'wali', value})
                }
            },
            telepon_wali: {
                get: function(){
                    return this.$store.state.Siswa.siswa.telepon_wali
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'telepon_wali', value})
                }
            },
            pendidikan_wali: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pendidikan_wali
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pendidikan_wali', value})
                }
            },
            pekerjaan_wali: {
                get: function(){
                    return this.$store.state.Siswa.siswa.pekerjaan_wali
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'pekerjaan_wali', value})
                }
            },
            alamat_wali: {
                get: function(){
                    return this.$store.state.Siswa.siswa.alamat_wali
                },
                set: function(value){
                    this.$store.commit('updateValue', {field: 'alamat_wali', value})
                }
            },
        },
        watch: {
            ayah(value){
                this.validator.validate('ayah', value);
            },
            telepon_ayah(value){
                this.validator.validate('telepon_ayah', value);
            },
            pendidikan_ayah(value){
                this.validator.validate('pendidikan_ayah', value);
            },
            pekerjaan_ayah(value){
                this.validator.validate('pekerjaan_ayah', value);
            },
            ibu(value){
                this.validator.validate('ibu', value);
            },
            telepon_ibu(value){
                this.validator.validate('telepon_ibu', value);
            },
            pendidikan_ibu(value){
                this.validator.validate('pendidikan_ibu', value);
            },
            pekerjaan_ibu(value){
                this.validator.validate('pekerjaan_ibu', value);
            },
            alamat_orang_tua(value){
                this.validator.validate('alamat_orang_tua', value);
            },
            wali(value){
                this.validator.validate('wali', value);
            },
            telepon_wali(value){
                this.validator.validate('telepon_wali', value);
            },
            pendidikan_wali(value){
                this.validator.validate('pendidikan_wali', value);
            },
            pekerjaan_wali(value){
                this.validator.validate('pekerjaan_wali', value);
            },
        },
        methods: {
            validate: function(){
                this.validator.validateAll({
                    ayah: this.ayah,
                    telepon_ayah: this.telepon_ayah,
                    pendidikan_ayah: this.pendidikan_ayah,
                    pekerjaan_ayah: this.pekerjaan_ayah,
                    ibu: this.ibu,
                    telepon_ibu: this.telepon_ibu,
                    pendidikan_ibu: this.pendidikan_ibu,
                    pekerjaan_ibu: this.pekerjaan_ibu,
                    alamat_orang_tua: this.alamat_orang_tua,
                    wali: this.wali,
                    telepon_wali: this.telepon_wali,
                    pendidikan_wali: this.pendidikan_wali,
                    pekerjaan_wali: this.pekerjaan_wali,
                });

                let isValid = this.errors.items.length;
                if(isValid == 0)
                {
                    return true;
                }
                return false;
            },
            clearErrors() {
                this.errors.clear();
            }
        },
        created() {
            this.validator = new Validator({
                ayah: 'alpha_spaces',
                telepon_ayah: 'numeric',
                pendidikan_ayah: '',
                pekerjaan_ayah: '',
                ibu: 'alpha_spaces',
                telepon_ibu: 'numeric',
                pendidikan_ibu: '',
                pekerjaan_ibu: '',
                alamat_orang_tua: '',
                wali: 'alpha_spaces',
                telepon_wali: 'numeric',
                pendidikan_wali: '',
                pekerjaan_wali: '',
                alamat_wali: '',
            });
            this.$set(this, 'errors', this.validator.errors);
        },
        mounted(){
            $('select[name*=pekerjaan]').select2({
                dropdownParent: $("#form-create"),
                placeholder: "Select Pekerjaan",
                ajax: {
                    url: 'api/pekerjaan/cari',
                    dataType: 'json',
                    data: function(params){
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data, params){
                        params.page = params.page || 1;

                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    },
                    cache: true,
                    tags: true,
//                    tokenSeparators: [",", " "],
//                    createTag: function(newTag) {
//                        return {
//                            id: 'new:' + newTag.term,
//                            text: newTag.term + ' (new)'
//                        };
//                    }
                }
            });
        }
    }
</script>

<style scoped>
    select{
        width: 100%;
    }
</style>