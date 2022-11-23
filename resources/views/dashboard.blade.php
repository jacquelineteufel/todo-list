<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aufgabenliste') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table">
                        <thead>
                            <th scope="col"> Aufgabe</th>
                            <th scope="col"> Action</th>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)

                            @if($todo->completed)

                            <tr>
                                <td style="text-decoration:line-through">
                                <strong>{{$todo->title}}</strong> </br>
                                <small>{{$todo->description}}</small>
                                </td>
                            @else
                            <tr>
                                <td>
                                <strong>{{$todo->title}}</strong> </br>
                                <small>{{$todo->description}}</small>
                                </td>
                            @endif
                                <td>
                                <a href="{{asset('/' . $todo->id . '/edit')}}" class="btn btn-sm btn-success">Bearbeiten</a>

                                <form action="{{route('destroy', $todo->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"> Löschen </button>
                                </form>

                                </td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="/create-todo" class="col-6 btn btn-primary"> Aufgabe hinzufügen</a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
