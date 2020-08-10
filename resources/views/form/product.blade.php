@extends('../masterlayout')

@section('title', 'Product Form')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3 my-5">
    <div class="col col-6">
      <div class="card">
        <div class="card-header bg-success text-light font-weight-bold">Add Your Product</div>
        <div class="card-body">
          <form action="/add-product" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Burger..." >
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="merk">Product Merk</label>
              <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" id="merk" placeholder="Burger King...">
              @error('merk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="category" id="category">
                @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              @error('category_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli</label>
              <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" id="harga_beli" placeholder="35000">
              @error('harga_beli')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga_jual">Harga Jual</label>
              <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual" placeholder="45000">
              @error('harga_jual')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" placeholder="5">
              @error('stock')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="disc">Discount Price</label>
              <input type="number" class="form-control @error('disc') is-invalid @enderror" name="disc" id="disc" placeholder="2000">
              @error('disc')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
            <a href="/" class="btn btn-danger float-right mr-3">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection