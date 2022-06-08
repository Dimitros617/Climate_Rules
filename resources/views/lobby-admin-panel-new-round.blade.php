<div class="d-grid">

    <span class="fs-2 mb-4 mt-2 fw-bold pb-1 text-black" style="border-bottom: 2px solid black;">{{__('next_period')}}</span>

    <div class="d-flex flex-wrap justify-content-around">
        <div class="bg-light rounded-4 w-content p-3 text-start">


            <div class="fw-bold text-start text-black mt-2 d-inline-flex">
                <span>{{__('income_of_states_for_the_past_period')}}</span>
                <div class="form-check form-switch text-center d-flex justify-content-end  p-0 ps-2 ">
                    <input
                        onchange="
                        let income = document.getElementsByClassName('nation-income')
                        let zeros = document.getElementsByClassName('zero-nation-income')

                        for (let i = 0; i < income.length; i++){
                            if(this.checked){
                                income[i].removeAttribute('hidden');
                                zeros[i].setAttribute('hidden','');
                            }else{
                                zeros[i].removeAttribute('hidden');
                                income[i].setAttribute('hidden','');
                            }
                        }
                        "
                        style="transform: scale(1.2)" class="next-round-add-income form-check-input mx-3 p-0 ms-1" checked type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div>
            </div>

            <div class=" mt-3 px-2 d-grid">

                    @foreach($all_nations as $nation)
                    <div class="d-flex flex-wrap w-100 justify-content-between rounded-2 bg-white p-2 px-3 mb-1">
                        <span class="fw-bold">{{$nation->name}}</span>
                        <span class="fw-bold text-black nation-income">+{{$nation->round_income}}</span>
                        <span class="fw-bold text-black zero-nation-income" hidden>+0</span>
                    </div>
                    @endforeach

            </div>



        </div>
        <div class="w-content p-3 d-grid text-center">
            <span class="fw-bold p-2 display-6">{{__('gg')}}</span>
            <span class="fw-bold display-3 text-black">@if($gasses_increase>0)+@endif{{$gasses_increase}}</span>
        </div>
    </div>
</div>
