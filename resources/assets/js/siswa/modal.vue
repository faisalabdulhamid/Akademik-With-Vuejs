<template>
    <!-- Modal -->
    <section class="modal" tabindex="-1" role="dialog" id="form-modal" data-backdrop="static" data-keyboard="false">
        <aside class="modal-dialog" role="document">
            <modal-content :title="title"></modal-content>
        </aside><!-- /.modal-dialog -->
    </section><!-- /.modal -->
</template>

<script>
    export default {
        name: 'ModalSiswa',
        props: ['title'],
        data: function(){
            return {
                model: {
                    data: []
                }
            }
        },
    }
</script>