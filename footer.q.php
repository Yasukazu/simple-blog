<p>
<div class="w3-container w3-teal">
    <p>Quill All rights reserved | <?php echo date("Y"); ?></p>
</div>
</p>




<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#description', {
    theme: 'snow'
  });
</script>
</body>