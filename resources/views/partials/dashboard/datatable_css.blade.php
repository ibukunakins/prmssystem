<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css">
<style>
    #table__data_filter{
        display: none
    }
    table.dataTable tbody th, table.dataTable tbody td {
        padding: 11px 10px;
        font-size: 14px;
        color: #616161;
        border-bottom: 1px solid #ddd;
    }
    table.dataTable tbody th:not(:last-child), table.dataTable tbody td:not(:last-child), table.dataTable thead th:not(:last-child){
        border-right: 1px solid #ddd;
    }
    .dataTables_length{
        padding-left: 33px
    }
    .dataTables_wrapper .dataTables_processing{
        padding-bottom: 20px;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, #2563eb 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        height: 62px;
        top: 38%
    }
</style>