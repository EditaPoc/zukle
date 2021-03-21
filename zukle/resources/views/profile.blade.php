<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klubo nario informacija') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                   <div class="p-6 bg-white border-b border-gray-200">
                 
                    <b>Vardas:</b> {{ $members->name }} <br>
                    <b>Pavardė:</b> {{ $members->surname }} <br>
                    <b>Gyvenamoji vieta:</b> {{$members->live }}<br>
                    <b>Patirtis metais:</b> {{ $members->experiency }}<br>
                    <b>Narys metais:</b> {{ $members->registered }}<br><br>
                    
                   <b>Vandens telkiniai:</b><br>
                   <ul>
                   	 @foreach ($reservoirs as $reservoir)
                    	<li>{{ $reservoirs->title }} {{ $reservoirs->area }} {!! $reservoirs->about !!}</li>
                  		@break;
                  @endforeach
					
					</ul>
                    </div>
       
                    <a href="{{ route('members.index') }}">Grįžti</a>
                </div>
            </div>
        </div>
</x-app-layout>
