<div class="form-group">


    {!! Form::label('titre', 'Titre') !!}
    <div class="form-controls">
        {!! Form::text('titre', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('image', 'Image') !!}
    <div class="form-controls">
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('texte', 'Texte du billet de blog') !!}
    <div class="form-controls">
        {!! Form::textarea('texte', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('categorie_id', 'Choisissez une categorie') !!}
    <div class="form-controls">
        {!! Form::select('categorie_id', $categories_list, null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-controls">
    {!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) !!}
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif