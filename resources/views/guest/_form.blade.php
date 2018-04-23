<div class="form-group row">
        <label for="text" class="col-sm-2 col-form-label">Book Title :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Input Author Name..." value="@if (Route::is('books.edit')){{ $book->name }} @else {{ old('name') }} @endif" autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong> {{ $errors->first('name') }} </strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 col-md-offset-2">
            <button class="btn btn-primary float-right" type="submit">Save</button>
        </div>
    </div>