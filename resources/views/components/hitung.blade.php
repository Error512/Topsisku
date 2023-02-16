@extends('layout.full')
@section('content')
    <div class="container" id="boxrank">
        <table>
            @if(!empty($ranked))
            <th id='rangking'>
                Alternatif
            </th>
            <th id='rangking'>
                Preferensi
            </th>
            <th id='rangking'>
                Urutan
            </th>
            <tbody>
                @foreach ($rangking as $alternatifs)
                <tr>
                    <td id='rangking'>{{$alternatifs->alternatif}}</td>
                    <td id='rangking'>{{$alternatifs->preferensi}}</td>
                    <td id='rangking'>{{$alternatifs->urutan}}</td>
                </tr>
                @endforeach
            </tbody>
            @endif


            @if(!empty($no_rank))
            <h1>Belum melakukan perhitungan</h1>

            @endif
        </table>
    </div>
   
   
@endsection