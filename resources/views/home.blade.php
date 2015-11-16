@extends('app')

@section('title', 'หน้าหลัก')

@section('content')
	{!! $map['js'] !!}

<!-- Map Area -->
	<div style="height:100%;width:100%;position: fixed;padding: 0px;">
		{!! $map['html'] !!}
	</div>

<!-- Map Detail Area -->
    @include('maps.map_detail_kaset')
<!-- Add Crop in Map  Area -->
    @include('maps.map_add_crop')
    
<!-- Sidebar Area -->
<div class="sidebar-area" style="width: 30%;height: 100%;">
  <div class="sidebars">
    <div style="height:100%;position:fixed;width: 25%;" class="sidebar left">
      @include('maps.map_config_sidebar')
    </div>
  </div>
</div>

  <script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }
  </script>
  <script>
    $(document).ready(function () {
    // All sides
    var sides = ["left", "top", "right", "bottom"];
    $("h1 span.version").text($.fn.sidebar.version);

    // Initialize sidebars
    for (var i = 0; i < sides.length; ++i) {
        var cSide = sides[i];
        $(".sidebar." + cSide).sidebar({side: cSide});
    }

    // Click handlers
    $(".btn[data-action]").on("click", function () {
        var $this = $(this);
        var action = $this.attr("data-action");
        var side = $this.attr("data-side");
        $(".sidebar." + side).trigger("sidebar:" + action);
        return false;
    });
});</script>
@stop