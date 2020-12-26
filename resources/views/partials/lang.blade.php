<!--<ul class="navbar-nav ml-auto"> <div class="nav-wrapper">-->
@php $locale = session()->get('locale'); @endphp
<div class="sl-nav"> {!!__('buttons.language')!!}:
 <ul>
  <li>
    @switch($locale)

      @case('ua')
      <i class="sl-flag flag-ua">
        <div id="germany"></div> </i>
      @break

      @case('ru')
      <i class="sl-flag flag-ru">
        <div id="germany"></div> </i>
      @break

      @default
      <i class="sl-flag flag-us">
      <div id="germany"></div> </i>
    @endswitch

      <i aria-hidden="true" class="fa fa-angle-down">
      </i>
      <div class="triangle"></div>
       <ul>
        <li>
        <i class="sl-flag flag-us">
         </i>
        <span class="active">
        <a href="{{ route('language.set',['locale'=>'en'])}}">
          English
        </a>
        </span>
        </li>

        <li>
          <i class="sl-flag flag-ua">
            </i>
            <span><a href="{{ route('language.set',['locale'=>'ua'])}}">
            Українська</a> </span>
        </li>

        <li>
          <i class="sl-flag flag-ru">
          </i>
        <span><a href="{{ route('language.set',['locale'=>'ru'])}}"> Русский</a> </span>
       </li>
  </ul>
        </li>
    </ul>
</div>
