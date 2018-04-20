{{-- <form action="{{ $delete_url }}" class="float-right" method="post" data_confirm="{{ $confirm_message }}">
    @csrf
    @method('DELETE') --}}
<div class="float-right">
    <a class="btn btn-primary" href="{{ $detail_url }}"> <i class="fas fa-eye"></i> Detail </a>
    <a class="btn btn-warning" href="{{ $edit_url }}"><i class="fas fa-edit"></i> Edit</a>
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
    {{-- <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button> --}}
</div>
{{-- </form> --}}
@include('datatable._modal')