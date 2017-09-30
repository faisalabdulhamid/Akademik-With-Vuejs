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
                    <select class="form-control input-sm" v-model="prestasi[idx].jenis_prestasi">
                        <option>Sains</option>
                        <option>Seni</option>
                        <option>Olahraga</option>
                        <option>Lain-lain</option>
                    </select>
                </td>
                <td>
                    <select class="form-control input-sm" v-model="prestasi[idx].tingkat">
                        <option>Sekolah</option>
                        <option>Kecamatan</option>
                        <option>Kab/Kota</option>
                        <option>Nasional</option>
                        <option>Internasional</option>
                    </select>
                </td>
                <td>
                    <input class="form-control input-sm" v-model="prestasi[idx].nama">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="prestasi[idx].tahun" name="tahun_prestasi">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="prestasi[idx].penyelenggara">
                </td>
                <td>
                    <a class="btn btn-default btn-sm" @click.stop="prestasi.splice(idx, 1)"><i class="fa fa-times"></i></a>
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
                    <select class="form-control input-sm" v-model="item.jenis">
                        <option>Anak Berprestasi</option>
                        <option>Anak Miskin</option>
                        <option>Pendidikan</option>
                        <option>Unggulan</option>
                        <option>Lainya</option>
                    </select>
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.penyelengara">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.tahun_mulai" id="tahun-mulai" name="tahun_mulai">
                </td>
                <td>
                    <input class="form-control input-sm" v-model="item.tahun_selesai" id="tahun-selesai" name="tahun_selesai">
                </td>
                <td>
                    <a class="btn btn-default btn-sm" @click.stop="beasiswa.splice(idx, 1)"><i class="fa fa-times"></i></a>
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
                    {
                        jenis_prestasi: 'Sains',
                        tingkat: 'Sekolah',
                        nama: '',
                        tahun: '',
                        penyelenggara: ''
                    }
                ],
                beasiswa:[
                    {
                        jenis: 'Anak Berprestasi',
                        penyelengara: '',
                        tahun_mulai: '',
                        tahun_selesai: '',
                    },
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

            },
            addBeasiswa: function(){
                this.beasiswa.push({
                    jenis: 'Anak Berprestasi',
                    penyelengara: '',
                    tahun_mulai: '',
                    tahun_selesai: '',
                });
            },
            removeBesiswa: function(idx){

            },
        },
        mounted(){
//            $('input[name=tahun_prestasi]').datetimepicker({
//                viewMode: 'years',
//                format: 'YYYY'
//            }).on('dp.change', function(e, target){
//                console.log(e)
////                vm.tahun_ijazah = e.date.format('YYYY');
//            });
//            $('input[name=tahun_mulai]').datetimepicker({
//                viewMode: 'years',
//                format: 'YYYY'
//            }).on('dp.change', function(e){
////                vm.tahun_ijazah = e.date.format('YYYY');
//            });
//            $('input[name=tahun_selesai]').datetimepicker({
//                viewMode: 'years',
//                format: 'YYYY'
//            }).on('dp.change', function(e){
////                vm.tahun_ijazah = e.date.format('YYYY');
//            });
        }
    }
</script>

<style lang="scss">
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