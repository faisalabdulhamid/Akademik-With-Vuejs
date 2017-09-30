<template>
    <section class="modal modal-tambah" tabindex="-1" role="dialog" id="modal-siswa" data-backdrop="static" data-keyboard="false" style="z-index: 1060">
        <aside class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <h4 class="modal-title">Daftar Siswa</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" >
                            <option>Pilih</option>
                        </select>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="no">#</th>
                            <th>NIS</th>
                            <th>Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" name=""></td>
                            <td>10112671</td>
                            <td>Faisal Abdul Hamid</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default">Submit</button>
                </div>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>
<script>
    export default {
        name: "ModalSiswa",
//        props: ['form', 'source', 'method'],
        data: function(){
            return {}
        }
    }
</script>