{{-- <script src="/Admin/assets/js/extensions/sweetalert2.js"></script>
<script src="/Admin/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/Admin/assets/js/bootstrap.bundle.min.js"></script>

<script src="/Admin/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/Admin/assets/js/pages/dashboard.js"></script>

<script src="/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="/Admin/assets/vendors/choices.js/choices.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/Admin/assets/vendors/jquery/jquery.min.js"></script>
<script src="/Admin/assets/vendors/summernote/summernote-lite.min.js"></script>
<script src="/Admin/assets/js/main.js"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
</script> --}}
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/Admin/assets/js/extensions/sweetalert2.js"></script>
<script src="/Admin/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/Admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="/Admin/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/Admin/assets/js/pages/dashboard.js"></script>
<script src="/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="/Admin/assets/vendors/choices.js/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/Admin/assets/vendors/summernote/summernote-lite.min.js"></script>
<script src="/Admin/assets/js/main.js"></script>

<script>
    // Initialize Summernote
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: 'Enter text here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            fontNames: ['Arial', 'Courier New', 'Heebo'], // Add 'Heebo' here
            fontNamesIgnoreCheck: ['Heebo']
        });
    });



    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

</script>

