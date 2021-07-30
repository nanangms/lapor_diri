<!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="/profil/{{encrypt(auth()->user()->id)}}">
          <img src="{{auth()->user()->getAvatar()}}" class="img-circle elevation-2" alt="User Image" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden;">
              </a>
          
        </div>
        <div class="info">
          <a href="/profil/{{encrypt(auth()->user()->id)}}" class="d-block">{{auth()->user()->name}} <br>{{auth()->user()->role}}</a>
        </div>
      </div>
