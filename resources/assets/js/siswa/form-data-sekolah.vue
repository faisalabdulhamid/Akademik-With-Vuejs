<template>
    <div class="form-horizontal">

        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('diterima_grade')}">
            <label class="control-label col-md-3">Diterima Dikelas</label>
            <div class="col-md-9">
                <select type="text" name="diterima_grade" class="form-control" v-model="diterima_grade">
                    <option value="">Pilih</option>
                    <option v-for="item in grade" :value="item.id">{{ item.grade }}</option>
                </select>
                <span v-show="errors.has('diterima_grade')" class="help-block">{{ errors.first('diterima_grade') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('diterima_tanggal')}">
            <label class="control-label col-md-3">Diterima Tanggal</label>
            <div class="col-md-9">
                <div class="input-group date" id="diterima_tanggal">
                    <input type="text" name="diterima_tanggal" class="form-control" v-model="diterima_tanggal">
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
                <span v-show="errors.has('diterima_tanggal')" class="help-block">{{ errors.first('diterima_tanggal') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('asal_sekolah')}">
            <label class="control-label col-md-3">Asal Sekolah</label>
            <div class="col-md-9">
                <input type="text" name="asal_sekolah" class="form-control" v-model="asal_sekolah" @input="asal_sekolah=$event.target.value.toUpperCase()">
                <span v-show="errors.has('asal_sekolah')" class="help-block">{{ errors.first('asal_sekolah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('tahun_ijazah')}">
            <label class="control-label col-md-3">Tahun Ijazah</label>
            <div class="col-md-9">
                <div class="input-group date" id="tahun_ijazah">
                    <input type="text" name="tahun_ijazah" class="form-control" v-model="tahun_ijazah">
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
                <span v-show="errors.has('tahun_ijazah')" class="help-block">{{ errors.first('tahun_ijazah') }}</span>
            </div>
        </div>
        <div :class="{'form-group form-group-sm': true, 'has-error': errors.has('nomor_ijazah')}">
            <label class="control-label col-md-3">Nomor Ijazah</label>
            <div class="col-md-9">
                <input type="text" name="nomor_ijazah" class="form-control" v-model="nomor_ijazah" @input="nomor_ijazah=$event.target.value.toUpperCase()">
                <span v-show="errors.has('nomor_ijazah')" class="help-block">{{ errors.first('nomor_ijazah') }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { Validator } from 'vee-validate';

    export default {
        props: ['model'],
        name: "FormSekolah",
        data: function(){
            return{
                diterima_grade: '',
                diterima_tanggal: '',
                asal_sekolah: '',
                tahun_ijazah: '',
                nomor_ijazah: '',
                errors: null,
                grade:[]
            }
        },
        watch: {
            diterima_grade(value){
                this.validator.validate('diterima_grade', value);
            },
            diterima_tanggal(value){
                this.validator.validate('diterima_tanggal', value);
            },
            asal_sekolah(value){
                this.validator.validate('asal_sekolah', value);
            },
            tahun_ijazah(value){
                this.validator.validate('tahun_ijazah', value);
            },
            nomor_ijazah(value){
                this.validator.validate('nomor_ijazah', value);
            },
            telepon(value){
                this.validator.validate('telepon', value);
            },
        },
        methods: {
            validate: function(){
                this.validator.validateAll({
                    diterima_grade: this.diterima_grade,
                    diterima_tanggal: this.diterima_tanggal,
                    asal_sekolah: this.asal_sekolah,
                    tahun_ijazah: this.tahun_ijazah,
                    nomor_ijazah: this.nomor_ijazah,
                });

                this.model.diterima_grade = this.diterima_grade;
                this.model.diterima_tanggal = this.diterima_tanggal;
                this.model.asal_sekolah = this.asal_sekolah;
                this.model.tahun_ijazah = this.tahun_ijazah;
                this.model.nomor_ijazah = this.nomor_ijazah;

                let isValid = this.errors.items.length;
                if(isValid == 0)
                {
                    return true;
                }
                return false;
            },
            clearErrors() {
                this.errors.clear();
            },
            fecthData(){
                var vm = this;
                axios.get('api/grade')
                        .then(function(res){
                            Vue.set(vm.$data, 'grade', res.data);
                        })
                        .catch(function(e){
                            toastr.error(e);
                        })
            }
        },
        created() {
            this.validator = new Validator({
                diterima_grade: '',
                diterima_tanggal: 'date_format:DD-MM-YYYY',
                asal_sekolah: 'alpha_num|alpha_spaces',
                tahun_ijazah: 'digits:4',
                nomor_ijazah: '',
            });
            this.$set(this, 'errors', this.validator.errors);

        },
        mounted(){
            this.fecthData();
            let vm = this;
            $('#diterima_tanggal').datetimepicker({
                format: 'DD-MM-YYYY'
            }).on('dp.change', function(e){
                vm.diterima_tanggal = e.date.format('DD-MM-YYYY');
            });
            $('#tahun_ijazah').datetimepicker({
                viewMode: 'years',
                format: 'YYYY'
            }).on('dp.change', function(e){
                vm.tahun_ijazah = e.date.format('YYYY');
            });
        }
    }
</script>