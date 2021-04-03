<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('user.show', ['id' => $person->id]) }}" class="text-dark">
        <i class="fas fa-user-circle fa-3x"></i>
      </a>
      @if( Auth::id() !== $person->id )
        <follow-button
          class="ml-auto"
          :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('user.follow', ['id' => $person->id]) }}"
        >
        </follow-button>
      @endif
    </div>
    <h2 class="h5 card-title m-0">
      <a href="{{ route('user.show', ['id' => $person->id]) }}" class="text-dark">{{ $person->name }}</a>
    </h2>
  </div>
</div>
