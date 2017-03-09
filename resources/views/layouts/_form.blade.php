
<div class="form-group">
		{!! Form::label('pro_name','Products name : ') !!}
		{!! Form::text('pro_name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
		{!! Form::label('detail','Detail : ') !!}
		{!! Form::textarea('detail', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
		{!! Form::label('quantity','Quantity : ') !!}
		{!! Form::textarea('quantity', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
		{!! Form::label('images','Article Image: ') !!}
		{!! Form::file('images', null )!!}
</div>

<div class="form-group">
	{!! Form::button($submitButtonText,['style' => 'width:20%' , 'class' => 'btn btn-primary form-control' , 'type' => 'submit' ]) !!}
</div>