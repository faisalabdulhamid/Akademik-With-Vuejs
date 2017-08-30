<template>
    <section class="modal" tabindex="-1" role="dialog" id="form-show" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <h4 class="modal-title">Data Diri Peserta Didik</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ kelas.kelas }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'KelasShow',
        props: ['kelas'],
    }
</script>