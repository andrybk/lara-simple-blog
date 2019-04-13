@php
    /** @var \App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Published
                @else
                    Not published
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>

                <ul class="nav nav-tabs" id="tabs" role="tablist">
                    <li class="nav-item">
                        {{--TODO: Q:data-togle how working--}}
                        <a class="nav-link active" id="main-tab" data-toggle="tab" href="#maindata" role="tab" aria-controls="main" aria-selected="true">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="add-tab" data-toggle="tab" href="#adddata" role="tab" aria-controls="add" aria-selected="true">Other</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    {{--TODO: Q:tab-pane how working--}}

                    <div class="tab-pane fade active show" id="maindata"  role="tabpanel" aria-labelledby="main-tab">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" value="{{$item->title}}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="5"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Title</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="20">{{old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="adddata"  role="tabpanel" aria-labelledby="add-tab">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Choose category..."
                                    required>

                                @foreach($categoryList as $categoryOption)

                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" value="{{$item->slug}}"
                                   id="slug"
                                   type="text"
                                   class="form-control"
                                   minlength="5">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3">{{old('excerpt', $item->excerpt) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden"
                                   name="is_published"
                                   value="0">
                            <input type="checkbox"
                                   name="is_published"
                                   class="form-check-input"
                                   value="{{$item->is_published}}"
                                   @if($item->is_published) checked="checked" @endif>
                            <label for="is_published" class="form-check-label">Published</label>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>