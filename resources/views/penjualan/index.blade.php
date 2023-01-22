@extends('layouts.app')

@section('title','Penjualan')

@section('cssTambah')
@include('includes.css')
@endsection

@section('content')
<a href="{{route('penjualan.create')}}" class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</a>
<div class="card shadow mt-2">
    <div class="card-body">
        @include('includes.flash')
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="10px">No.</th>
                    <th>Tanggal Waktu Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @if (count($jual))
                    @foreach ($jual as $key => $jualan )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$jualan->created_at}}</td>
                        <td>{{$jualan->barang_id}}</td>
                        <td>{{$jualan->jumlah}}</td>
                        <td>{{"Rp. ".number_format($jualan->harga,0,".",".")}}</td>
                        <td>{{"Rp. ".number_format($jualan->total_harga,0,".",".")}}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive:true,
        lengthChange: false,
        buttons: [
            {
                extend: 'excel',
                split: [ 'pdf'],
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
@endpush
@include ('includes.scripts')
@endsection