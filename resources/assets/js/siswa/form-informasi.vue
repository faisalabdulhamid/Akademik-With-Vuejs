<template>
    <div class="form-informasi">
        <h5>CATATAN PRESTASI</h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="info-no">No</th>
                <th class="jenis-prestasi">Jenis Prestasi</th>
                <th class="jenis-prestasi">Tingkat</th>
                <th>Nama Prestasi</th>
                <th class="tahun">Tahun</th>
                <th>Penyelenggara</th>
                <th class="act"><a class="btn btn-default btn-sm" @click.stop="addPrestasi()"><i class="fa fa-plus"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, idx) in prestasi">
                <td>{{idx+1}}</td>
                <td>
                    <select class="form-control input-sm" v-model="item.jenis_prestasi" v-on:change="changePrestasiJenis(idx, item.jenis_prestasi)">
                        <option>Sains</option>
                        <option>Seni</option>
                        <option>Olahraga</option>
                        <option>Lain-lain</option>
                    </select>
                </td>
                <td>
                    <select class="form-control input-sm" v-model="item.tingkat" v-on:change="changePrestasiTingkat(idx, item.tingkat)">
                        <option>Sekolah</option>
                        <option>Kecamatan</option>
                        <option>Kab/Kota</option>
                        <option>Nasional</option>
                        <option>Internasional</option>
                    </select>
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.nama" v-on:change="changePrestasiNama(idx, item.nama)">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.tahun" name="tahun_prestasi" v-on:change="changePrestasiTahun(idx, item.tahun)">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.penyelenggara" v-on:change="changePrestasiPenyelenggara(idx, item.penyelenggara)">
                </td>
                <td>
                    <a class="btn btn-default btn-sm" @click.stop="removePrestasi(idx)"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <h5>BEASISWA</h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="info-no">No</th>
                <th class="jenis">Jenis</th>
                <th>Penyelengara</th>
                <th class="tahun">Tahun Mulai</th>
                <th class="tahun">Tahun Selesai</th>
                <th class="act">
                    <a class="btn btn-default btn-sm" @click.stop="addBeasiswa()"><i class="fa fa-plus"></i></a>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, idx) in beasiswa">
                <td>
                    {{idx+1}}
                </td>
                <td>
                    <select class="form-control input-sm" v-model="item.jenis" v-on:change="changeBeasiswaJenis(idx, item.jenis)">
                        <option>Anak Berprestasi</option>
                        <option>Anak Miskin</option>
                        <option>Pendidikan</option>
                        <option>Unggulan</option>
                        <option>Lainya</option>
                    </select>
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.penyelenggara" v-on:change="changeBeasiswaPenyelenggara(idx, item.penyelenggara)">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.tahun_mulai" id="tahun-mulai" name="tahun_mulai" v-on:change="changeBeasiswaTahunMulai(idx, item.tahun_mulai)">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.tahun_selesai" id="tahun-selesai" name="tahun_selesai" v-on:change="changeBeasiswaTahunSelesai(idx, item.tahun_selesai)">
                </td>
                <td>
                    <a class="btn btn-default btn-sm" @click.stop="removeBesiswa(idx)"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
        name: 'FormInformasi',
        data: function(){
            return {
                prestasi: [
//                    {
//                        jenis_prestasi: 'Sains',
//                        tingkat: 'Sekolah',
//                        nama: '',
//                        tahun: '',
//                        penyelenggara: ''
//                    }
                ],
                beasiswa:[
//                    {
//                        jenis: 'Anak Berprestasi',
//                        penyelengara: '',
//                        tahun_mulai: '',
//                        tahun_selesai: '',
//                    },
                ]
            }
        },
        methods:{
            addPrestasi: function(){
                this.prestasi.push({
                    jenis_prestasi: 'Sains',
                    tingkat: 'Sekolah',
                    nama: '',
                    tahun: '',
                    penyelenggara: ''
                });
            },
            removePrestasi: function(idx){
                this.prestasi.splice(idx, 1);
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            addBeasiswa: function(){
                this.beasiswa.push({
                    jenis: 'Anak Berprestasi',
                    penyelenggara: '',
                    tahun_mulai: '',
                    tahun_selesai: '',
                });
            },
            removeBesiswa: function(idx){
                this.beasiswa.splice(idx, 1);
                let strJson = JSON.stringify(this.beasiswa);
                this.$store.commit('updateValue', {field: 'beasiswa', value:strJson})
            },
            changePrestasiJenis: function(idx, value){
                this.prestasi[idx].jenis_prestasi = value;
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            changePrestasiTingkat: function(idx, value){
                this.prestasi[idx].tingkat = value;
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            changePrestasiNama: function(idx, value){
                this.prestasi[idx].nama = value;
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            changePrestasiTahun: function(idx, value){
                this.prestasi[idx].tahun = value;
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            changePrestasiPenyelenggara: function(idx, value){
                this.prestasi[idx].penyelenggara = value;
                let strJson = JSON.stringify(this.prestasi);
                this.$store.commit('updateValue', {field: 'prestasi', value:strJson})
            },
            changeBeasiswaJenis: function(idx, value){
                this.beasiswa[idx].jenis = value;
                let strJson = JSON.stringify(this.beasiswa);
                this.$store.commit('updateValue', {field: 'beasiswa', value:strJson})
            },
            changeBeasiswaPenyelenggara: function(idx, value){
                this.beasiswa[idx].penyelenggara = value;
                let strJson = JSON.stringify(this.beasiswa);
                this.$store.commit('updateValue', {field: 'beasiswa', value:strJson})
            },
            changeBeasiswaTahunMulai: function(idx, value){
                this.beasiswa[idx].tahun_mulai = value;
                let strJson = JSON.stringify(this.beasiswa);
                this.$store.commit('updateValue', {field: 'beasiswa', value:strJson})
            },
            changeBeasiswaTahunSelesai: function(idx, value){
                this.beasiswa[idx].tahun_selesai = value;
                let strJson = JSON.stringify(this.beasiswa);
                this.$store.commit('updateValue', {field: 'beasiswa', value:strJson})
            },
            getDataPrestasi: function(){
                let strPrestasi = this.$parent.$store.getters.siswa.prestasi;
                if(strPrestasi != ''){
                    let prestasiObj = JSON.parse(strPrestasi);
                    this.prestasi = prestasiObj;
                    console.log(prestasiObj)
                }

            },
            getDataBeasiswa: function(){
                let strBeasiswa = this.$parent.$store.getters.siswa.beasiswa;
                console.log(strBeasiswa)
                if(strBeasiswa != ''){
                    let besiswaObj = JSON.parse(strBeasiswa);
                    this.beasiswa = besiswaObj;
                }
            }

        },
        mounted: {

        },
        beforeMount: function(){

        },
        created: function(){

        }
    }
</script>

<style lang="scss" scoped>
    .form-informasi{
        h5{
            font-weight: bold;
        }
        .info-no{
            width: 30px;
        }
        .tahun{
            width: 70px;
        }
        .jenis-prestasi{
            width: 120px;
        }
        .jenis{
            width: 150px;
        }
        .act{
            width: 50px;
        }
    }
</style>