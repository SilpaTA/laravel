@if (@session('success'))
               <div class="">
                <p>{{ $slot }}</p>
               </div>
           @endif