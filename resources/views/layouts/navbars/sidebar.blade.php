<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"><img src="images/logo.png" alt=""></a>
            <a href="#" class="simple-text logo-normal">{{ __('Gym App') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-settings-gear-63" ></i>
                    <span class="nav-link-text" >{{ __('Managment') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            @if (Auth::check() && Auth::user()->is_admin)
            <li @if ($pageSlug == 'bmidetails') class="active " @endif>
                <a href="{{ route('pages.bmidetails') }}">
                    <i class="tim-icons icon-bold"></i>
                    <p>{{ __('BMI') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'plans') class="active " @endif>
                <a href="{{ route('pages.plans') }}">
                    <i class="tim-icons icon-user-run"></i>
                    <p>{{ __('Plans') }}</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
