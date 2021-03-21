<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pridėkite naują vandens telkinį') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            
            
                <div class="p-6 bg-white border-b border-gray-200">
                  
                   <form action="{{ route('reservoirs.store')}}" method="post">
                   @csrf
                 
                   
                   <x-label :value="__( 'Pavadinimas:')"/>
                   <input type="text" name="title"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('title') error @enderror"  value="{{ Request::old('title')}}" required >
                   
                   <x-label :value="__('Plotas:')"/>
                   <input type="text" name="area"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('area') error @enderror"  value="{{ Request::old('area')}}" required >
                   
                   <x-label :value="__('Aprašymas:')"/>
                   <input type="text" name="about"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('about') error @enderror"  value="{{ Request::old('about')}}" required >
                  
                   <x-label :value="__( 'Klubo narys:')"/>
                   <select name="member_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                  @foreach ($members as $member)
                   <option value="{{ $member->id }}"> {{ $member->name }} {{ $member->surname }}</option>
                   @endforeach
                   </select> 
                   <div class="mt-4"> 
                   <x-button>Išsaugoti</x-button>
                   </div>
                     </form><br>
                     
                     <a href="{{ route('reservoirs.index') }}">Grįžti</a>
                  
                </div>
            </div>
        </div>
	</div>
</x-app-layout>
