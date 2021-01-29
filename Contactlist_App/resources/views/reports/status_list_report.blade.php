@extends('base_templates/base')
@section('styles')

@endsection

@section('content')
    {!! $chart->container() !!}
@endsection

@section('scripts')
    <script src="https://pagecdn.io/lib/chart/2.9.3/Chart.min.js"></script>
    {!! $chart->script() !!}
@endsection
