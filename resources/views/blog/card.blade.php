<div class='card mt-3'>
  <div class='card-body d-flex flex-row'>
    <a href="{{ route('user.show', ['id' => $blog->user->id]) }}" class="text-dark">
      <i class="fas fa-user-circle fa-3x mr-1"></i>
    </a>
    <div>
      <div class="font-weight-bold">
        <a href="{{ route('user.show', ['id' => $blog->user->id]) }}" class="text-dark">
          {{ $blog->user->name }}
        </a>
      </div>
      <div class="font-weight-lighter">
        {{ $blog->created_at->format('Y/m/d H:i') }}
      </div>
    </div>
    @if( Auth::id() === $blog->user_id )
        <!-- dropdown -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <button type="button" class="btn btn-link text-muted m-0 p-2">
                <i class="fas fa-ellipsis-v"></i>
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route("blog.edit", ['id' => $blog->id]) }}">
                <i class="fas fa-pen mr-1"></i>記事を更新する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $blog->id }}">
                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->

        <!-- modal -->
        <div id="modal-delete-{{ $blog->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('blog.destroy', ['id' => $blog->id ]) }}">
                @csrf
                <div class="modal-body">
                  {{ $blog->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
    @endif
  </div>
  <div class="card-body pt-0">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('blog.show', ['id' => $blog->id]) }}">
        {{ $blog->title }}
      </a>
    </h3>
    {{-- <h6>
      鍛えた部位：{{ $blog->target_site }}
    </h6> --}}
    <div class="card-text">
      {{ $blog->content }}
    </div>
  </div>
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <blog-like
      :initial-is-liked-by='@json($blog->isLikedBy(Auth::user()))'
      :initial-count-likes='@json($blog->count_likes)'
      :authorized='@json(Auth::check())'
      endpoint="{{ route('blog.like', ['blog' => $blog]) }}"
      >
      </blog-like>
    </div>
  </div>
  @foreach($blog->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
    @endif
          <a href="{{ route('tag.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            {{ $tag->hashtag }}
          </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
</div>
