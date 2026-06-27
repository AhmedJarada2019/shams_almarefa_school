<script>
    (function() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                document.body.classList.remove('page-loading');
            });
        } else {
            document.body.classList.remove('page-loading');
        }
    })();
</script>
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" } } }, "font-family": "Cairo" };</script>

<script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<?php echo $__env->yieldPushContent('js'); ?>


<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Find all textareas marked for Quill conversion
    document.querySelectorAll('textarea[data-quill]').forEach(function(textarea) {
        var wrapper = document.createElement('div');
        wrapper.className = 'quill-wrapper mb-2';
        textarea.parentNode.insertBefore(wrapper, textarea);

        // Hide original textarea
        textarea.style.display = 'none';

        var editorDiv = document.createElement('div');
        editorDiv.innerHTML = textarea.value;
        wrapper.appendChild(editorDiv);

        var toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'align': [] }, { 'direction': 'rtl' }],
            ['link'],
            ['clean']
        ];

        var quill = new Quill(editorDiv, {
            theme: 'snow',
            modules: { toolbar: toolbarOptions },
            placeholder: textarea.getAttribute('placeholder') || 'اكتب هنا...'
        });

        // Sync content back to textarea on form submit
        var form = textarea.closest('form');
        if (form) {
            form.addEventListener('submit', function() {
                textarea.value = quill.root.innerHTML;
            });
        }
    });
});
</script>

<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/layout/script.blade.php ENDPATH**/ ?>