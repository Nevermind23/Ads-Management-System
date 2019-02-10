@extends('layout')

@section('content')
    <div class="wrapper">
        @include('alerts')
        <form action="{{route('click.store')}}" method="post">
            @csrf
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Request ID</label>
                        <div class="control">
                            <input class="input" type="text" name="request_id" placeholder="e.g 52">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Banner Name</label>
                        <div class="control">
                            <input class="input" type="text" name="banner_name" placeholder="e.g banner-ibPYv-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field has-addons">
                <p class="control">
                    <span class="select">
                      <select>
                        <option>$</option>
                      </select>
                    </span>
                </p>
                <p class="control is-expanded">
                    <span class="is-fullwidth">
                        <input class="input" type="text" name="click_cost" placeholder="Click Cost, e.g 1.35">
                    </span>
                </p>
            </div>

            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary" type="submit">
                        Submit
                    </button>
                </p>
                <p class="control">
                    <a href="{{route('click.index')}}" class="button is-light" >
                        Cancel
                    </a>
                </p>
            </div>
        </form>
    </div>

@endsection