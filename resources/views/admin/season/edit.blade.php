@extends('admin.layouts.app')
@section('title')
    @lang('app.products')
@endsection
@section('content')
    <div class="h4 mb-3">
        <a href="{{ route('admin.seasons.index') }}" class="text-decoration-none">
            @lang('app.seasons')
        </a>
        <i class="bi-chevron-right small"></i>
        @lang('app.edit')
    </div>

    <form action="{{ route('admin.seasons.update', $obj->id) }}" method="post" enctype="multipart/form-data">
        <div class="row mb-3 pe-4">
            @method('PUT')
            @csrf
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="brand" class="form-label fw-semibold">
                        Brand
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('brand') is-invalid @enderror" name="brand" id="brand" required
                            autofocus>
                        <option value>-</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $obj->brand_id == $brand->id ? 'selected':'' }}>{{ $brand->getName() }}</option>
                        @endforeach
                    </select>
                    @error('brand')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold">
                        Category
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('category') is-invalid @enderror" name="category" id="category"
                            required>
                        <option value>-</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $obj->category_id == $category->id ? 'selected':'' }}>{{ $category->getName() }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount_percent" class="form-label fw-semibold">
                        @lang('app.discountPercent')
                    </label>
                    <div class="input-group mb-3">
                        <input type="number" min="0"
                               class="form-control @error('discount_percent') is-invalid @enderror"
                               name="discount_percent" id="discount_percent" value="{{ $obj->discount_percent }}">
                        <label class="input-group-text" for="discount_percent">%</label>
                    </div>
                    @error('discount_percent')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount_start" class="form-label fw-semibold">
                        @lang('app.discountStart')
                    </label>
                    <input type="date" class="form-control @error('discount_start') is-invalid @enderror"
                           name="discount_start" id="discount_start" value="{{ $obj->discount_start }}"
                           onfocus="this.min=new Date().toISOString().split('T')[0]">
                    @error('discount_start')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount_end" class="form-label fw-semibold">
                        @lang('app.discountEnd')
                    </label>
                    <input type="date" min="1" class="form-control @error('discount_end') is-invalid @enderror"
                           name="discount_end" id="discount_end" value="{{ $obj->discount_end }}"
                           onfocus="this.min=document.getElementById('discount_start').value;">
                    @error('discount_end')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="name_tm" class="form-label fw-semibold">
                        <img src="{{ asset('img/flag/tkm.png') }}" alt="Türkmen" height="15" class="mb-1">
                        @lang('app.name')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name_tm') is-invalid @enderror" name="name_tm"
                           id="name_tm" value="{{ $obj->name_tm }}" required>
                    @error('name_tm')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name_en" class="form-label fw-semibold">
                        <img src="{{ asset('img/flag/eng.png') }}" alt="English" height="15" class="mb-1">
                        @lang('app.name')
                    </label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                           id="name_en" value="{{ $obj->name_tm }}">
                    @error('name_en')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label fw-semibold">
                        @lang('app.stock')
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" min="0" class="form-control @error('stock') is-invalid @enderror" name="stock"
                           id="stock" value="{{ $obj->stock }}" required>
                    @error('stock')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">
                        @lang('app.price')
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror"
                               name="price" id="price" value="{{ $obj->price }}" step="0.1" required>
                        <span class="input-group-text">TMT</span>
                    </div>
                    @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="barcode" class="form-label fw-semibold">
                        @lang('app.barcode')
                    </label>
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode"
                           id="barcode" value="{{ $obj->barcode }}">
                    @error('barcode')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="gender" class="form-label fw-semibold">
                        @lang('app.gender')
                    </label>
                    <select class="form-select @error('gender') is-invalid @enderror"
                            name="gender"
                            id="gender">
                        <option value>-</option>
                        @foreach($attributes[0]->values as $attributeValue)
                            <option value="{{$attributeValue->id}}" {{ $attributeValue->id == $obj->gender_id ? 'selected' : ''}}>{{ $attributeValue->getName() }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label fw-semibold">
                        @lang('app.color')
                    </label>
                    <select class="form-select @error('color') is-invalid @enderror"
                            name="color"
                            id="color">
                        <option value>-</option>
                        @foreach($attributes[1]->values as $attributeValue)
                            <option value="{{$attributeValue->id}}" {{ $attributeValue->id == $obj->color_id ? 'selected' : ''}}>{{ $attributeValue->getName() }}</option>
                        @endforeach
                    </select>
                    @error('color')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label fw-semibold">
                        @lang('app.size')
                    </label>
                    <select class="form-select @error('size') is-invalid @enderror"
                            name="size"
                            id="size">
                        <option value>-</option>
                        @foreach($attributes[2]->values as $attributeValue)
                            <option value="{{$attributeValue->id}}" {{ $attributeValue->id == $obj->size_id ? 'selected' : ''}}>{{ $attributeValue->getName() }}</option>
                        @endforeach
                    </select>
                    @error('size')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                @if(count($attributes) > 3)
                    @foreach($attributes as $attribute)
                        <div class="mb-3">
                            <label for="{{ strtolower($attribute->name_en) }}" class="form-label fw-semibold">
                                {{ $attribute->getName() }}
                            </label>
                            <select class="form-select @error('{{ strtolower($attribute->name_en) }}') is-invalid @enderror"
                                    name="{{ strtolower($attribute->name_en) }}"
                                    id="{{ strtolower($attribute->name_en) }}">
                                <option value>-</option>
                                @foreach($attribute->values as $attributeValue)
                                    <option value="{{$attributeValue->id}}">{{ $attributeValue->getName() }}</option>
                                @endforeach
                            </select>
                            @error('{{ strtolower($attribute->name_en) }}')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">
                    @lang('app.image')
                </label>
                <div class="row">
                    @if(count($images) > 0)
                    <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                        @foreach($images as $image)
                            <img src="{{  $image }}" alt="{{ $obj->getName() }}" class="img-fluid rounded"
                                 style="max-height:5rem;">
                        @endforeach
                    </div>
                    @endif
                    <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                        <div class="input-group mb-3">
                            <input type="file" accept="image/jpeg"
                                   class="form-control @error('image') is-invalid @enderror"
                                   name="images[]" id="image" multiple>
                            <label class="input-group-text" for="image">Upload</label>
                        </div>
                        @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                @lang('app.add')
            </button>
        </div>
    </form>
@endsection