<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
{{-- @if (hasPermission($user, 'print')) --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script> --}}
{{-- @endif --}}
<script>
    $(document).ready(function() {
        let table = $('#table__data').DataTable({
            "pageLength": 20,
            "lengthChange": true,
            "fnDrawCallback": function (oSettings) {
                if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                } else {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                }
            },

            dom: 'Blfrtip',
            
        });
        $('#mySearchText').on('keyup', function () {
            table.search($('#mySearchText').val()).draw();
        });
    })
</script>