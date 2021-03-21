<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vandens telkiniai') }}
        </h2>
    </x-slot>
	<x-slot name="metahead">
    
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
            
                    <table border="1" style="width: 100%" class="table">
                    <tr ml-4>
                    <td><b>Telkinio Id</b></td>
                    <td><a href="{{ route ('reservoirs.indexOrder', 'title')}}"><b>Pavadinimas</b></a></td>
                    <td><a href="{{ route ('reservoirs.indexOrder', 'area')}}"><b>Plotas</b></a></td>
                    <td><b>Apibūdinimas</b></td>
                    
                    <td><b>Veiksmai</b></td>
                    <td><b></b></td>
                    </tr>
                    @foreach($reservoirs as $reservoir)
                    <tr>
                    <td>{{ $reservoir->id}}</td>
                    <td>{{ $reservoir->title}}</td>
                    <td>{{ $reservoir->area}}</td>
                     <td>{!! $reservoir->about !!}</td>
                    <td>
                    <a href="{{ route('reservoirs.edit', $reservoir->id) }}" class="btn btn-secondary">Redaguoti</a>
                    </td>
                    <td>
                      <a href="{{ route('reservoirs.deleteReservoir', $reservoir->id) }}" class="btn btn-warning">Ištrinti</a>
                     </tr>
                    @endforeach
                    </table><br>
                    <br>
                     <a href="{{ route('reservoirs.create') }}" class="btn btn-secondary">Pridėti naują vandens telkinį</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
