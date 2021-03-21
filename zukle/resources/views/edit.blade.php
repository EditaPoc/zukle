<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redagavimas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                  <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                  </div>
                  @endif
                  
                   <form action="{{ route('members.update', $member->id)}}" method="post">
                   @csrf
                   @method('PUT')
                   <x-label :value="__( 'Vardas:')"/>
                   <x-input type="text" name="name" :value="$member->name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"  required />
                   
                   <x-label :value="__('Pavardė:')"/>
                   <x-input type="text" name="surname"  :value="$member->surname" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required  />
                   
                   <x-label :value="__('Gyvenamoji vieta:')"/>
                   <x-input type="text" name="live" :value="$member->live" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" required  />
                   
                   <x-label :value="__('Patirtis metais:')"/>
                   <x-input type="text" name="experiency" :value="$member->experiency" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"   />
                   
                   <x-label :value="__( 'Narys metais:')"/>
                   <x-input type="text" name="registered" :value="$member->registered" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full "  />
                   <div class="mt-2">
                   
                   
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
