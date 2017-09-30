<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-create" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog" role="document">
            <div class="modal-content">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <!--<h4 class="modal-title">Form Tambah Kelas</h4>-->
                </div>
                <form class="form-horizontal" role="form" @submit.prevent="simpan">
                    <div class="modal-body">
                        <form-wizard @on-complete="simpan"
                                     title="Form Tambah Kelas"
                                     subtitle=""
                                     color="#636b6f"
                                     finish-button-text="Simpan"
                                     back-button-text="Kembali"
                                     next-button-text="Lanjut">
                            <tab-content title="Data Kelas" icon="fa fa-university" :before-change="validateDataKelas">
                                <a class="btn btn-default" v-on:click="coba2">Coba</a>
                                <vue-form-generator :model="model"
                                                    :schema="KelasSchema"
                                                    :options="formOptions"
                                                    ref="KelasTabForm">
                                </vue-form-generator>
                            </tab-content>
                            <tab-content title="Data Siswa" icon="fa fa-users">
                                <!--<vue-form-generator :model="model"-->
                                                    <!--:schema="SiswaSchema"-->
                                                    <!--:options="formOptions"-->
                                                    <!--ref="SiswaTabForm">-->
                                <!--</vue-form-generator>-->
                                <a class="btn btn-default btn-sm" v-on:click="showModalSiswa()"><i class="fa fa-user-plus"></i> </a>
                                <br/>
                                <br/>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="no">No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>10112671</td>
                                        <td>Faisal Abdul Hamid</td>
                                        <td>
                                            <a class="btn btn-default btn-xs"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </tab-content>
                            <tab-content title="Data Matapelajaran" icon="fa fa-book">
                                <!--<vue-form-generator :model="model"-->
                                                    <!--:schema="MapelSchema"-->
                                                    <!--:options="formOptions"-->
                                                    <!--ref="MapelTabForm">-->
                                <!--</vue-form-generator>-->
                                <a class="btn btn-default btn-sm" v-on:click="showModalMapel()"><i class="fa fa-plus"></i> </a>
                                <br/>
                                <br/>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="no">No</th>
                                        <th>Jenis</th>
                                        <th>Matapelajaran</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>10112671</td>
                                        <td>Faisal Abdul Hamid</td>
                                        <td>
                                            <a class="btn btn-default btn-xs"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </tab-content>
                        </form-wizard>
                    </div>
                </form>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->

</template>

<script>
    export default {
        name: 'KelasCreate',
        props: ['form', 'source', 'method'],
        data: function(){
            var vm = this;
            return {
                kelas: {
                    data: []
                },
                waliKelas: {
                    data: []
                },
                model: {
                    //Form1 {KELAS}
                    kelas: '',
                    wali_kelas: '',
                    //Form2 {SISWA}
                    siswa: [],
                    //Form3 {MAPEL}
                    mapel: []
                },
                formOptions: {
                    validationErrorClass: "has-error",
                    validationSuccessClass: "has-success",
                    validateAfterChanged: true
                },
                KelasSchema: {
                    fields: [
                        {
                            type: "input",
                            inputType: "text",
                            label: "Kelas",
                            model: "kelas",
                            required:true,
                            validator: ['string'],
                        },
                        {
                            type: "select",
                            label: "Wali Kelas",
                            model: "wali_kelas",
                            required:true,
                            values: ()=>{
                                console.log(vm.waliKelas.data);
                                return vm.waliKelas.data;
//                                var value = function(){
//                                    return new Promise((resolve, reject)=>{
//                                        $.ajax({
//                                                async: false,
//                                                url: 'wali-kelas',
//                                                success: function(re){
//                                                    var select = JSON.parse(re);
//                                                    resolve(select.data);
//                                                }, error: function(e){
//                                                    reject(e);
//                                                }
//                                            });
//                                    })
//                                };
////                                var arr = [];
////                                console.log(Promise.resolve(arr))
////
//                                return value().then((val)=>{
//                                            return val;
//                                        });

                            },
                            validator: ['string'],
                        },
                    ]
                },
                SiswaSchema: {
                    fields: [
                        {
                            type: "input",
                            inputType: "text",
                            label: "Nama",
                            model: "nama",
                            required:true,
                            validator: ['string'],
                        },
                    ]
                },
                MapelSchema: {
                    fields: [
                        {
                            type: "input",
                            inputType: "text",
                            label: "Nama",
                            model: "nama",
                            required:true,
                            validator: ['string'],
                        },
                    ]
                }
            }
        },
        mounted: function(){
            console.log("Mounted");
//            $('.wizard-header').hide();
        },
        updated: function(){
            console.log("Upt");
            this.fetchWalikelas();
        },
        created: function(){
            console.log("Created");
            this.fetchWalikelas();
        },
        beforeDestroy: function(){
            console.log("beforeDestroy");
            this.fetchWalikelas();
        },
        ready: function(){
            console.log("Ready");
//            this.fetchWalikelas();
            $('#form-create').on('shown', function(){
                this.fetchWalikelas();
            });
        },
        beforeMount: function(){
            console.log("BeforeMount");
//            this.fetchWalikelas();
            $('#form-create').on('shown', function(){
                this.fetchWalikelas();
            });
        },
        methods: {
            fetchWalikelas: function(){
                var vm = this;
                axios.get('wali-kelas')
                        .then(function(res){
                            Vue.set(vm.$data, 'waliKelas', res.data);
                        })
                        .catch(function(e){
                            toastr.error(e);
                        });
            },
            validateDataKelas: function(){
                return this.$refs.KelasTabForm.validate();
            },
            validateDataSiswa: function(){
//                return this.$refs.SiswaTabForm.validate();
            },
            simpan: function(){
                this.$validator.validateAll().then((result)=>{
                    if(result){
                        var vm = this;
                        axios.post(this.source, this.form)
                                .then(function(res){
                                    if(res.data.saved){
                                        $('#form-create').modal('hide');
                                        toastr.success(res.data.message);
                                        vm.method();
                                    }

                                })
                                .catch(function(e){
                                    toastr.error(e);
                                });
                    }
                });
            },
            coba: function(){
                var isTrue = true;
                return new Promise((resolve, reject)=>{
                            $.ajax({
                                    async: false,
                                    url: 'wali-kelas',
                                    success: function(re){
                                        resolve(re);
                                    }, error: function(e){
                                        reject(e);
                                    }
                                });
                    })
            },
            coba2: function(){
                console.log(this.coba());
            },
            showModalSiswa: function(){
                $("#modal-siswa").modal("show");
            },
            showModalMapel: function(){
                $("#modal-mapel").modal("show");
            }
        },
    }


</script>