</div>
</div>
</div>
<script src="<?= BASEURL; ?>/ckeditor4/ckeditor.js"></script>

<script>
    CKEDITOR.replace('editor');
</script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

</body>

</html>