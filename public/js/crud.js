// const { Button } = require("bootstrap");

function ajaxData() {
    $.ajax({
        url: '/siswa',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
            $('#t_siswa tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                    <h4>Loading..</h4>
                </td >
            </tr>
            `)
        },
        success: function(res) {
            // console.log(res) //harus dicoba terlebih dahulu
            if (res.results.length === 0) {
                $('#t_siswa tbody').html(`
                <tr>
                <td colspan="4" class="text-center">
                    <h4>Data Not Found</h4>
                </td>
                </tr>`)
            } else {
                // alert(res.message)
                let rowData = res.results.map(v => {
                    return `<tr>
                    <td> ${v.firstname}</td>
                    <td> ${v.lastname}</td>
                    <td> ${v.prodi}</td>
                    <td> 
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm btn-edit" data-id="${v.id}">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${v.id}">Delete</button>

                        </div>
                    </td>
                </tr>
                `
                }).join('')
                $('#t_siswa tbody').html(rowData)
                $('#t_siswa tfoot').html(`
                <tr>
                    <td colspan="4" class="text-right">
                    <b>Total Data : ${res.results.length}</b>
                    </td>
                </tr>`)
            }
        },
        error: function(err) {
            $('#t_siswa tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                <h4 class="text-danger">Internal Server Error!</h4>
                </td>
            </tr>`)
        },
        complete: function() {

        }
    })
}

function ajaxReuse(id,button,action){
    $.ajax({
        url:`/siswa/${id}`,
        type: 'GET',
        dataType:'JSON',
        beforeSend: function(){
            button.html('loading...').prop('disabled',true);
        },
        success:function(res){
            // console.log(res)
           if(action === 'edit'){
                $('#firstname_edit').val(res.result.firstname)
                $('#lastname_edit').val(res.result.lastname)
                $('#edit_id').val(res.result.id)
                $('#prodi_edit').val(res.result.prodi)
                $('#modal_edit').modal('show')
           }

           if(action === 'delete'){
                $('#delete_id').val(res.result.id)

                $('#nama').text(`${res.result.firstname} ${res.result.lastname}`)

                $('#modal_delete').modal('show')
           }
        },
        error:function(res){
            toastr.error(err.responseJSON.message,'Failed');
        },
        complete:function(res){
            if (action === 'edit') {
                button.html('Edit').prop('disabled',false);
                
            }

            if (action === 'delete') {
                button.html('Delete').prop('disabled',false);
            }
        }
    })
}

$(function() {
    ajaxData()

    $('#btn_reload').on('click', function() {
        ajaxData()
    })

    $('#btn_add').on('click', function() {
        $('#form_add')[0].reset()
        $('#modal_add').modal('show')
    })
    $('#form_add').validate({
        submitHandler: function(form) {
            $.ajax({
                url: '/siswa/store',
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function() {
                    $('#btn_save').prop('disabled', true).html('Loading..')
                },
                success: function(res) {
                    // alert(res.message)
                    toastr.success(res.message,'Success')
                    ajaxData()

                    $('#modal_add').modal('hide')
                },
                error: function(err) {
                    // alert()
                    toastr.warning(err.responseJSON.message)

                },
                complete: function() {
                    $('#btn_save').prop('disabled', false).html('Save')
                },
            })
        }

    })

    $('#t_siswa').on('click' , '.btn-delete', function(){
        let id = $(this).data('id')
        let button = $(this);
        // alert(id)
         ajaxReuse(id,button,'delete')
         

    });   

    $('#t_siswa').on('click' , '.btn-edit', function(){

        let id = $(this).data('id')
        let button = $(this);
        // alert(id)
        ajaxReuse(id,button,'edit')
    })


    $('#form_edit').validate({
        submitHandler: function(form) {

            let id = $('#edit_id').val()

            $.ajax({
                url: `/siswa/update/${id}`,
                type: 'POST',
                dataType:'JSON',
                data: $(form).serialize(),
                beforeSend: function() {
                    $('#btn_update').prop('disabled', true).html('Update..')
                },
                success: function(res) {
                    // alert(res.message)
                    toastr.success(res.message,'Success')
                    ajaxData()

                    $('#modal_edit').modal('hide')
                },
                error: function(err) {
                    // alert()
                    toastr.warning(err.responseJSON.message)

                },
                complete: function() {
                    $('#btn_update').prop('disabled', false).html('Update')
                },
            })
        }

    })

    $('#form_delete').validate({
        submitHandler: function(form) {

            let id = $('#delete_id').val()

            $.ajax({
                url: `/siswa/delete/${id}`,
                type: 'POST',
                dataType:'JSON',
                data: $(form).serialize(),
                beforeSend: function() {
                    $('#btn_delete').prop('disabled', true).html('Yes...')
                },
                success: function(res) {
                    // alert(res.message)
                    toastr.success(res.message,'Success')
                    ajaxData()

                    $('#modal_delete').modal('hide')
                },
                error: function(err) {
                    // alert()
                    toastr.warning(err.responseJSON.message)

                },
                complete: function() {
                    $('#btn_delete').prop('disabled', false).html('Yes')
                },
            })
        }

    })
})
