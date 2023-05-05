@extends('layout.index')
@push('title')
Detail Point
@endpush


@section('breadcrumb')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Report Nasabah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">User</a></li>
                    <li class="breadcrumb-item active"><a href="users-index"></a>Report Nasabah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<style>
     @media (max-width: 600px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
    .readonly {
        background-color: white;
    }
    table {
        table-layout: fixed;
        width: 100%;
        word-wrap: break-word;
    }

    .download-button {
        width: 8%;
        display: inline-block;
        size: 10px;
    }
</style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary" style="height: 561px">
                <div class="card-header">
                    <h3 class="m-0">Report Nasabah</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-head-fixed text-nowrap text-center table-hover datatable mt-3">
                                <thead>
                                  <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Transaction Date</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Credit</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Amount</th>
                                  </tr>
                                </thead>
                                <?
                                 {{ $no =1 }}
                                 ?>
                                <tbody id="tabel-body">
                                    @foreach ($transaksiNasabah as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ date('Y-m-d', strtotime($data->TransactionDate)) }}</td>
                                        <td>{{ $data->Description }}</td>
                                        @if ($data->DebitCreditStatus === 'C')
                                        <td>{{ $data->Amount }}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        @if ($data->DebitCreditStatus === 'D')
                                        <td>{{ $data->Amount }}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        <td>{{ $data->Amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection