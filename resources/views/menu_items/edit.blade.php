@extends('layouts.app')

@section('content')

    @if(Auth::user()->name == 'Admin')
        <x-alert/>
            <div class="container col-4 " id="addMenuItemForm" >
                <x-alert/>
                <form method="post" action="{{route('item.edit_item', $menuItem)}}">   <!--posielam menuitem ako parameter na routu s menom item.edit_item-->
                    @csrf
                    @method('patch')
                    <label > Názov položky </label>
                    <input  name="itemName" id="item_name" class="form-control" cols="10" rows="1" value="{{$menuItem->itemName}}" required data-parsley-patterm="[a-zA-Z]">
                    <label > Popis </label>
                    <input name="itemDesc" id="item_description" class="form-control" cols="30" rows="1" value="{{$menuItem->itemDesc}}" required data-parsley-patterm="[a-zA-Z]">
                    <label > Ingrediencie </label>
                    <input name="itemIng" id="item_ingredients" class="form-control" cols="30" rows="1" value="{{$menuItem->itemIng}}" required data-parsley-patterm="[a-zA-Z]">
                    <label > Cena  </label>
                    <input name="itemPrice" step=".01" pattern="^\d*(\.\d{0,2})?$" id="item_price" class="form-control" cols="5" rows="1" min="0" max="100" value="{{$menuItem->itemPrice}}" required>
                    <button type="submit" class="btn btn-primary btn-sm float-right" name="submitComment" id="submitItem">Upraviť položku</button>
                </form>
                <a class="btn btn-danger btn-sm float-left" id="backButton" href="http://localhost/Vaii_sem_laravel/public/menu_items" > Späť </a>
            </div>

    @else

        <div>
            <h1 class="text-danger"> K tejto časti nemáte prístup! </h1>
        </div>
    @endif

@endsection
