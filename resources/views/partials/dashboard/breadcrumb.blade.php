<div id="bread__crumb">
    @if (Request::segment(2) == '')
    <div class="flex items-center">
        <h5 class="font-semibold text-gray-500 mb-0 lg:text-lg text-sm">Dashboard</h5>
    </div>
    @endif
    @if (!is_null(Request::segment(2)))
    <div class="flex items-center">
        <a href=""><h5 class="font-semibold text-gray-500 mb-0 md:text-lg text-sm">List Ias</h5></a>
        <span>>></span>
        <h5 class="font-medium text-green-500 mb-0 md:text-lg text-sm">Lorem, ipsum.</h5>
    </div>
    @endif
</div>