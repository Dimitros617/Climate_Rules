@section('title',"Seznam uživatelů")
@section('css', URL::asset('css/user.css'))
<x-app-layout>

    <script src="/js/user-gets.js"></script>


    <div class="users-container light-transparent justify-content-between rounded-5 w-80 p-3 ms-auto me-auto d-block p-58 shadow-sm">

        <div class="container p-6 ">

            @if(sizeof($users) != 0)
                <div class="list-group pt-4 pb-4">

                    <div class="hlavicka w-100" >
                        <span class="display-5 w-100" style="    border-bottom: 2px solid black;"> Seznam uživatelů</span>
                        <div class="search">
                            <div class="bg-gray-100 rounded-3 modal-open">
                                <div class="card-body row no-gutters align-items-center h-4rem">

                                    <div class="col">
                                        <input class="form-control-borderless p-2 rounded-3 overflow-hidden fs-5" id="search" type="search" placeholder="Zadejte hledaný výraz">

                                    </div>

                                    <div class="col-auto">
                                        <div class="spinner-border text-su-orange searchSpinner mt--1" id="spinner" role="status" hidden></div>
                                    </div>


                                    <div class="col-auto searchButtonDiv">

                                        <button class="btn btn-lg btn-success searchButton" type="submit" onclick="userFind(this)">Najít</button>
                                        <button class="btn btn-lg btn-primary searchButton" data-sort="none" sort="desc" onclick="userSort(this)">&#8681;</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="userList" class="mt-3">
                        @foreach($users as $user)
                            <a href="{{url()->current().'/'.$user -> userId}}" style="text-decoration: none">

                                <div class="m-3 p-3 rounded-3 bg-white shadow-sm animate-05 hover-size-01" userID="{{$user->userId}}"
                                style="border-bottom: 10px solid
                                @if($user->permitionName == 'Admin')
                                    #ff9f1c
                                @elseif($user->permitionName == 'Ověřený')

                                    #659933
                                @else
                                    #0099cd
                                @endif">
                                    <div class="fs-1 fw-bold text-black">

                                            {{$user -> userNick}}

                                    </div>

                                    <div class="w-100 text-end fw-bold fs-3 text-muted">
                                        {{$user -> permitionName}}
                                    </div>

                                </div>

                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="display-4 pt-4 pb-4">Upss... Nic jsme tu nenašli.</div>
            @endif

        </div>
    </div>
</x-app-layout>
