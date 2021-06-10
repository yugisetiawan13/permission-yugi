<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD 1 PAGE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .error{
        color: red;
    }
</style>
</head>
<body>

    <div class="card">
        <div class="card-header">
          Data Siswa
          <button class="btn btn-primary" type="button" id="btn_reload">Reload Data</button>
          <button class="btn btn-info" type="button" id="btn_add">New Data</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="t_siswa">
                <thead>
                  <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center">
                            <h4>Loading..</h4>
                        </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
              </table>
        </div>
        <!-- Button trigger modal -->

    </div>

      <!-- Modal -->
    <form id="form_add">
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control" required name="firstname" id="firstname">
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" class="form-control" required name="lastname" id="lastname">
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <select name="prodi" id="prodi" required class="form-control">
                                <option value="SI">SI</option>
                                <option value="TI">TI</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="{{ asset('js/crud.js') }}"></script>
</body>
</html>
