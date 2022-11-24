<x-app-layout>
    <x-slot name="header">
        <script type="text/javascript">
         $('body').on('keyup', '#search-todos', function(){
            $searchQuest = $(this).val();

          $.ajaxSetup({
            headers: {                 
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            
             }         
            });

            if($searchQuest){
                $('.defaultData').hide();
                $('.searchData').show();
            }  else{ 
            $('.defaultData').show();           
            $('.searchData').hide();        
             }

          $.ajax ({
            method: 'get',
            url: '{{URL::to('search')}}',
            data: {'search':$searchQuest},

            success: function(data){
                $('.searchData').html(data);
            }
          });
         });
        </script>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aufgabenliste') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <input type="text" id="search-todos" class="form-control" placeholder="Type the title to find the desired todo">
                <br>
                <br>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> Aufgabe</th>
                                <th class="col"> Bearbeiten</th>
                                <th class="col"> Löschen</th>
                                </tr>
                        </thead>
                        <tbody class="defaultData">
                            @foreach($todos as $todo)

                            @if($todo->completed)

                            <tr>
                                <td style="text-decoration:line-through">
                                <s><strong>{{$todo->title}}</strong></s> </br>
                                <s><small>{{$todo->description}}</small></s>
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
                                </td>

                                <td>
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
                        <tbody class="searchData">
                        </tbody>
                    </table>
                    <br>

                    <a href="/create-todo" class="col-9 btn btn-primary"> Aufgabe hinzufügen</a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
