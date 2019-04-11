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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        {{--TODO: Q:data-togle how working--}}
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#adddata" role="tab">Other</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    {{--TODO: Q:tab-pane how working--}}

                    <div class="tab-pane active" id="maindata" role="tabpanel">
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
                                      rows="20">{{old('content_raw', $item->content_raw) }} </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholde="Choose category..."
                                    required>

                                @foreach($categoryList as $categoryOption)

                                    <option value="{{$categoryOption->id}}"
                                    @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>