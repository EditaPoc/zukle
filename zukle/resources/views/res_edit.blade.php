<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vandens telkinio redagavimas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           
            
                <div class="p-6 bg-white border-b border-gray-200">
                
                   <x-slot name="metahead">
                  		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                  </x-slot>
                   <form action="{{ route('reservoirs.update', $reservoir->id)}}" method="post">
                   @csrf
                   @method('PUT')
                   
                   <x-label :value="__( 'Pavadinimas:')"/>
                   <x-input type="text" name="title" :value="$reservoir->title" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('title') error @enderror"   />
                   
                   <x-label :value="__('Plotas:')"/>
                   <x-input type="text" name="area"  :value="$reservoir->area" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full @error('area') error @enderror"   />
                   
                   <x-label :value="__('Aprašymas:')"/>
                   <textarea name="about" id="mytextarea" rows="5" cols="30">{{ $reservoir->about }}</textarea>
                   
                   
                   
                   <div class="mt-4"> 
                   <x-button>Išsaugoti</x-button>
                   </div>
                     </form><br>
                     
                     <script>
    				  tinymce.init({
       				   selector: '#mytextarea'
     				  });
   				   </script>
                     
                     <a href="{{ route('reservoirs.index') }}">Grįžti</a>
                  
                </div>
            </div>
        </div>
	</div>
</x-app-layout>
