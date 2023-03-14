@php
	$links = json_decode(json_encode(config('rapid-ui.navigation.links')));
@endphp
<div id="app"
	class="grid grid-cols-[320px_1fr]">

	<sidebar class="border-light-500 bg-light-300 sticky top-0 flex h-screen flex-col justify-between border-r">
		<div>
			<div class="space-y-4 px-6 py-4">
				<ul class="mt-6 flex flex-col space-y-4">
					@foreach ($links as $link)
						@if ($link->type == 'link')
							<a href="{{ route($link->route) }}"
								class="{{ request()->routeIs($link->active) ? 'active' : '' }} flex w-full items-center gap-2 rounded-lg border border-gray-200 bg-transparent py-2 px-6 text-gray-800 hover:bg-gray-200 hover:text-gray-800">
								@isset($link->icon)
									{{-- <x-heroicon::icon type="outline"
										:icon="$link->icon"
										stroke-width="1"
										class="h-5 w-5" /> --}}
								@else
									<span class="h-5 w-5"></span>
								@endisset
								<span>{{ $link->title }}</span>
							</a>
						@endif
					@endforeach
				</ul>
			</div>
		</div>
		<div class="space-y-4 px-6 py-10">
			<form action="{{ route('logout') }}"
				method="POST">
				@csrf
				<button class="btn w-full text-center">Logout</button>
			</form>
		</div>
	</sidebar>

	<main class="pb-20">
		{{ $slot }}
	</main>

</div>
