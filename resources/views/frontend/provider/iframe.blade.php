<div class="col-lg-12">
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               @foreach($health as $escort)
               <li>
                  <div class="img-box">
                     <a href="http://{{ $escort->title }}" target="_blank">
                     <img src="{{asset('public/localresources/'.$escort->image)}}" class="img-fluid"/>
                     <div class="top-content">{{$escort->name}}</div>
                     </a>
                     <div class="bottom-content">{{ $escort->title }}</div>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               @foreach($legal as $escort)
               <li>
                  <div class="img-box">
                     <a href="http://{{ $escort->title }}" target="_blank">
                     <img src="{{asset('public/localresources/'.$escort->image)}}" class="img-fluid"/>
                     <div class="top-content">{{$escort->name}}</div>
                     </a>
                      <div class="bottom-content">{{ $escort->title }}</div>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               @foreach($photographers as $escort)
               <li>
                  <div class="img-box">
                     <a href="http://{{ $escort->title }}" target="_blank">
                     <img src="{{asset('public/localresources/'.$escort->image)}}" class="img-fluid"/>
                     <div class="top-content">{{$escort->name}}</div>
                     </a>
                      <div class="bottom-content">{{ $escort->city }}</div>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</div>