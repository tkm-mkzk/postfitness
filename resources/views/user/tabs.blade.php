<ul class="nav nav-tabs nav-justified mt-3">
  <li class="nav-item">
    <a class="nav-link text-muted {{ $hasBlogs ? 'active' : '' }}"
    href="{{ route('user.show', ['id' => $user->id]) }}">
      記事
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted {{ $hasLikes ? 'active' : '' }}"
    href="{{ route('user.likes', ['id' => $user->id]) }}">
      いいね
    </a>
  </li>
</ul>
