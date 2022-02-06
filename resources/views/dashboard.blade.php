@section('title','Climate rules')

<script src="/js/main.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script id="script-batch" type="text/javascript">
    (function(d){
        var js = d.createElement('script'); js.async = true; js.defer = true;
        js.src = "/js/jquery/jquery.min.js";
        d.getElementsByTagName('head')[0].appendChild(js);

        var jsUi = d.createElement('script'); jsUi.async = true; jsUi.defer = true;
        jsUi.src = "/js/jquery/jquery-ui.min.js";
        d.getElementsByTagName('head')[0].appendChild(jsUi);
    }(document));
</script>


<script>


    const pusher = new Pusher('c043d5fc6c72a5abf31f', {
        cluster: 'eu',
    });

    const channel = pusher.subscribe('my-channel');

    channel.bind('my-event', function (data) {
        console.log(data.message);
        alert(data);
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
</div>

<button onclick="test()">
    TEST
</button>








