
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        document.getElementById('userImgI').addEventListener('change', e => {
            const preview = document.getElementById('userImgPreviewR');
            preview.src = URL.createObjectURL(e.target.files[0]);
        });
    })
</script>

<script>
    $(document).ready(function () {
        $("#addStudentForm").validate({
            rules: {
                name: {
                    required: true,
                },
                subject: {
                    required: true
                },
                mark: {
                    required: true,
                    digits: true
                },
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                subject: {
                    required: "Please enter your subject",
                },
                mark: {
                    required: "Please enter your email",
                    digits: "Please enter numeric value only",
                },
            }
        });
    });
</script>

</body>
</html>