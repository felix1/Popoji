@if((count($menu->children) > 0) && ($menu->parent == 0))
	<li class="dropdown">
		<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">{!! $menu->title !!}</a>
@else
	<li>
		@if($menu->target == 'none')
		<a href="{{ url($menu->url) }}">{!! $menu->title !!}</a>
		@else
		<a href="{{ $menu->url }}" target="_blank">{!! $menu->title !!}</a>
		@endif
@endif
	@if (count($menu->children) > 0)
	<ul class="dropdown-menu">
		@foreach($menu->children as $menu)
			@include(getTheme('partials.submenu'), $menu)
		@endforeach
	</ul>
	@endif
</li>