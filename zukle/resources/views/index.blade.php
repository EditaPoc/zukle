<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klubo nariai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <form action="{{ route ('members.indexOrder', ['reservoir_id', 'ASC']) }}" method="post">
                    @csrf
                    <select name="title">
                     @foreach ($reservoirs as $reservoir)
                   <option value="{{ $reservoir->id }}"> {{ $reservoir->title }} </option>
                   @endforeach               
                    </select>
                    <input type="submit" value="Filtruoti" class="btn btn-secondary btn-sm">
                    </form><br><br>
                    
                    <table border="1" style="width: 100%" class="table">
                    <tr ml-4>
                    <td><b>Nario Id</b></td>
                    <td><b>Vardas</b></td>
                    <td><a href="{{ route ('members.indexOrder', ['surname', $order])}}"><b>Pavardė</b></a></td>
                    <td><b>Gyvenamoji vieta</b></td>
                    <td><b>Patirtis metais</b></td>
                    <td><b>Narys metais</b></td>
                    <td><b>Vandens telkinys</b></td>
                    <td><b>Veiksmai</b></td>
                    <td><b></b></td>
                    </tr>
                    @foreach($members as $member)
                    <tr>
                    <td>{{ $member->id}}</td>
                    <td>{{ $member->name}}</td>
                    <td>{{ $member->surname}}</td>
                    <td>{{ $member->live}}</td>
                    <td>{{ $member->experiency}}</td>
                    <td>{{ $member->registered}}</td>
                    <td>{{ $member->reservoir->title}}</td>
                    <td>
                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-secondary">Plačiau</a>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-secondary">Redaguoti</a>
                    </td>
                    <td>
                    <form action="{{ route('members.destroy', $member->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                   
              		 <input type="submit" value="Ištrinti" class="btn btn-warning">
					</form>
                    </td>
                    </tr>
                    @endforeach
                    </table><br>
                   <br>
                     <a href="{{ route('members.create') }}" class="btn btn-secondary">Pridėti naują narį</a>
                </div>
            </div>
        </div>
    </div>

    

                    </div>
            </div>
        </div>
</x-app-layout>
