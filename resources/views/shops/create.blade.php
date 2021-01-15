@extends('layouts.master')

@section('title', awt('Create my shop'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact_responsive.css') }}">
@endsection

@section('content')
<div class="container contact_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li>
                        <a href="{{ route('index') }}">@awt('Home')</a>
                    </li>
					<li class="active">
                        <a href="#">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            @awt('Create my shop')
                        </a>
                    </li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Contact Us -->

	<div class="row box-shadow- p-4-">

		<div class="col-lg-6 contact_col box-shadow p-4">
			<div class="contact_contents">
				<h1>Contact Us</h1>
				<p>
                    There are many ways to contact us. You may drop us a line,
                    give us a call or send an email, choose what suits you the most.
                </p>
				<div>
					<p>(800) 686-6688</p>
					<p>info.deercreative@gmail.com</p>
				</div>
			</div>
		</div>

		<div class="col-lg-6 get_in_touch_col box-shadow p-4">
			<div class="get_in_touch_contents">
				<h1>@awt('Shop Informations!')</h1>
				<p>Fill out the form below to recieve a free and confidential.</p>
                <form action="{{ route('shop.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" role="button">@awt('Name of your shop')</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="@awt('Name of your shop')" required>
                    </div>

                    <div class="form-group">
                        <label for="type_shop_id">@awt('Type of shop')</label>
                        <select class="custom-select" name="type_shop_id" id="type_shop_id">
                            <option selected>@awt('Select one')</option>
                            @foreach ($shopTypes as $item)
                            <option value="{{ $item->id }}">{{ awt($item->name) }}</option>
                            @endforeach
                        </select>
                    </div>

					<div>
						<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300">
                            @awt('create now')
                        </button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
@endsection
