@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('.js-berita-form');
        const textarea = document.getElementById('editor');

        if (!form || !textarea) {
            return;
        }

        const showPlainTextarea = () => {
            textarea.style.display = 'block';
            textarea.style.visibility = 'visible';
            textarea.style.pointerEvents = 'auto';
            textarea.removeAttribute('aria-hidden');
        };

        const initTinyMce = () => {
            if (typeof tinymce === 'undefined') {
                showPlainTextarea();
                return;
            }

            tinymce.remove('#editor');
            tinymce.init({
                selector: '#editor',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline | link image media table | align lineheight | numlist bullist indent outdent | removeformat',
                height: 400,
                menubar: false,
                branding: false,
                setup: (editor) => {
                    editor.on('init', () => {
                        const isReadOnly = editor.mode && typeof editor.mode.isReadOnly === 'function'
                            ? editor.mode.isReadOnly()
                            : editor.getBody()?.getAttribute('contenteditable') === 'false';

                        if (isReadOnly) {
                            editor.remove();
                            showPlainTextarea();
                        }
                    });

                    editor.on('change keyup undo redo', () => {
                        editor.save();
                    });
                },
            });
        };

        initTinyMce();

        form.addEventListener('submit', () => {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
        });
    });
</script>
@endpush
