@section('title','Climate rules')

<x-app-layout>


<script>

    window.Echo.channel('my-channel')
        .listen('.my-event', (e) => {
            console.log('pippo');
            alert(e['message'])
        });


    function test(){

        $.ajax({
            url: '/help-test',
            type: 'get',
            success:function(response){

                console.log(response)
            },
            error: function (response){
                console.log(response);
            }
        });
    }
</script>


<div class="pageTitle mb-4 mt-8 text-su-shadow-white">Climate rules</div>
Ahoj




<button onclick="test()">
    TEST
</button>
    </x-app-layout>







