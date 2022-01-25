@section('title',$user[0] -> userEmail)
@section('css', URL::asset('css/user-setting.css'))
<x-app-layout>

    <x-slot name="header"></x-slot>

    <script src="/js/main.js"></script>
    <script src="/js/user-save.js"></script>


        <div class="d-grid w-75 mx-auto bg-light rounded-3 shadow-sm overflow-hidden p-4">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h1 class="fs-1 fw-bold">Informace o
                        uživateli {{$user[0] -> userNick}}</h1>

                    <p class="mt-1 text-md text-muted">
                        Pozor, aby jste neupravili něco jiného!
                    </p>
                </div>
            </div>


            <div class="p-3 mt-3 rounded-3">
                <form id="userDataForm" onsubmit="saveUserData(this,'{{$user[0]->userId}}'); return false;">
                    <div class="overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white rounded-3 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- Profile Photo -->

                                @csrf

                                <input name="userId" value="{{$user[0]-> userId}}" hidden>


                                <!-- Přezdívka -->
                                <div class="d-inline-flex w-100">
                                    <label class="fs-3 fw-bold me-2 w-25" for="nick">
                                        Přezdívka
                                    </label>

                                    <input class=" rounded-3 fs-5 shadow-sm w-75 mt-1 p-2" id="nick" style="border: 1px solid silver;"
                                           type="text" name="userNick" value="{{$user[0] -> userNick}}" required
                                           autocomplete="nickname">


                                </div>

                                <!-- Email -->
                                <div class="d-inline-flex w-100">
                                    <label class="fs-3 fw-bold me-2 w-25" for="email">
                                        E-mail
                                    </label>

                                    <input class="rounded-3 fs-5 shadow-sm mt-1 w-75 p-2" id="email" style="border: 1px solid silver;"
                                           type="email" name="userEmail" value="{{$user[0] -> userEmail}}" required
                                           autocomplete="mail">


                                </div>

                                <div class="d-inline-flex w-100">
                                    <label class="fs-3 fw-bold me-2 w-25" for="selectPermition">Role
                                        uživatele: </label>
                                    <select class="form-select fs-5 rounded-md shadow-sm mt-1 w-75"
                                            name="selectPermition"
                                            oninput="document.getElementById('userDataForm').getElementsByClassName('submit')[0].removeAttribute('hidden')">
                                        @foreach($permitions as $permition)

                                            <option class="" value="{{ $permition -> permitionId }}"
                                                    @if($permition -> permitionId == $user[0] -> permitionId) selected @endif>{{ $permition -> permitionName }}</option>

                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit button"
                                    class="btn btn-danger w-25 float-end p-2 w-10rem text-white px-4 py-2">
                                <div id="buttonText" class="fs-5">Uložit změny</div>
                                <div id="buttonLoading" class="spinner-grow text-light" role="status" hidden></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</x-app-layout>
