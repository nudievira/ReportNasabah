@extends('layout.index')

@push('title')
List User
@endpush

@push('style')
<style>
  .help-block {
    color: red;
  }
</style>
@endpush

@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="m-0">Data Nasabah</h3>
        </div>
        <div class="card-body">
          <div style="margin-bottom: 20px" class="margin: 20px">
            <button class="btn btn-sm btn-outline-success" data-target="#tambahModal"
              data-toggle="modal">Tambah</button>
          </div>
          <div class="table-responsive">
            <table class="table table-head-fixed text-nowrap text-center table-hover datatable mt-3">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="tabel-body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah-->
<form action="{{ route('add-Nasabah') }}" method="POST">
  @csrf
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" id="username" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" id="simpanModal" class="btn btn-sm btn-outline-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Modal Transaksi-->
<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <input type="text" name="id" id="valueId" value="" class="form-control" hidden>
            <div class="form-group">
              <label for="" class="form-label">Deskripsi</label>
              <select class="form-control" id="description" name="description">
                <option value="Setor Tunai">Setor Tunai</option>
                <option value="Beli Pulsa">Beli Pulsa</option>
                <option value="Bayar Listrik">Bayar Listrik</option>
                <option value="Tarik Tunai">Tarik Tunai</option>
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="" class="form-label">Pembayaran</label>
              <select class="form-control" id="pembayaran" name="description">
                <option value="D">Debit</option>
                <option value="C">Credit</option>
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="" class="form-label">Amount</label>
              <input type="numeric" name="amount" id="amount" value="" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" id="addTransaksi" class="btn btn-sm btn-outline-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
  $(document).ready(function() {
      $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: '{{ route("dataNasabah-datatables") }}',
          pageLength: 10,
          lengthChange: false,
          lengthMenu: [
              [10, 20, 50, 100, -1],
              [10, 20, 50, 100, "All"]
          ],
          columns: [{
                  data: 'DT_RowIndex',
                  name: 'no',
                  width: '5%',
                  fixedColumns: true,
                  defaultContent: '-',
                  className: 'center',
                  orderable: false,
                  searchable: false
              },
              {
                  data: 'Name',
                  name: 'Name',
                  fixedColumns: true,
                  width: "25%",
                  defaultContent: '-',
                  className: 'center',
                  orderable: true,
                  searchable: true
              },
              {
                data: 'action',
                  name: 'action',
                  width: '15%',
                  fixedColumns: true,
                  defaultContent: '-',
                  className: 'center',
                  orderable: false,
                  searchable: false
              }
          ]
      });
    });

    $(document).on('click', '#modalTransaksi', function () {
        var id = $(this).data('param');
       $('#valueId').val(id);
       $('#description').val();
       $('#pembayaran').val();
       $('#amount').val();
    });
    $('#addTransaksi').click(function(){
      var id = $('#valueId').val();
      updateData(id);
    })

    function updateData(param) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData();
        formData.append('id', param);
        formData.append('description', $('#description').val());
        formData.append('DebitCreditStatus', $('#pembayaran').val());
        formData.append('Amount', $('#amount').val());
        $.ajax({
          type: 'post',
          url: "{{ route('transaksi-Nasabah') }}",
          data: formData,
          processData: false,
          contentType: false,
          success:function(response) {
          if(response.success) {
            // validasi success, do something in here
            setTimeout(function() { // method reload page after 2 second
              location.reload();
            }, 2000);

            Swal.fire({ // alert notif success
              icon:'success',
              title: 'Berhasil',
              text: 'Data anda berhasil disimpan',
            }).then(function() { // and hide modal after notif success
              $('#editModal').modal('hide');
            });

          } else {
            // validasi error, do something in here
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: ' Mohon periksa kembali data anda'
            });
          }
        }
    })
  }


</script>
@endpush