<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-show" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Informasi Kelas</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-justified tabs-nav" role="tablist">
                        <li role="presentation" class="active"><a href="#kelas" aria-controls="kelas" role="tab" data-toggle="tab">
                            <div class="tab-icon-circle">
                                <div class="tab-icon-container">
                                    <i class="tab-icon fa fa-university"></i>
                                </div>
                            </div>
                            <span>Kelas</span>
                        </a></li>
                        <li role="presentation"><a href="#siswa" aria-controls="siswa" role="tab" data-toggle="tab">
                            <div class="tab-icon-circle">
                                <div class="tab-icon-container">
                                    <i class="tab-icon fa fa-users"></i>
                                </div>
                            </div>
                            <span>Siswa</span>
                        </a></li>
                        <li role="presentation"><a href="#mapel" aria-controls="mapel" role="tab" data-toggle="tab">
                            <div class="tab-icon-circle">
                                <div class="tab-icon-container">
                                    <i class="tab-icon fa fa-book"></i>
                                </div>
                            </div>
                            <span>Matapelajaran</span>
                        </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="kelas">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Kelas</td>
                                    <td class="no">:</td>
                                    <td>AKAKA</td>
                                </tr>
                                <tr>
                                    <td>Walikelas</td>
                                    <td>:</td>
                                    <td>AKAKA</td>
                                </tr>
                                <tr>
                                    <td>Ketua Kelas</td>
                                    <td>:</td>
                                    <td>AKAKA</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="siswa">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="no">No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="(item, index) in model.siswa">
                                    <td>{{ index+1 }}</td>
                                    <td>10112671</td>
                                    <td>Faisal Abdul Hamid</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="mapel">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="no">No</th>
                                    <th>Jenis</th>
                                    <th>Mapel</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="(item, index) in model.mapel">
                                    <td>{{ index+1 }}</td>
                                    <td>10112671</td>
                                    <td>Faisal Abdul Hamid</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'KelasShow',
        props: ['kelas'],
        data: function(){
            return {
                'model': {
                    'kelas': [],
                    'siswa': [],
                    'mapel': []
                }
            }
        },
        mounted: function(){
//            console.log(this.kelas)
        }
    }
</script>