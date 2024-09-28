<!-- USER PROFILE CARD START -->
    <div class="card">
        <div class="card-body">
            <img src="{{asset('images/commentor-item1.jpg')}}" alt="" class="img-fluid">
            <div class="mt-2 d-flex align-items-center justify-content-between">
                <h4 class="profileName">{{$user->name}}</h4>
                @if($page_index == 'dashboard')
                    <iconify-icon icon="fa-solid:user-edit" onclick="toggleProfileForm()"  style="color: black;cursor: pointer;"></iconify-icon>
                @endif
            </div>
            <h6>E-mail: <span class="profileEmail">{{$user->email}}</span></h6>
        </div>
    </div>
<!-- USER PROFILE CARD END -->