@section('header_title', 'Profile')

@php 

// Declare Step Routes Here
$routes = [
    ['step' => 1, 'label' => 'ProfileStats',    'name' => 'profile.stats.index'],
    ['step' => 2, 'label' => 'Biography',       'name' => 'profile.biography.index'],
    ['step' => 3, 'label' => 'Services',        'name' => 'profile.services.index'],
    ['step' => 4, 'label' => 'Photos',          'name' => 'profile.photos.index'],
    
];

$currentStep = 1;
$routeName = Route::currentRouteName(); 

foreach ($routes as $route) {
    if ($route['name'] == $routeName) {
        $currentStep = $route['step'];
    }
}
@endphp

<div class="clearfix row ">
    <div class="col-md-12">
        <ul id="progressbar">
            @foreach ($routes as $route)
            <a href="{{ !empty($route['name']) ? route($route['name']) : '#' }}">
            <li class="icon-{{ $route['step'] }} {{ ($route['step'] <= $currentStep) ? 'active' : '' }}">
                    <span>{{ $route['label'] }}</span>
                </li> 
            </a>
            @endforeach
        </ul>
    </div>
</div>