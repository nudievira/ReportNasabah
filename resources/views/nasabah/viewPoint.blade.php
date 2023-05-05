@extends('layout.index')
@push('title')
Detail Point
@endpush


@section('breadcrumb')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Point</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">User</a></li>
                    <li class="breadcrumb-item active"><a href="users-index"></a>Detail Point</li>
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
                    <h3 class="m-0">Detail Point</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Name</th>
                                    <td>{{ $nasabah->Name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th width="30%">Total Point</th>
                                    <td>{{ $totalPoint->total ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection