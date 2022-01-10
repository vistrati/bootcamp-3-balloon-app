@extends('layout')

@section('pageTitle')
    Contact us
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h4>Contact us</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contactUs') }}" method="POST" name="contact-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" required="required" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nume</label>
                        <input type="text" required="required" class="form-control" name="name" id="name" placeholder="Nume">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Departament</label>
                        <select id="department" class="form-control" name="department">
                            <option value="">Selecteaza un departament</option>
                            <option value="<administration>" >Administratie</option>
                            <option value="accounting" >Contabilitate</option>
                            <option value="technicalDepartment" >Departamentul tehnic</option>
                            <option value="logistic" >Logistica</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Raioane</label>
                        <select id="districts" class="form-control" name="districts[]" multiple>
                            <option value="">Selecteaza un raion</option>
                            <option value="chisinau" >Mun. Chisinau</option>
                            <option value="orhei" >Orhei</option>
                            <option value="straseni" >Straseni</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Mesaj</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" name="readTerms" type="checkbox" id="gridCheck" value="1">
                        <label class="form-check-label" for="gridCheck">
                            Am citit regulile
                        </label>
                    </div>
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Trimite mesaj</button>
            </form>
        </div>
    </div>

@endsection
