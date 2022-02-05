@section('title','Climate rules')

<script src="/js/main.js"></script>

<script>

    export default {
        mounted(){

            Echo.channel('test').listen('Test', (e) => {

                console.log(e)
            })

        }


    }

</script>


<div class="pageTitle mb-4 mt-8 text-su-shadow-white">Climate rules</div>
Ahoj
</div>








