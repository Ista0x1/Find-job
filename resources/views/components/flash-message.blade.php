@if (Session()->has('message')

)
<div class="fixed left-1/2 px-48 py-3 bg-laravel top-0 text-white transform translate-x-1/2">
 <p >
    {{Session('message')}}
 </p>
</div>
@endif
