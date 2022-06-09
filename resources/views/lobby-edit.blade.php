

<form id="edit-lobby-form" class="d-flex justify-content-around flex-wrap p-3">

    @csrf

    <input value="{{$lobby->id}}" name="id" hidden>

    <div class="column d-grid p-3 w-75">

        <input class="name display-5 border-0 bg-transparent fw-bold rounded-4 w-100" name="name" value="{{$lobby->name}}">
        <hr class="cr-hr mb-3">

        <label for="description" class="text-start mt-3 mb-1">{{__('label')}}</label>
        <input class="description border-0  rounded-4"  name="description" value="{{$lobby->description}}" hidden>
        <div class=" p-4 bg-light rounded-4 text-start  mb-2 h-20 shadow-sm text-black" contenteditable="" onfocusout="this.parentNode.getElementsByClassName('description')[0].value = this.innerHTML">{{$lobby->description}}</div>

        <label for="date" class="text-start mt-3 mb-1">{{__('date_of_the_game')}}</label>
        <input class="date border-0 bg-light p-2 ps-4 pe-4 shadow-sm rounded-4" type="date" name="date" value="@php echo explode(' ',$lobby->play_date)[0]; @endphp" >
    </div>

    <div class="column d-grid">
        <span class="display-6 mb-4 text-black"> <b> X. </b> {{__('round')}}</span>

        <label for="phase" class="text-end mt-4 mb-1">{{__('phase_of_the_game')}}</label>
        <input class="phase border-0 bg-light rounded-4"  name="phase" value="{{$lobby->phase}}" hidden>
        <select class="border-0 bg-light p-2 ps-4 pe-4 shadow-sm rounded-4" onchange="this.parentNode.getElementsByClassName('phase')[0].value = this.value">
            @foreach($phases as $phase)
                <option value="{{$phase->code}}" @if($phase->code == $lobby->phase) selected @endif @if($phase->code == 1) disabled @endif>{{__($phase->name)}}</option>

            @endforeach
        </select>

        <label for="difficulty" class="text-end mt-4 mb-1">{{__('difficulty')}}</label>
        <input class="difficulty border-0 bg-light rounded-4"  name="difficulty" value="{{$lobby->difficulty}}" hidden>
        <select class="border-0 bg-light p-2 ps-4 pe-4 shadow-sm rounded-4"  onchange="this.parentNode.getElementsByClassName('difficulty')[0].value = this.value">
            @foreach($difficulties as $difficulty)
                <option value="{{$difficulty->code}}" @if($difficulty->code == $lobby->difficulty) selected @endif>{{__($difficulty->name)}}</option>

            @endforeach
        </select>

        <label for="language" class="text-end mt-4 mb-1">{{__('language')}}</label>
        <input class="language border-0 bg-light rounded-4"  name="language" value="{{$lobby->language}}" hidden>
        <select class="border-0 bg-light p-2 ps-4 pe-4 shadow-sm rounded-4" onchange="this.parentNode.getElementsByClassName('language')[0].value = this.value">
            @foreach($languages as $language)
                <option value="{{$language->code}}" @if($language->code == $lobby->language) selected @endif>{{__($language->name)}}</option>

            @endforeach
        </select>
    </div>


</form>
