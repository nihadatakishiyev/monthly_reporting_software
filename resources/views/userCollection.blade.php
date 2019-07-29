@extends('layouts.design')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.modal').modal();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('select').formSelect();
        });

    </script>
    <div class="row">
        <div class="col l3">
            <h3>Employee Details</h3>
        </div>
        <div class="col l4" style="padding-top: 14px">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">search the best</label>
                </div>
        </div>
        <div class="col l3"></div>
        <div class="col l2" style="padding-top: 34px" align="right">
            <a class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Employee</a>
        </div>
    </div>
            <table class="highlight responsive-table bordered" style="font-size: 80%;">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Person no</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Birth date</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Org unit</th>
                        <th>Type</th>
                        <th>Education</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users)>0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="/users/{{$user->id}}">{{$user->person_no}}</a></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->birth_date}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->org_unit}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->education}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a data-target = "modal1" id="{{$user->id}}" class="waves-effect waves-light btn modal-trigger"><i style="color: yellow" class="material-icons">create</i></a>

                                    {{$user->id}}
                                    <a data-target 5= "modal2" id = "{{$user->id}} "class="waves-effect waves-light btn modal-trigger"><i style="color: red" class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
{{--                        <script>--}}
{{--                            $("a").click(function(){--}}
{{--                                var id = this.id;--}}

{{--                                {{$user = \App\User::Find(id)}}--}}
{{--                            });--}}
{{--                        </script>--}}
{{--                            {{$_GET['name']}}--}}
{{--                        {{$user=User::find($_GET['id'])}}--}}
                        @include('inc.editModal', ['user' => $user])

                    @endif
                </tbody>
            </table>
@endsection