<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
     <a class="navbar-brand" href="#">E-Shopping</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="navbar-nav ms-auto">
         <!-- home -->
         <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
         <!-- category -->
         <a class="nav-link" href="{{ url('category') }}">Categories</a>
         <!-- cart -->
         <a class="nav-link" href="{{ url('cart') }}">
            Carts
            <span class="badge badge-pill bg-success cart-count">0</span>
         </a>
         <!-- wishlist -->
         <a class="nav-link" href="{{ url('wishlist') }}">
            Wishlists
            <span class="badge badge-pill bg-primary wishlist-count">0</span>
         </a>
         <!-- login/register -->
         @guest
            @if (Route::has('login'))
               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
               <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
         @else
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ Auth::user()->name }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <li>
                  <a class="dropdown-item" href="{{ url('my-order') }}">My Order</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
                 </li>
               </ul>
             </li>
         @endguest         
       </div>
     </div>
   </div>
 </nav>