<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Naujo nario informacija') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            @if ($errors->any())
            	<div class="p-6 bg-white border-b border-gray-200 mb-2">
            		<ul>
            		@foreach($errors->all() as $error)
            		<li>{{$error}}</li>
            		@endforeach
            		</ul>
            	
            	</div>
            	@endif
            
                <div class="p-6 bg-white border-b border-gray-200">
                  
                   <form action="{{ route('members.store')}}" method="post">
                   @csrf
<!--                    <x-label :value="__( 'Nario Id:')"/> -->
<!--                    <input type="text" name="id"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  value="{{ Request::old('id')}}" > -->
                   
                   <x-label :value="__( 'Vardas:')"/>
                   <input type="text" name="name"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  value="{{ Request::old('name')}}" >
                   
                   <x-label :value="__('Pavardė:')"/>
                   <input type="text" name="surname"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full "  value="{{ Request::old('surname')}}" >
                   
                   <x-label :value="__('Gyvenamoji vieta:')"/>
                   <input type="text" name="live"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('live') error @enderror"  value="{{ Request::old('live')}}" >
                   
                   <x-label :value="__('Patirtis metais:')"/>
                   <input type="text" name="experiency"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  value="{{ Request::old('experiency')}}" >
                   
                   <x-label :value="__( 'Narys metais:')"/>
                   <input type="text" name="registered"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  value="{{ Request::old('registered')}}" >
                   <div class="mt-2">
                   
                   <x-label :value="__( 'Vandens telkinys:')"/>
                   <select name="reservoir_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                  @foreach ($reservoirs as $reservoir)
                   <option value="{{ $reservoir->id }}"> {{ $reservoir->title }} </option>
                   @endforeach
                   </select> 
                   <div class="mt-4"> 
                   <x-button>Išsaugoti</x-button>
                   </div>
                     </form><br>
                     
                     <a href="{{ route('members.index') }}">Grįžti</a>
                  
                </div>
            </div>
        </div>
	</div>
</x-app-layout>
