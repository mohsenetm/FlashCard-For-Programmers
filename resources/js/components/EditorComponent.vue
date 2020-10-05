<template>
    <div>

        <ckeditor class="col-md-10 form-control" name="text" :editor="editor" v-model="editorData"
                  :config="editorConfig"></ckeditor>

    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data() {
            return {
                editor: ClassicEditor,
                editorData: '<p>Your Post Content</p>',
                editorConfig: {},
            }
        }
    }

</script>
