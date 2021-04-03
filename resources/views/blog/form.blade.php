@csrf
<div class="md-form">
    <label>タイトル</label><br>
    <input type="text" name="title" class="form-control" required value="{{ $blog->title ?? old('title') }}">
</div>
{{-- <div class="md-form">
    <label>鍛えた部位</label><br><br>
    <select name="target_site" class="form-control">
    <option value="">選択してください</option>
    <option value="胸" @if(old('target_site')=="胸") selected @endif>胸</option>
    <option value="腕" @if(old('target_site')=="腕") selected @endif>腕</option>
    <option value="肩" @if(old('target_site')=="肩") selected @endif>肩</option>
    <option value="腹" @if(old('target_site')=="腹") selected @endif>腹</option>
    <option value="背中" @if(old('target_site')=="背中") selected @endif>背中</option>
    <option value="脚" @if(old('target_site')=="脚") selected @endif>脚</option>
    <option value="その他" @if(old('target_site')=="その他") selected @endif>その他</option>
    </select>
</div> --}}
<div class="form-group">
    <blog-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
    >
    </blog-tags-input>
</div>
<div class="form-group">
    <label></label>
    <textarea name="content" required class="form-control" rows="16" placeholder="本文">{{ $blog->content ?? old('content') }}</textarea>
</div>
